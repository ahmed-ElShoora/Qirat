<?php

namespace App\Http\Services\Api;

use App\Models\User;
use App\Models\Otp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\SendOTPMail;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\UserResource;

class AuthService
{
    public function register($data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'referral_code' => $data['referral_code'],
        ]);

        $this->sendOtp($user, 'register');

        return $user;
    }

    public function sendOtp($user, $type)
    {
        $code = rand(100000, 999999);

        Otp::updateOrCreate(
            ['user_id' => $user->id, 'type' => $type],
            [
                'code' => $code,
                'expires_at' => now()->addMinutes(10)
            ]
        );

        Mail::to($user->email)->send(new SendOTPMail($code));
        // Log::info("OTP for {$type} sent to {$user->email}: {$code}");
    }

    public function verify($email, $code)
    {
        $user = User::where('email', $email)->firstOrFail();

        $otp = Otp::where('user_id', $user->id)
            ->where('code', $code)
            ->where('type', 'register')
            ->where('expires_at', '>', now())
            ->first();

        if (!$otp) return false;

        $user->update(['email_verified_at' => now()]);
        $otp->delete();

        return true;
    }

    public function login($data)
    {
        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return [
                'status' => false,
                'message' => 'Invalid credentials'
            ];
        }

        if (!$user->email_verified_at) {
            $this->sendOtp($user, 'register');
            return [
                'status' => false,
                'message' => 'Email not verified - OTP sent to email'
            ];
        }

        return [
            'status' => true,
            'data' => [
                'user' => new UserResource($user),
                'token' => $user->createToken('auth_token')->plainTextToken
            ]
        ];
    }

    public function forgetPassword($email)
    {
        $user = User::where('email', $email)->firstOrFail();
        $this->sendOtp($user, 'reset');
    }

    public function resetPassword($email, $code, $password)
    {
        $user = User::where('email', $email)->firstOrFail();

        $otp = Otp::where('user_id', $user->id)
            ->where('code', $code)
            ->where('type', 'reset')
            ->where('expires_at', '>', now())
            ->first();

        if (!$otp) return false;

        $user->update([
            'password' => bcrypt($password)
        ]);

        $otp->delete();

        return true;
    }

    public function me()
    {
        return new UserResource(auth()->user()->load('kyc'));
    }

    public function getSignDevices()
    {
        $tokens = auth()->user()->tokens()->get(['id', 'last_used_at']);
        return $tokens;
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
    }

    public function logoutAll()
    {
        auth()->user()->tokens()->delete();
    }
}