<?php
namespace App\Http\Services\Admin\Setting;

use App\Models\Setting;

class SettingService{
    public function getIndex(){
        return [
            'phone'=>Setting::where('var','phone')->first()->value,
            'email'=>Setting::where('var','email')->first()->value
        ];
    }

    public function setSetting($request){
        $phone = Setting::where('var','phone')->update([
            'value'=>$request->phone
        ]);
        $email = Setting::where('var','email')->update([
            'value'=>$request->email
        ]);
        return $phone && $email;
    }
}