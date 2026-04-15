<?php
namespace App\Http\Services\Admin\Type;
use App\Models\Type;
class TypeService
{
    public function getAll(){
        return Type::select('id', 'name_ar')->get();
    }

    public function getById($id){
        return Type::findOrFail($id);
    }

    public function create($data){
        $type = Type::create([
            'name_ar'=>$data['name_ar'],
            'name_en'=>$data['name_en'],
        ]);
        return $type ? true : false;
    }

    public function update($data, $id){
        $type = Type::findOrFail($id);
        $type->fill(
            [
                'name_ar'=>$data['name_ar'],
                'name_en'=>$data['name_en'],
            ]
        );
        return $type->save();
    }
}