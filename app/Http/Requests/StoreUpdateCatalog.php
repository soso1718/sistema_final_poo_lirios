<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCatalog extends FormRequest
{
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
            'price'=> 'required|min:0.01',
            'description'=> 'required|string',
            'average_time'=> 'required|string',
            'materials_used'=> 'required|string',
            'contraindications'=> 'required|string'
        
        ];
    }

    public function messages()
    {
        return [
            'name.required'=> 'O nome do procedimento é obrigatório!',
            'name.min'=> 'O nome do procedimento deve ter pelo menos 3 caracteres!',

            'price.required'=> 'O preço é obrigatório!',
            'price.min'=> 'Insira um valor válido!',

            'description.required'=> 'A descrição do procedimento é um campo obrigatório!',
            'average_time.required'=> 'O tempo médio do procedimento é um campo obrigatório!',
            'materials_used.required'=> 'Os materiais usados no procedimento é um campo obrigatório!',
            'contraindications.required'=> 'As contraindicações do procedimento é um campo obrigatório!'
        ];
    }
}
