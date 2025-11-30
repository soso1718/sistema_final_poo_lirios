<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateSupplier;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
 
    public function index()
    {
        $suppliers = Supplier::all();
        return view("suppliers.index", compact("suppliers"));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(StoreUpdateSupplier $request)
    {
        Supplier::create($request->all());
        return redirect()->route('suppliers.index') ->with('success', 'Fornecedor adicionado com sucesso!');
    }

    public function show(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.show', compact('supplier'));
    }

    public function edit(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.edit', compact('supplier'));
    }


    public function update(StoreUpdateSupplier $request, string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());
        return redirect()->route('suppliers.index') ->with('success', 'Fornecedor editado com sucesso!');
    }

 
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('suppliers.index') ->with('success', 'Fornecedor removido com sucesso!');
    }
}
