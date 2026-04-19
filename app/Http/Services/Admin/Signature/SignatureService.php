<?php
namespace App\Http\Services\Admin\Signature;
use App\Models\Signature;
use App\Traits\ManegeImagesTrait;

class SignatureService
{
    use ManegeImagesTrait;
    public function getAll(){
        return Signature::select('id', 'name_ar')->get();
    }

    public function getById($id){
        return Signature::findOrFail($id);
    }

    public function create($data){
        $signature = Signature::create([
            'name_ar'=>$data['name_ar'],
            'name_en'=>$data['name_en'],
            'icon'=>$this->uploadImage($data['icon'],'signatures')
        ]);
        return $signature ? true : false;
    }

    public function update($data, $id){
        $signature = Signature::findOrFail($id);
        $signature->fill(
            [
                'name_ar'=>$data['name_ar'],
                'name_en'=>$data['name_en'],
            ]
        );
        if (isset($data['icon'])) {
            $this->deleteImage($signature->icon);
            $signature->icon = $this->uploadImage($data['icon'],'signatures');
        }
        return $signature->save();
    }
}