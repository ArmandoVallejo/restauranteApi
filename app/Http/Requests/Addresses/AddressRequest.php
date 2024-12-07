<?php

namespace App\Http\Requests\Addresses;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'address' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'address.required' => 'La dirección es obligatoria',
            'address.string' => 'La dirección debe ser texto',
            'address.max' => 'La dirección no puede exceder los 255 caracteres',
            
            'latitude.required' => 'La latitud es obligatoria',
            'latitude.numeric' => 'La latitud debe ser un número',
            'latitude.between' => 'La latitud debe estar entre -90 y 90 grados',
            
            'longitude.required' => 'La longitud es obligatoria',
            'longitude.numeric' => 'La longitud debe ser un número',
            'longitude.between' => 'La longitud debe estar entre -180 y 180 grados'
        ];
    }
}
