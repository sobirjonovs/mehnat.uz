<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $passport_serial_number
 * @property mixed $surname
 * @property mixed $firstname
 * @property mixed $patronymic
 * @property mixed $position
 * @property mixed $phone
 * @property mixed $address
 * @property mixed $organization
 */
class EmployerResource extends JsonResource
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
            'passport_serial_number' => $this->passport_serial_number,
            'surname' => $this->surname,
            'name' => $this->firstname,
            'patronymic' => $this->patronymic,
            'position' => $this->position,
            'phone' => $this->phone,
            'address' => $this->address,
            'works_at' => $this->organization->name
        ];
    }
}
