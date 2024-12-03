<?php

namespace App\Http\Requests\Dishes;

use Illuminate\Foundation\Http\FormRequest;

class DishRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'ingredients' => 'nullable|string',
            'dish_image' => 'nullable|string',
            'category_id' => 'required|exists:categories,category_id',
            'preparation_time' => 'required|integer|min:1'
        ];
    }
}
