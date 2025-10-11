<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professionals;

class ProfessionalsController extends Controller
{
    public function index()
    {
        $professionals = Professionals::all();
        return view('professionals.index', compact('professionals'));
    }

    public function create()
    {
        return view('professionals.create');
    }

    public function store(Request $request)
    {
        Professionals::create($request->all());
        return redirect()->route('professionals.index') ->with('success', 'Profissional cadastrado com sucesso!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $professional = Professionals::findOrFail($id);
        return view('professionals.edit', compact('professional'));
    }

    public function update(Request $request, string $id)
    {
        $professional = Professionals::findOrFail($id);
        $professional->update($request->all());
        return redirect()->route('professionals.index') ->with('success', 'Profissional atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $professional = Professionals::findOrFail($id);
        $professional->delete();
        return redirect()->back() ->with('success', 'Profissional excluído com sucesso!');
    }
}
