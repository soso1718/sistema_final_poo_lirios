<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;

class CatalogController extends Controller
{
    public function index()
    {
       $catalogs = Catalog::all();
       return view("catalogs.index", compact('catalogs'));
    }

 
    public function create()
    {
        return view('catalogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|min:3',
            'price'=> 'required|numeric|min:0.01',
            'description'=> 'required|string',
            'average_time'=> 'required|string',
            'materials_used'=> 'required|string',
            'contraindications'=> 'required|string'
        ], [
            'name.required'=> 'O nome do procedimento é obrigatório!',
            'name.min'=> 'O nome do procedimento deve ter pelo menos 3 caracteres!',

            'price.required'=> 'O preço é obrigatório!',
            'price.min'=> 'Insira um valor válido!',

            'description.required'=> 'A descrição do procedimento é um campo obrigatório!',
            'average_time.required'=> 'O tempo médio do procedimento é um campo obrigatório!',
            'materials_used.required'=> 'Os materiais usados no procedimento é um campo obrigatório!',
            'contraindications.required'=> 'As contraindicações do procedimento é um campo obrigatório!'
        ]);

        Catalog::create($request->all());
        return redirect()->route('catalogs.index') ->with('success', 'Procediemnto adicionado com sucesso!');
    }

    public function show(string $id)
    {
        //
    }

  
    public function edit(string $id)
    {
        $catalog = Catalog::findOrFail($id);
        return view('catalogs.edit', compact('catalog'));
    }

 
    public function update(Request $request, string $id)
    {   
        $request->validate([
            'name'=> 'required|min:3',
            'price'=> 'required|numeric|min:0.01',
            'description'=> 'required|string',
            'average_time'=> 'required|string',
            'materials_used'=> 'required|string',
            'contraindications'=> 'required|string'
        ], [
            'name.required'=> 'O nome do procedimento é obrigatório!',
            'name.min'=> 'O nome do procedimento deve ter pelo menos 3 caracteres!',

            'price.required'=> 'O preço é obrigatório!',
            'price.min'=> 'Insira um valor válido!',

            'description.required'=> 'A descrição do procedimento é um campo obrigatório!',
            'average_time.required'=> 'O tempo médio do procedimento é um campo obrigatório!',
            'materials_used.required'=> 'Os materiais usados no procedimento é um campo obrigatório!',
            'contraindications.required'=> 'As contraindicações do procedimento é um campo obrigatório!'
        ]);

        $catalog = Catalog::findOrFail($id);
        $catalog->update($request->all());
        return redirect()->route('catalogs.index') ->with('success', 'Procedimento atualizado com sucesso!');
    }

  
    public function destroy(string $id)
    {
        $catalog = Catalog::findOrFail($id);
        $catalog->delete();
        return redirect()->back() ->with('success', 'Procedimento excluído com sucesso!');
    }
}
