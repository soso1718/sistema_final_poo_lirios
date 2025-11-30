<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateScheduling extends FormRequest
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
            'patient_name' => 'required|min:2',
            'patient_id' => 'required|size:14',
            'service' => 'required|min:3',
            'time' => 'required',
            'date' => 'required|date',
            'professional'=> 'required|min:2',
            'notes'=> 'nullable'
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->date) {
            $this->merge([
                'date' => implode('-', array_reverse(explode('/', $this->date)))
            ]);
        }
    }

    public function messages()
    {
        return[
            'patient_name.required'=> 'O nome do paciente é obrigatório!',
            'patient_name.min'=> 'O nome do paciente deve ter pelo menos 2 caracteres!',

            'patient_id.required'=> 'O CPF do paciente é obrigatório',
            'patient_id.size'=> 'O CPF deve conter exatamente 11 números!',

            'service.required'=> 'Insira o serviço do agendamento!',
            'service.min'=> 'O nome do serviço deve ter pelo menos 3 carateres!',

            'time.required'=> 'O horário do agendamento é obrigatório!',
            'date.required'=> 'A data do agendamento é obrigatória!',
            'date.date'=> 'Insira uma data válida no formato DD/MM/AAAA!',

            'professional.required'=> 'Escolha o profissional que irá realizar o atendimento!'
        ];
    }
}
