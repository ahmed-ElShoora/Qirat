<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $kyc = $this->kyc
            ->sortByDesc('id')
            ->unique('type')
            ->keyBy('type');
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'kyc' => [
                'shares' => $kyc['shares']->status ?? 'not_submitted',
                'broker' => $kyc['broker']->status ?? 'not_submitted',
            ],
            'can_access' => [
                'shares' => ($kyc['shares']->status ?? null) === 'approved',
                'broker' => ($kyc['broker']->status ?? null) === 'approved',
            ],
        ];
    }
}
