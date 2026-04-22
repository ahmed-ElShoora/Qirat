<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Http\Requests\Api\StoreSellRequest;
use App\Http\Services\Api\SellService;

class SellController extends Controller
{
    use ApiResponse;
    public function __construct(private SellService $sellService) {}
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreSellRequest $request)
    {
        $result = $this->sellService->addSell($request->validated());
        if (!$result) {
            return $this->errorResponse(500, 'Failed to add sell');
        }
        return $this->successResponse(201, 'Sell added successfully');
    }
}
