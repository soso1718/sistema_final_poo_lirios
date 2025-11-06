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
        $request->validate([
            'name'=> 'required|min:3',
            'specialty'=> 'required|min:3',
            // 'avaliable_times'=> 'required'
        ], [
            'name.required'=> 'O nome do profissional é obrigatório!',
            'name.min'=> 'O nome do profissional deve ter pelo menos 3 caracteres!',

            'specialty.required'=> 'A especialidade do profissional é obrigatória!',
            'specialty.min'=> 'A especialidade do profissional deve ter pelo menos 3 caracteres!',

            // 'avaliable_times.required'=> 'Os horários do profissional é um campo obrigatório!',
           
        ]);

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
         $request->validate([
            'name'=> 'required|min:3',
            'specialty'=> 'required|min:3',
            // 'avaliable_times'=> 'required'
        ], [
            'name.required'=> 'O nome do profissional é obrigatório!',
            'name.min'=> 'O nome do profissional deve ter pelo menos 3 caracteres!',

            'specialty.required'=> 'A especialidade do profissional é obrigatória!',
            'specialty.min'=> 'A especialidade do profissional deve ter pelo menos 3 caracteres!',

            // 'avaliable_times.required'=> 'Os horários do profissional é um campo obrigatório!',
        ]);

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
