<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\ExclusiveUnitService;
use App\Traits\ApiResponse;

class ExclusiveUnitController extends Controller
{
    use ApiResponse;
    public function __construct(
        private ExclusiveUnitService $exclusiveUnitService
    ){}
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $exclusiveUnits = $this->exclusiveUnitService->getExclusiveUnits();
        return $this->successResponse(
            200, 
            'Exclusive Units retrieved successfully', 
            $exclusiveUnits
        );
    }
}
