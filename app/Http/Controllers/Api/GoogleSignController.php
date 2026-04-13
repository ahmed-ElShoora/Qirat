<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\GoogleSignService;
use App\Traits\ApiResponse;
use App\Http\Requests\Api\GoogleSignRequest;

class GoogleSignController extends Controller
{
    use ApiResponse;
    public function __construct(
        protected GoogleSignService $service
        ){}
    /**
     * Handle the incoming request.
     */
    public function __invoke(GoogleSignRequest $request)
    {
        $data = $this->service->handle($request->token, $request->referral_code);

        return $this->successResponse(
            200,
            'Google sign-in successful',
            $data
        );
    }
}
