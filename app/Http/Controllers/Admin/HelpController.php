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
        $this->helpService->createHelp($request->validated());
        return redirect()->route('admin.helps.index');
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
        $this->helpService->updateHelp($id, $request->validated());
        return redirect()->route('admin.helps.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->helpService->deleteHelp($id);
        return redirect()->route('admin.helps.index');
    }
}
