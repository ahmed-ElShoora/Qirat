<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePhaseRequest;
use App\Http\Requests\UpdatePhaseRequest;
use App\Http\Services\Admin\Phases\PhasesService;

class PhasesController extends Controller
{
    public function __construct(
        protected PhasesService $phasesService
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index($unit_id)
    {
        $phases = $this->phasesService->index($unit_id);
        return view('admin.phases.index', compact('phases','unit_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($unit_id)
    {
        return view('admin.phases.create', compact('unit_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($unit_id,CreatePhaseRequest $request)
    {
        $result = $this->phasesService->store($unit_id,$request->validated());
        if (!$result) {
            return back()->withErrors(['error' => 'Failed to create phase. Please try again.']);
        }
        return redirect()->route('admin.phases.index', $result['unit_id'])->with('success', 'Phase created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($unit_id, $id)
    {
        $phase = $this->phasesService->edit($id);
        if (!$phase) {
            return back()->withErrors(['error' => 'Phase not found.']);
        }
        return view('admin.phases.edit', compact('phase','unit_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhaseRequest $request, string $unit_id, string $id)
    {
        $result = $this->phasesService->update($id, $request->validated());
        if (!$result) {
            return back()->withErrors(['error' => 'Failed to update phase. Please try again.']);
        }
        return redirect()->route('admin.phases.index', $result->unit_id)->with('success', 'Phase updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $unit_id, string $id)
    {
        $result = $this->phasesService->destroy($unit_id,$id);
        if (!$result) {
            return back()->withErrors(['error' => 'Failed to delete phase. Please try again.']);
        }
        return redirect()->route('admin.phases.index', $unit_id)->with('success', 'Phase deleted successfully.');
    }
}
