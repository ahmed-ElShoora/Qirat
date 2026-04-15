<?php 

namespace App\Http\Services\Admin\Developer;

use App\Models\Developer;
use App\Traits\ManegeImagesTrait;

class DeveloperService
{
    use ManegeImagesTrait;

    public function getAll(){
        return Developer::select('id', 'name_ar')->get();
    }

    public function getById($id){
        return Developer::findOrFail($id);
    }

    public function create($data){
        $developer = Developer::create([
            'name_ar'=>$data['name_ar'],
            'name_en'=>$data['name_en'],
            'description_ar'=>$data['description_ar'],
            'description_en'=>$data['description_en'],
            'logo'=>$this->uploadImage($data['logo'],'developers')
        ]);
        return $developer ? true : false;
    }

    public function update($data, $id){
        $developer = Developer::findOrFail($id);
        $developer->fill(
            [
                'name_ar'=>$data['name_ar'],
                'name_en'=>$data['name_en'],
                'description_ar'=>$data['description_ar'],
                'description_en'=>$data['description_en'],
            ]
        );
        if (isset($data['logo'])) {
            $this->deleteImage($developer->logo);
            $developer->logo = $this->uploadImage($data['logo'],'developers');
        }
        return $developer->save();
    }
}