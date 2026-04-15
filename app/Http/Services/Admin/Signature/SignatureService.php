<?php
namespace App\Http\Services\Admin\Signature;
use App\Models\Signature;
use App\Traits\ManegeImagesTrait;

class SignatureService
{
    use ManegeImagesTrait;
    public function getAll(){
        return Signature::select('id', 'name')->get();
    }

    public function getById($id){
        return Signature::findOrFail($id);
    }

    public function create($data){
        $signature = Signature::create([
            'name'=>$data['name'],
            'icon'=>$this->uploadImage($data['icon'],'signatures')
        ]);
        return $signature ? true : false;
    }

    public function update($data, $id){
        $signature = Signature::findOrFail($id);
        $signature->fill(
            [
                'name'=>$data['name'],
            ]
        );
        if (isset($data['icon'])) {
            $this->deleteImage($signature->icon);
            $signature->icon = $this->uploadImage($data['icon'],'signatures');
        }
        return $signature->save();
    }
}