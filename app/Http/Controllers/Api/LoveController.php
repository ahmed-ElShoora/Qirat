<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SwitchLoveRequest;
use App\Http\Services\Api\LoveService;
use App\Traits\ApiResponse;

class LoveController extends Controller
{
    use ApiResponse;
    public function __construct(
        private LoveService $loveService
    ){}

    public function loves()
    {
        $loves = $this->loveService->getLoves();
        return $this->successResponse(200, 'Loves retrieved successfully', $loves);
    }

    public function addlove(SwitchLoveRequest $request)
    {
        $result = $this->loveService->switchLove($request->validated());
        if (!$result) {
            return $this->errorResponse(500, 'Failed to switch love');
        }
        return $this->successResponse(201, 'Love switched successfully');
    }
}
