<?php

namespace App\Http\Services\Api;

use App\Models\Love;
use App\Http\Resources\LoveResource;

class LoveService
{
    public function getLoves()
    {
        $loves = Love::select('unit_id', 'user_id')->where('user_id', auth()->id())
        ->with([
            'unit' => function ($query) {
                $query->select(
                    'id',
                    'title_' . app()->getLocale() . ' as title',
                    'address_' . app()->getLocale() . ' as address',
                    'sqm',
                    'primary_image',
                    'developer_id',
                    'type_id',
                    'other_type',
                    'developer_price',
                    'resale_price',
                    'phone_number',
                    'whatsapp',
                    'years_count',
                    'lng',
                    'lat',
                    'bed_number',
                    'bathroom_number',
                    'project_state',
                    'is_hide'
                )->with([
                    'developer:id,name_' . app()->getLocale() . ' as name,logo',
                    'type:id,name_' . app()->getLocale() . ' as name'
                ])->where('is_hide', false);
            }
        ])
        ->get();

        return LoveResource::collection($loves);
    }

    public function switchLove(array $data)
    {
        $love = Love::where('user_id', auth()->id())
            ->where('unit_id', $data['unit_id'])
            ->first();
        if ($love) {
            return $love->delete();
        }
        return (bool) Love::create([
            'user_id' => auth()->id(),
            'unit_id' => $data['unit_id']
        ]);
    }
}