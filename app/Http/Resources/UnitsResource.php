<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UnitsResource extends JsonResource
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
           'bed_number' => $this->bed_number,
           'bathroom_number' => $this->bathroom_number,
           'project_state' => $this->project_state,
           'lat' => $this->lat,
           'lng' => $this->lng,
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
