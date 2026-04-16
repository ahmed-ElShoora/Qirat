<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\Unit\UnitService;
use App\Http\Requests\CreateUnitRequest;
use App\Http\Requests\UpdateUnitRequest;

class UnitController extends Controller
{
    public function __construct(
        protected UnitService $unitService
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = $this->unitService->index();
        return view('admin.unit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->unitService->create();
        return view('admin.unit.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUnitRequest $request)
    {
        $data = $request->validated();
        $result = $this->unitService->store($data);
        if (!$result) {
            return back()->withErrors(['error' => 'Failed to create unit. Please try again.']);
        }
        return redirect()->route('admin.units.index')->with('success', 'Unit created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->unitService->edit($id);
        if (!$data) {
            return back()->withErrors(['error' => 'Unit not found.']);
        }
        return view('admin.unit.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitRequest $request, string $id)
    {
        $data = $request->validated();
        $result = $this->unitService->update($data, $id);
        if (!$result) {
            return back()->withErrors(['error' => 'Failed to update unit. Please try again.']);
        }
        return redirect()->route('admin.units.index')->with('success', 'Unit updated successfully.');
    }

    public function promotion($id)
    {
        $result = $this->unitService->promotion($id);
        if (!$result) {
            return back()->withErrors(['error' => 'Failed to update promotion status. Please try again.']);
        }
        return redirect()->route('admin.units.index')->with('success', 'Unit promotion status updated successfully.');
    }

    public function hide($id)
    {
        $result = $this->unitService->hide($id);
        if (!$result) {
            return back()->withErrors(['error' => 'Failed to update visibility status. Please try again.']);
        }
        return redirect()->route('admin.units.index')->with('success', 'Unit visibility status updated successfully.');
    }
}
