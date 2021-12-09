<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $name
 * @property mixed $director
 * @property mixed $address
 * @property mixed $email
 * @property mixed $website
 * @property mixed $phone
 */
class OrganizationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'director' => $this->director->name,
            'address' => $this->address,
            'email' => $this->email,
            'website' => $this->website,
            'phone' => $this->phone
        ];
    }
}
