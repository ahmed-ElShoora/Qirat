<?php
namespace App\Http\Services\Api;
use App\Models\Help;
use Illuminate\Support\Facades\App;

class HelpService
{
    public function getAllHelps()
    {
        return Help::select(
            'id',
            'title_'.App()->getLocale().' as title',
            'description_'.App()->getLocale().' as description',
            'link',
            'image_icon'
        )->get();
    }
}