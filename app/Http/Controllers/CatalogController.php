<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCatalog;
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

    public function store(StoreUpdateCatalog $request)
    {
        $data = $request->all();

        if (isset($data['price'])) {
            $data['price'] = str_replace(',', '.', $data['price']);
        }

        Catalog::create($data);
        return redirect()->route('catalogs.index') ->with('success', 'Procediemnto adicionado com sucesso!');
    }

    public function show(string $id)
    {
        $catalog = Catalog::findOrFail($id);
        return view('catalogs.show', compact('catalog'));
    }

  
    public function edit(string $id)
    {
        $catalog = Catalog::findOrFail($id);
        return view('catalogs.edit', compact('catalog'));
    }

 
    public function update(StoreUpdateCatalog $request, string $id)
    {   
        $data = $request->all();

        if (isset($data['price'])) {
            $data['price'] = str_replace(',', '.', $data['price']);
        }
        
        $catalog = Catalog::findOrFail($id);
        $catalog->update($data);
        return redirect()->route('catalogs.index') ->with('success', 'Procedimento atualizado com sucesso!');
    }

  
    public function destroy(string $id)
    {
        $catalog = Catalog::findOrFail($id);
        $catalog->delete();
        return redirect()->route('catalogs.index') ->with('success', 'Procedimento excluído com sucesso!');
    }
}
