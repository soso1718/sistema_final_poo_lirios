<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePatient extends FormRequest
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
        $patientId = $this->route('patient');

        return [
            'name'=> 'required|min:3',
            'cpf'=> 'required|size:14|unique:patients,cpf,' . $patientId,
            'email'=> 'required|email|unique:patients,email,'. $patientId,
        ];
    }

    public function messages()
    {
        return[
            'name.required'=> 'O nome do paciente é obrigatório!',
            'name.min'=> 'O nome do paciente deve ter pelo menos 3 caracteres!',

            'cpf.required'=> 'O CPF do paciente é obrigatório',
            'cpf.size'=> 'O CPF deve conter exatamente 11 números!',
            'cpf.unique'=> 'Este CPF já está cadastrado!',

            'email.required'=> 'O e-mail do paciente é obrigatório!',
            'email.email'=> 'Informe um e-mail válido!',
            'email.unique'=> 'Este e-mail já está cadastrado!'
        ];
    }
}
