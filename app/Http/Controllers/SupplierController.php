<?php

namespace App\Http\Controllers;

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
        return view('suplliers.create');
    }

    public function store(Request $request)
    {
        Supplier::create($request->all());
        return redirect()->route('suppliers.index') ->with('success', 'Fornecedor adicionado com sucesso!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('stocks.edit', compact('supplier'));
    }


    public function update(Request $request, string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());
        return redirect()->route('supplier.index') ->with('success', 'Fornecedor editado com sucesso!');
    }

 
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->back() ->with('success', 'Fornecedor removido com sucesso!');
    }
}
