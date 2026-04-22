<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\Sell\SellService;
use App\Models\Sell;

class SellController extends Controller
{
    public function __construct(
        private SellService $sellService
    ){}
    public function sells()
    {
        $sells = $this->sellService->index();
        return view('admin.sell.index', compact('sells'));
    }

    public function hideSell(Sell $sell)
    {
        $result = $this->sellService->hide($sell);
        if (!$result) {
            return back()->withErrors(['error' => 'Failed to hide sell. Please try again.']);
        }
        return redirect()->back()->with('success', 'Sell hidden successfully.');
    }
}
