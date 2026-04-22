<?php

namespace App\Http\Services\Api;

use App\Models\Sell;

class SellService
{
    public function addSell(array $data): bool
    {
        Sell::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'type_id' => $data['type_id'],
            'location' => $data['location'],
            'price' => $data['price'],
            'sqm' => $data['sqm'],
            'description' => $data['description'] ?? null,
        ]);
        return true;
    }
}