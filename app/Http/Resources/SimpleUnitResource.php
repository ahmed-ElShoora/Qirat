<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SimpleUnitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
           'id' => $this->id,
           'title' => $this->title,
           'address' => $this->address,
           'sqm' => $this->sqm,
           'image' => asset('storage/' . $this->primary_image),
           'price' => $this->other_type == "developer" ? $this->developer_price : $this->resale_price,
           'phone' => $this->phone_number,
           'whatsapp' => $this->whatsapp,
           'years' => $this->years_count,
           'other_type' => $this->other_type,
           'project_state' => $this->project_state,
           'developer' => [
                'id' => $this->developer->id,
                'name' => $this->developer->name,
                'logo' => asset('storage/' . $this->developer->logo)
            ],
            'type' => [
                'id' => $this->type->id,
                'name' => $this->type->name
            ]
        ];
    }
}
