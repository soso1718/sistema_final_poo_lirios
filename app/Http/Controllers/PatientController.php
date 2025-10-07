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
