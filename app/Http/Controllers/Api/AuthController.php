<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\AuthService;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\Api\VerifyRequest;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\ForgotRequest;
use App\Http\Requests\Api\ResetRequest;
use App\Traits\ApiResponse;

class AuthController extends Controller
{
    use ApiResponse;
    public function __construct(private AuthService $auth) {}

    public function register(RegisterRequest $request)
    {
        $this->auth->register($request->validated());
        return $this->successResponse(200, 'Registration successful, OTP sent to email');
    }

    public function verify(VerifyRequest $request)
    {
        if (!$this->auth->verify($request->email, $request->code)) {
            return $this->errorResponse(400, 'Invalid code or email');
        }
        return $this->successResponse(200, 'Email verified successfully');
    }

    public function login(LoginRequest $request)
    {
        $reslut = $this->auth->login($request->all());
        if ($reslut['status'] == false) return $this->errorResponse(401, $reslut['message']);

        return $this->successResponse(200, 'Login successful', $reslut['data']);
    }

    public function forget(ForgotRequest $request)
    {
        $this->auth->forgetPassword($request->email);
        return $this->successResponse(200, 'OTP sent');
    }

    public function reset(ResetRequest $request)
    {
        if (!$this->auth->resetPassword(
            $request->email,
            $request->code,
            $request->password
        )) {
            return $this->errorResponse(400, 'Invalid code');
        }

        return $this->successResponse(200, 'Password updated');
    }

    public function me()
    {
        return $this->successResponse(200, 'User data', $this->auth->me());
    }

    public function devices()
    {
        $devices = $this->auth->getSignDevices();
        return $this->successResponse(200, 'Devices retrieved', $devices);
    }

    public function logout()
    {
        $this->auth->logout();
        return $this->successResponse(200, 'Logged out successfully');
    }

    public function logoutAll()
    {
        $this->auth->logoutAll();
        return $this->successResponse(200, 'Logged out from all devices successfully');
    }
}
