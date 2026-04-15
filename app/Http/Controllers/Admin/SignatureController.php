<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSignatureRequest;
use App\Http\Requests\EditSignatureRequest;
use App\Http\Services\Admin\Signature\SignatureService;

class SignatureController extends Controller
{
    public function __construct(
        private SignatureService $signatureService
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $signatures = $this->signatureService->getAll();
        return view('admin.signatures.index', compact('signatures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.signatures.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSignatureRequest $request)
    {
        $result = $this->signatureService->create($request->validated());
        if (!$result) {
            return back()->withErrors(['error' => 'Failed to create signature. Please try again.']);
        }
        return redirect()->route('admin.signatures.index')->with('success', 'Signature created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $signature = $this->signatureService->getById($id);
        return view('admin.signatures.edit', compact('signature')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditSignatureRequest $request, string $id)
    {
        $result = $this->signatureService->update($request->validated(), $id);
        if (!$result) {
            return back()->withErrors(['error' => 'Failed to update signature. Please try again.']);
        }
        return redirect()->route('admin.signatures.index')->with('success', 'Signature updated successfully');
    }
}
