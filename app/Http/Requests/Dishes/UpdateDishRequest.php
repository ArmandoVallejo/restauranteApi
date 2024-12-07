<?php

namespace App\Http\Requests\Dishes;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDishRequest extends FormRequest
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
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'price' => 'sometimes|numeric|min:0',
            'ingredients' => 'sometimes|string',
            'dish_image' => 'sometimes|string',
            'category_id' => 'sometimes|exists:categories,category_id',
            'preparation_time' => 'sometimes|integer|min:1'
        ];
    }
    public function messages(): array
    {
        return [
            'name.string' => 'El nombre debe ser texto',
            'name.max' => 'El nombre no puede exceder los 255 caracteres',

            'description.string' => 'La descripción debe ser texto',

            'price.numeric' => 'El precio debe ser un número',
            'price.min' => 'El precio debe ser mayor a 0',

            'ingredients.string' => 'Los ingredientes deben ser texto',

            'dish_image.string' => 'La imagen debe ser texto',

            'category_id.exists' => 'La categoría seleccionada no existe',

            'preparation_time.integer' => 'El tiempo de preparación debe ser un número entero',
            'preparation_time.min' => 'El tiempo de preparación debe ser mayor a 0'
        ];
    }
}
