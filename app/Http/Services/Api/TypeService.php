<?php 

namespace App\Http\Services\Api;

use App\Models\Type;

class TypeService
{
    public function getTypes(){
        return Type::select(
            'id', 
            'name_'.App()->getLocale().' as name',
        )->get();
    }
}