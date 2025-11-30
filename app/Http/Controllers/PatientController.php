<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePatient;
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


    public function store(StoreUpdatePatient $request)
    {
        Patient::create($request->all());
        return redirect()->route('patients.index') ->with('success', 'Paciente cadastrado com sucesso!');
    }

    public function show(string $id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.show', compact('patient'));
    }

    public function edit(string $id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    public function update(StoreUpdatePatient $request, string $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->update($request->all());
        return redirect()->route('patients.index') ->with('success', 'Paciente atualizado com sucesso!');
    }


    public function destroy(string $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect()->route('patients.index') ->with('success', 'Paciente excluído com sucesso!');
    }
}
