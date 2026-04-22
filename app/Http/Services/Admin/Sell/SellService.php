<?php

namespace App\Http\Services\Admin\Sell;

use App\Models\Sell;

class SellService
{
    public function index()
    {
        $sells = Sell::where('status', '!=', 'hidden')->with('type:id,name_ar')->get();
        return $sells;
    }

    public function hide($sell_id)
    {
        $sell = Sell::find($sell_id);
        if (!$sell) {
            return false;
        }
        return $sell->update(['status' => 'hidden']);
    }
}