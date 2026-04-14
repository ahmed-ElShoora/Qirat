<?php 

namespace App\Http\Services\Api;

use App\Models\Intro;
use Illuminate\Support\Facades\App;

class IntroService
{
    public function getIntro(){
        return Intro::select(
            'id', 
            'title_'.App()->getLocale().' as title',
            'description_'.App()->getLocale().' as description',
            'link', 
            'image_icon', 
            'image_background'
        )->get();
    }
}