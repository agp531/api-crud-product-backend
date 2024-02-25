<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'max:5000'],
            'stock' => ['required', 'integer'],
            'price' => ['required', 'decimal:2'],
            'photo' => ['nullable', 'file', 'image', 'max:3072'],
        ];
    }
}
