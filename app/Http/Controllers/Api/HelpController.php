<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\HelpService;
use App\Traits\ApiResponse;
use App\Http\Resources\HelpResource;

class HelpController extends Controller
{
    use ApiResponse;
    public function __construct(
        private HelpService $helpService
    ){}
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $helps = $this->helpService->getAllHelps();
        return $this->successResponse(
            200,
            'Help pages retrieved successfully', 
            HelpResource::collection($helps)
        );
    }
}
