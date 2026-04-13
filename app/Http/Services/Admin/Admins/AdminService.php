<?php
namespace App\Http\Services\Admin\Admins;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminService
{
    public function getAll(){
        return Admin::get();
    }
    public function delete($id){
        Admin::findOrFail($id)->delete();
    }
    public function create($request){
        Admin::create([
            'email'=>$request->email,
            'name'=>$request->name,
            'password'=>Hash::make($request->password)
        ]);
    }
}