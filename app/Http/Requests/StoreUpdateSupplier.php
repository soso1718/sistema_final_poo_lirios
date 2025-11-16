<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSupplier extends FormRequest
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
        $supplierId = $this->route('supplier');
        
        return [
            'name' => 'required|min:3',
            'cnpj' => 'required|size:18|unique:suppliers,cnpj,' . $supplierId,
            'contact'=> 'required|email|unique:suppliers,contact,' . $supplierId,
            'products_supplied' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return[
            'name.required'=> 'O nome do fornecedor é obrigatório!',
            'name.min'=> 'O nome do fornecedor deve ter pelo menos 3 caracteres!',

            'cnpj.required'=> 'O CNPJ do fornecedor é obrigatório',
            'cnpj.size'=> 'O CNPJ deve conter exatamente 14 números!',
            'cnpj.unique'=> 'Este CNPJ já está cadastrado!',

            'contact.required'=> 'O contato do fornecedor é obrigatório!',
            'contact.email'=> 'Informe um e-mail válido!',
            'contact.unique'=> 'Este e-mail já está cadastrado!',

            'products_supplied.required'=> 'Os produtos fornecidos são obrigatórios!',
            'products_supplied.min'=> 'Os produtos fornecidos devem ter pelo menos 3 caracteres!'
        ];
    }
}
