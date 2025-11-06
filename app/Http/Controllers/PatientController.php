<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Redirect;

class PatientController extends Controller
{

    public function index()
    {
        $patients = Patient::all();
        return view("patients.index", compact("patients"));
    }

    public function create()
    {
        return view('patients.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|min:3',
            'cpf'=> 'required|size:14|unique:patients,cpf',
            'email'=> 'required|email|unique:patients,email'
        ], [
            'name.required'=> 'O nome do paciente é obrigatório!',
            'name.min'=> 'O nome do paciente deve ter pelo menos 3 caracteres!',

            'cpf.required'=> 'O CPF do paciente é obrigatório',
            'cpf.size'=> 'O CPF deve conter exatamente 11 números!',
            'cpf.unique'=> 'Este CPF já está cadastrado!',

            'email.required'=> 'O e-mail do paciente é obrigatório!',
            'email.email'=> 'Informe um e-mail válido!',
            'email.unique'=> 'Este e-mail já está cadastrado!'
        ]);

        Patient::create($request->all());
        return redirect()->route('patients.index') ->with('success', 'Paciente cadastrado com sucesso!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=> 'required|min:3',
            'cpf'=> 'required|size:14|unique:patients,cpf'.$id,
            'email'=> 'required|email|unique:patients,email'.$id
        ], [
            'name.required'=> 'O nome do paciente é obrigatório!',
            'name.min'=> 'O nome do paciente deve ter pelo menos 3 caracteres!',

            'cpf.required'=> 'O CPF do paciente é obrigatório',
            'cpf.size'=> 'O CPF deve conter exatamente 11 números!',
            'cpf.unique'=> 'Este CPF já está cadastrado!',

            'email.required'=> 'O e-mail do paciente é obrigatório!',
            'email.email'=> 'Informe um e-mail válido!',
            'email.unique'=> 'Este e-mail já está cadastrado!'
    ]);

        $patient = Patient::findOrFail($id);
        $patient->update($request->all());
        return redirect()->route('patients.index') ->with('success', 'Paciente atualizado com sucesso!');
    }


    public function destroy(string $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect()->back() ->with('success', 'Paciente excluído com sucesso!');
    }
}
