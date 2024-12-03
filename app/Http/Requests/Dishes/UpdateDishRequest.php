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
}
