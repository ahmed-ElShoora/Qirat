<?php 

namespace App\Http\Services\Api;

use App\Models\Type;
use Illuminate\Support\Facades\App;

class TypeService
{
    public function getTypes(){
        return Type::select(
            'id', 
            'name_'.App()->getLocale().' as name',
        )->get();
    }
}