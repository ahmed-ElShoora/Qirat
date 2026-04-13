<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateIntroRequest;
use App\Http\Requests\EditIntroRequest;
use App\Http\Services\Admin\Intro\IntroService;

class IntroController extends Controller
{
    public function __construct(
        private IntroService $introService
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $intros = $this->introService->getAll();
        return view('admin.intro.index',compact('intros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.intro.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateIntroRequest $request)
    {
        $result = $this->introService->create($request->validated());
        if (!$result) {
            return back()->withErrors(['error' => 'Failed to create intro. Please try again.']);
        }
        return redirect()->route('admin.intros.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $intro = $this->introService->getById($id);
        return view('admin.intro.edit',compact('intro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditIntroRequest $request, string $id)
    {
        $result = $this->introService->update($request->validated(), $id);
        if (!$result) {
            return back()->withErrors(['error' => 'Failed to update intro. Please try again.']);
        }
        return redirect()->route('admin.intros.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->introService->delete($id);
        if (!$result) {
            return back()->withErrors(['error' => 'Failed to delete intro. Please try again.']);
        }
        return redirect()->route('admin.intros.index');
    }
}
