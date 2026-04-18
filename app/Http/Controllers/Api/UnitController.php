<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\UnitService;
use App\Traits\ApiResponse;
use App\Http\Requests\FilterUnitRequest;

class UnitController extends Controller
{
    use ApiResponse;
    public function __construct(
        private UnitService $unitService
    ){}

    public function index(FilterUnitRequest $request)
    {
        $units = $this->unitService->getUnits($request->validated());
        return $this->successResponse(
            200, 
            'Units retrieved successfully', 
            $units
        );
    }

    public function show($id)
    {
        $unit = $this->unitService->getUnitById($id);
        return $this->successResponse(
            200, 
            'Unit retrieved successfully', 
            $unit
        );
    }
}
