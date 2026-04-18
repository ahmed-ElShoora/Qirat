<?php 

namespace App\Http\Services\Api;

use App\Models\Unit;
use App\Http\Resources\SimpleUnitResource;

class ExclusiveUnitService
{
    public function getExclusiveUnits(){
        $exclusiveUnit = Unit::select(
            'id',
            'title_'.app()->getLocale() . ' as title',
            'address_'.app()->getLocale() . ' as address',
            'sqm',
            'primary_image',
            'developer_id',
            'type_id',
            'developer_price',
            'resale_price',
            'phone_number',
            'whatsapp',
            'years_count',
            'other_type',
            'project_state'
        )->with(
            'developer:id,name_'.app()->getLocale() . ' as name,logo',
            'type:id,name_'.app()->getLocale() . ' as name'
        )->where('is_promotion', true)->first();
        return [
            'projects_cout' => Unit::where('is_hide', false)->count(),
            'exclusive_unit' => $exclusiveUnit != null ? SimpleUnitResource::make($exclusiveUnit) : null
        ];
    }
}