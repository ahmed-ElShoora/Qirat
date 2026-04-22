<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ImageResource;
use App\Http\Resources\SignatureResource;

class FullUnitResource extends JsonResource
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
            'sqm' => $this->sqm,
            'address' => $this->address,
            'master_image' => asset('storage/' . $this->primary_image),
            'developer_price' => $this->developer_price,
            'resale_price' => $this->other_type == "resale" ? $this->resale_price : null,
            'project_type' => $this->other_type,
            'project_state' => $this->project_state,
            'phone' => $this->phone_number,
            'whatsapp' => $this->whatsapp,
            'latitude' => $this->lat,
            'longitude' => $this->lng,
            'bed_number' => $this->bed_number,
            'bathroom_number' => $this->bathroom_number,
            'down_payment_percentage' => $this->down_payment_percentage,
            'master_plan' => asset('storage/' . $this->master_plan),
            'digital_brochure' => $this->digital_brochure != null ? asset('storage/' . $this->digital_brochure) : null,
            'pay_amount_per_years' => $this->pay_amount_per_years,
            'payment_percentage_per_year' => $this->payment_percentage_per_year,
            'years_count' => $this->years_count,
            'floor' => $this->floor,
            'parking' => $this->parking,
            'view' => $this->view,
            'status' => $this->status,
            'developer' => [
                'id' => $this->developer->id,
                'name' => $this->developer->name,
                'description' => $this->developer->description,
                'logo' => asset('storage/' . $this->developer->logo)
            ],
            'type' => [
                'id' => $this->type->id,
                'name' => $this->type->name
            ],
            'images' => ImageResource::collection($this->images),
            'signatures' => SignatureResource::collection($this->signatures)
        ];
    }
}
