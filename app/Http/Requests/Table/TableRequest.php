<?php

namespace App\Http\Requests\Table;

use Illuminate\Foundation\Http\FormRequest;

class TableRequest extends FormRequest
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
            'qr_code' => 'required|string|max:255',
            'is_occupied' => 'required|boolean',
        ];
    }
    public function messages(): array
    {
        return [
            'qr_code.required' => 'El código QR es obligatorio',
            'qr_code.string' => 'El código QR debe ser texto',
            'qr_code.max' => 'El código QR no puede exceder los 255 caracteres',

            'is_occupied.required' => 'El estado de ocupación es obligatorio',
            'is_occupied.boolean' => 'El estado de ocupación debe ser verdadero o falso'
        ];
    }
}
