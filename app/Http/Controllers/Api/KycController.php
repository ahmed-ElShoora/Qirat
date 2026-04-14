<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\KycRequest;
use App\Http\Services\Api\KycService;
use App\Traits\ApiResponse;

class KycController extends Controller
{

    use ApiResponse;
    public function __construct(
        private KycService $kycService
    ){}

    public function submit(KycRequest $request)
    {
        $result = $this->kycService->create(
            $request->validated(),
            auth()->user()
        );

        if (!$result['status']) {
            return $this->errorResponse(400,$result['message']);
        }

        return $this->successResponse(200, 'KYC submitted successfully');
    }
}
