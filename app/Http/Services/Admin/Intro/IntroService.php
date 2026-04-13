<?php 

namespace App\Http\Services\Admin\Intro;

use App\Models\Intro;
use App\Traits\ManegeImagesTrait;

class IntroService
{
    use ManegeImagesTrait;

    public function getAll(){
        return Intro::select('id', 'title_ar')->get();
    }

    public function delete($id){
        $intro = Intro::findOrFail($id);
        $this->deleteImage($intro->image_icon);
        if ($intro->image_background) {
            $this->deleteImage($intro->image_background);
        }
        return $intro->delete();
    }

    public function create($data){
        $intro = new Intro();
        $intro->fill(
            [
                'title_ar'=>$data['title_ar'],
                'title_en'=>$data['title_en'],
                'description_ar'=>$data['description_ar'],
                'description_en'=>$data['description_en'],
                'link'=>$data['link'],
                'image_icon'=>$this->uploadImage($data['image_icon'],'intros')
            ]
        );
        if (isset($data['image_background'])) {
            $intro->image_background = $this->uploadImage($data['image_background'],'intros');
        }
        return $intro->save();
    }

    public function update($request, $id){
        $intro = Intro::findOrFail($id);
        $intro->fill(
            [
                'title_ar'=>$data['title_ar'],
                'title_en'=>$data['title_en'],
                'description_ar'=>$data['description_ar'],
                'description_en'=>$data['description_en'],
                'link'=>$data['link'],
            ]
        );
        if (isset($data['image_background'])) {
            $this->deleteImage($intro->image_background);
            $intro->image_background = $this->uploadImage($data['image_background'],'intros');
        }
        if (isset($data['image_icon'])) {
            $this->deleteImage($intro->image_icon);
            $intro->image_icon = $this->uploadImage($data['image_icon'],'intros');
        }
        return $intro->save();
    }
}