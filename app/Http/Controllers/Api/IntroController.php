<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Services\Api\IntroService;

class IntroController extends Controller
{
    use ApiResponse;
    public function __construct(
        private IntroService $introService
    ){}
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $intro = $this->introService->getIntro();
        return $this->successResponse(200,'Intro retrieved successfully',$intro);
    }
}
