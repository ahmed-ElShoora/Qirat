<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\AffliateService;
use App\Traits\ApiResponse;

class AffliateController extends Controller
{
    use ApiResponse;
    public function __construct(private AffliateService $affliateService) {}
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $data = $this->affliateService->getAffliates();
        return $this->successResponse(200, 'Affliate returned successful',$data);
    }
}
