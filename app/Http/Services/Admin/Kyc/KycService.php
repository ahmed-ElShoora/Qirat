<?php

namespace App\Http\Services\Admin\Kyc;
use App\Models\Kyc;

class KycService{
    public function getKycs(){
        $kycs = Kyc::where('status','pending')->with('user')->oldest()->get();
        return $kycs;
    }

    public function getKyc($id){
        $data = Kyc::with('user')->findOrFail($id);
        return $data;
    }

    public function updateStatus($data){
        $kyc = Kyc::findOrFail($data['id']);
        $kyc->update([
            'status' => $data['status']
        ]);
        return $kyc->type;
    }
}