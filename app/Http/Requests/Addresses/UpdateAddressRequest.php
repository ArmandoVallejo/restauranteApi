<?php

namespace App\Http\Requests\Addresses;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
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
            'address' => 'sometimes|string|max:255',
            'latitude' => 'sometimes|numeric',
            'longitude' => 'sometimes|numeric',  
        ];
    }
    public function messages(): array
    {
        return [
            'address.string' => 'La dirección debe ser texto',
            'address.max' => 'La dirección no puede exceder los 255 caracteres',
            
            'latitude.numeric' => 'La latitud debe ser un número',
            
            'longitude.numeric' => 'La longitud debe ser un número'
        ];
    }
}
