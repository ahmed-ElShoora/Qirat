<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\Setting\SettingService;
use App\Http\Requests\StoreSettingRequest;

class SettingController extends Controller
{
    public function __construct(
        private SettingService $settingService
    ){}
    public function index(){
        $data = $this->settingService->getIndex();
        return view('admin.setting.index',compact('data'));
    }

    public function store(StoreSettingRequest $request){
        $result = $this->settingService->setSetting($request);
        if (!$result) {
            return back()->withErrors(['error' => 'Failed to update setting. Please try again.']);
        }
        return redirect()->back()->with('success', 'Setting updated successfully');
    }
}
