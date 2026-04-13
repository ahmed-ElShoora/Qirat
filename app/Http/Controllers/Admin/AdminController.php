<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdminRequest;
use App\Http\Services\Admin\Admins\AdminService;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->adminService = new AdminService();
    }

    public function index(){
        $admins = $this->adminService->getAll();
        return view('admin.admin.index',compact('admins'));
    }

    public function delete($id){
        $this->adminService->delete($id);
        return redirect()->back();
    }

    public function create(){
        return view('admin.admin.create');
    }

    public function store(CreateAdminRequest $request){
        $this->adminService->create($request);
        return redirect()->route('admin.admins');
    }
}
