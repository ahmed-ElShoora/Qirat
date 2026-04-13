<?php 
namespace App\Http\Services\Api;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\Http\Resources\UserResource;

class GoogleSignService
{
    public function handle($token, $referral_code = null)
    {
        $googleUser = Socialite::driver('google')
            ->stateless()
            ->userFromToken($token);

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'password' => bcrypt(Str::random(16)),
                'email_verified_at' => now(),
                'referral_code' => $referral_code
            ]
        );
        $token = $user->createToken('api')->plainTextToken;

        return [
            'user' => new UserResource($user),
            'token' => $token
        ];

    }
}