<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'user_id' => 'sometimes|exists:users,user_id',
            'address_id' => 'sometimes|exists:addresses,address_id',
            'table_id' => 'sometimes|exists:tables,table_id',
            'status' => 'sometimes|in:pending,preparing,ready,completed',
        ];
    }
}
