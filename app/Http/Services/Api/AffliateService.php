<?php 

namespace App\Http\Services\Api;

use App\Models\User;

class AffliateService{
    public function getAffliates(){
        $my_affliates = User::select('name','referral_code','created_at')->where('referral_code',auth()->id())->get();
        return $my_affliates;
    }
}