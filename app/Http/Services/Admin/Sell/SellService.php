<?php

namespace App\Http\Services\Admin\Sell;

use App\Models\Sell;

class SellService
{
    public function index()
    {
        $sells = Sell::load('type:id,name_ar')->get();
        return $sells;
    }

    public function hide(Sell $sell)
    {
        return $sell->update(['status' => 'hidden']);
    }
}