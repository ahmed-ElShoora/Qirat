<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\TypeService;
use App\Traits\ApiResponse;

class TypeController extends Controller
{
    use ApiResponse;
    public function __construct(
        private TypeService $typeService
    ){}
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $types = $this->typeService->getTypes();
        return $this->successResponse(200, 'Types retrieved successfully', $types);
    }
}
