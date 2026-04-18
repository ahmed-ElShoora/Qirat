<?php 

namespace App\Http\Services\Api;

use App\Models\Developer;
use App\Http\Resources\DeveloperResource;

class DeveloperService {
    public function getDevelopers(){
        $count = Developer::count();
        $developers = Developer::select(
            'id',
            'name_'.App()->getLocale().' as name',
            'logo'
        )->get();
        return [
            'count'=>$count,
            'developers'=>DeveloperResource::collection($developers)
        ];
    }
}