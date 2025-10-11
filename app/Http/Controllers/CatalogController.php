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
