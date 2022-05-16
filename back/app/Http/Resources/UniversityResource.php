<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UniversityResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'alpha_two_code' => $this->alpha_two_code,
            'domains' => $this->domains,
            'country' => $this->country,
            'state_province' => $this->state_province,
            'web_pages' => $this->web_pages,
            'name' => $this->name,
        ];
    }
}
