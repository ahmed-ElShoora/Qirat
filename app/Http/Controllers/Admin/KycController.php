<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\Kyc\KycService;
use App\Http\Requests\ChangeKycStatusRequest;

class KycController extends Controller
{
    public function __construct(
        private KycService $kycService
    ){}

    public function index(){
        $data = $this->kycService->getKycs();
        return view('admin.kyc.index',compact('data'));
    }

    public function show($id){
        $data = $this->kycService->getKyc($id);
        return view('admin.kyc.show',compact('data'));
    }

    public function updateStatus(ChangeKycStatusRequest $request){
        $result = $this->kycService->updateStatus($request);
        if(!$result){
            return back()->withErrors(['error' => 'Failed to update Kyc status. Please try again.']);
        }
        return redirect()->route('admin.kyc')->with('success', 'Kyc status updated successfully');
    }
}
