<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProfessionals extends FormRequest
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
            'name'=> 'required|min:3',
            'specialty'=> 'required|min:3'
        ];
    }

    public function messages()
    {
       return[
            'name.required'=> 'O nome do profissional é obrigatório!',
            'name.min'=> 'O nome do profissional deve ter pelo menos 3 caracteres!',

            'specialty.required'=> 'A especialidade do profissional é obrigatória!',
            'specialty.min'=> 'A especialidade do profissional deve ter pelo menos 3 caracteres!'
       ];
    }
}
