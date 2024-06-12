<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'price' => 'required|integer|min:0',
            'price_fake' => 'nullable|integer|min:0|different:price',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'status' => 'boolean',
            'view' => 'integer|min:0',
            'rating' => 'numeric|min:0|max:5', // Assuming rating is from 0 to 5
            'category_id' => 'required|exists:categories,id',
            // 'user_id' => 'required|exists:users,id',
        ];
    }
}
