<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Models\Setting;

class SettingController extends Controller
{
    use ApiResponse;
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return $this->successResponse(
            200, 
            'Setting successfully',
            [
                'phone'=>Setting::where('var','phone')->first()->value,
                'email'=>Setting::where('var','email')->first()->value,
                'contract'=>Setting::where('var','contract')->first()->value,
            ]
        );
    }
}
