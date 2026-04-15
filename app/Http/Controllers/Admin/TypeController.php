<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeRequest;
use App\Http\Services\Admin\Type\TypeService;

class TypeController extends Controller
{
    public function __construct(
        private TypeService $typeService
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = $this->typeService->getAll();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeRequest $request)
    {
        $result = $this->typeService->create($request->validated());
        if (!$result) {
            return back()->withErrors(['error' => 'Failed to create type. Please try again.']);
        }
        return redirect()->route('admin.types.index')->with('success', 'Type created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type = $this->typeService->getById($id);
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeRequest $request, string $id)
    {
        $result = $this->typeService->update($request->validated(), $id);
        if (!$result) {
            return back()->withErrors(['error' => 'Failed to update type. Please try again.']);
        }
        return redirect()->route('admin.types.index')->with('success', 'Type updated successfully');
    }
}
