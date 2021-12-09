<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'passport_serial_number' => 'required|string',
            'surname' => 'required|string',
            'firstname' => 'required|string',
            'patronymic' => 'required|string',
            'position' => 'required|string',
            'phone' => 'required|numeric|starts_with:998|digits:12',
            'address' => 'required|string',
        ];
    }
}
