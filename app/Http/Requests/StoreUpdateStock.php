<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateStock extends FormRequest
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
            'name' => 'required|min:2',
            'amount' => 'required|integer|min:1',
            'category' => 'required|min:2',
            'validity' => 'nullable|date'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=> 'O nome do produto é obrigatório!',
            'name.min'=> 'O nome do produto deve ter pelo menos 2 caracteres!',

            'amount.required'=> 'A quantidade dos produtos é obrigatória!',
            'amount.min'=> 'Insira pelo menos 1 produto!',

            'category.required'=> 'A categoria do produto é um campo obrigatório!',
            'category.min'=> 'A categoria do produto deve ter pelo menos 2 caracteres!'
        ];
    }
}
