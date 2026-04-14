<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\DeveloperService;
use App\Traits\ApiResponse;

class DeveloperController extends Controller
{
    use ApiResponse;
    public function __construct(private DeveloperService $developerService) {}
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $data = $this->developerService->getDevelopers();
        return $this->successResponse(200, 'Developer returned successful',$data);
    }
}
