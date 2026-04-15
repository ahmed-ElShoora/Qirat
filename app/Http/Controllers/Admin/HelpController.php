<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateHelpRequest;
use App\Http\Requests\EditHelpRequest;
use App\Http\Services\Admin\Help\HelpService;

class HelpController extends Controller
{
    public function __construct(
        private HelpService $helpService
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $helps = $this->helpService->getAllHelps();
        return view('admin.help.index', compact('helps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.help.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateHelpRequest $request)
    {
        $result = $this->helpService->createHelp($request->validated());
        if (!$result) {
            return back()->withErrors(['error' => 'Failed to create help. Please try again.']);
        }
        return redirect()->route('admin.helps.index')->with('success', 'Help created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $help = $this->helpService->getHelpById($id);
        return view('admin.help.edit', compact('help'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditHelpRequest $request, string $id)
    {
        $result = $this->helpService->updateHelp($id, $request->validated());
        if (!$result) {
            return back()->withErrors(['error' => 'Failed to update help. Please try again.']);
        }
        return redirect()->route('admin.helps.index')->with('success', 'Help updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->helpService->deleteHelp($id);
        if (!$result) {
            return back()->withErrors(['error' => 'Failed to delete help. Please try again.']);
        }
        return redirect()->route('admin.helps.index')->with('success', 'Help deleted successfully');
    }
}
