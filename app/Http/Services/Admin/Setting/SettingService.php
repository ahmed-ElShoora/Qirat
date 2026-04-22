<?php
namespace App\Http\Services\Admin\Setting;

use App\Models\Setting;
use App\Traits\ManegeImagesTrait;

class SettingService{
    use ManegeImagesTrait;
    public function getIndex(){
        return [
            'phone'=>Setting::where('var','phone')->first()->value,
            'email'=>Setting::where('var','email')->first()->value
        ];
    }

    public function setSetting($data){
        $phone = Setting::where('var','phone')->update([
            'value'=>$data['phone']
        ]);
        $email = Setting::where('var','email')->update([
            'value'=>$data['email']
        ]);
        $status = $phone && $email;
        if(isset($data['contract'])){
            $oldContract = Setting::where('var','contract')->first();
            if(file_exists(storage_path('app/public/'.$oldContract->value))){
                $this->deleteImage($oldContract->value);
            }
            $contract = Setting::where('var','contract')->update([
                'value'=>$this->uploadImage($data['contract'],'contracts')
            ]);
            $status = $status && $contract;
        }

        return $status;
    }
}