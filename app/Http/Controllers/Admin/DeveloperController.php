<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDeveloperRequest;
use App\Http\Requests\EditDeveloperRequest;
use App\Http\Services\Admin\Developer\DeveloperService;

class DeveloperController extends Controller
{
    public function __construct(
        private DeveloperService $developerService
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $developers = $this->developerService->getAll();
        return view('admin.developer.index',compact('developers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.developer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateDeveloperRequest $request)
    {
        $result = $this->developerService->create($request->validated());
        if (!$result) {
            return back()->withErrors(['error' => 'Failed to create Developer. Please try again.']);
        }
        return redirect()->route('admin.developers.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $developer = $this->developerService->getById($id);
        return view('admin.developer.edit',compact('developer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditDeveloperRequest $request, string $id)
    {
        $result = $this->developerService->update($request->validated(), $id);
        if (!$result) {
            return back()->withErrors(['error' => 'Failed to update developer. Please try again.']);
        }
        return redirect()->route('admin.developers.index');
    }
}
