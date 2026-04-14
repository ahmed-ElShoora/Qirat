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

    public function kycShares(){
        $data = $this->kycService->getShares();
        return view('admin.kyc.index',compact($data));
    }

    public function kycBrokers(){
        $data = $this->kycService->getBrokers();
        return view('admin.kyc.index',compact($data));
    }

    public function show($id){
        $data = $this->kycService->getKyc($id);
        return view('admin.kyc.show',compact($data));
    }

    public function changeStatusKyc(ChangeKycStatusRequest $request){
        return redirect()->back();
    }
}
