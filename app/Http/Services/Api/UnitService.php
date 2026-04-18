<?php

namespace App\Http\Services\Api;

use App\Models\Unit;
use App\Http\Resources\UnitsResource;
use App\Http\Resources\FullUnitResource;

class UnitService
{
    public function getUnits($data)
    {
        $exclusiveUnits = Unit::query()
        ->select(
            'id',
            'title_'.app()->getLocale() . ' as title',
            'address_'.app()->getLocale() . ' as address',
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
        )->with(
            'developer:id,name_'.app()->getLocale() . ' as name,logo',
            'type:id,name_'.app()->getLocale() . ' as name'
        )->where('is_hide', false)

        ->when($data['title'] ?? null, fn($q) => $q->where("title_".app()->getLocale(), 'like', "%{$data['title']}%"))
        ->when($data['sqm'] ?? null, fn($q) => $q->where('sqm', $data['sqm']))
        ->when($data['other_type'] ?? null, fn($q) => $q->where('other_type', $data['other_type']))
        ->when($data['project_state'] ?? null, fn($q) => $q->where('project_state', $data['project_state']))
        ->when($data['type'] ?? null, fn($q) => $q->where('type_id', $data['type']))
        ->when($data['developer'] ?? null, fn($q) => $q->where('developer_id', $data['developer']))
        ->when($data['min_price'] ?? null, fn($q) => $q->where('developer_price', '>=', $data['min_price']))
        ->when($data['max_price'] ?? null, fn($q) => $q->where('developer_price', '<=', $data['max_price']))
        ->when($data['bed'] ?? null, fn($q) => $q->where('bed_number', $data['bed']))
        ->when($data['bathroom'] ?? null, fn($q) => $q->where('bathroom_number', $data['bathroom']))
        ->latest()
        ->get();


        return UnitsResource::collection($exclusiveUnits);
    }

    public function getUnitById($id)
    {
        $unit = Unit::select(
            'id',
            'title_'.app()->getLocale() . ' as title',
            'sqm',
            'address_'.app()->getLocale() . ' as address',
            'primary_image',
            'type_id',
            'developer_id',
            'other_type',
            'developer_price',
            'project_state',
            'resale_price',
            'phone_number',
            'whatsapp',
            'lat',
            'lng',
            'bed_number',
            'bathroom_number',
            'down_payment_percentage',
            'master_plan',
            'digital_brochure',
            'pay_amount_per_years',
            'payment_percentage_per_year',
            'is_hide',
            'years_count'
        )->with(
            'developer:id,name_'.app()->getLocale() . ' as name,description_'.app()->getLocale() . ' as description,logo',
            'type:id,name_'.app()->getLocale() . ' as name',
            'images:id,unit_id,image',
            'signatures:id,name_'.app()->getLocale() . ' as name,icon'
        )->where('is_hide', false)
        ->findOrFail($id);

        return FullUnitResource::make($unit);
    }
}