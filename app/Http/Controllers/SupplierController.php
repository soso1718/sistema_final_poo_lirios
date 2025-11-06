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
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'cnpj' => 'required|size:18|unique:suppliers,cnpj',
            'contact'=> 'required|email|unique:suppliers,contact',
            'products_supplied' => 'required|min:3'
        ], [
            'name.required'=> 'O nome do fornecedor é obrigatório!',
            'name.min'=> 'O nome do fornecedor deve ter pelo menos 3 caracteres!',

            'cnpj.required'=> 'O CNPJ do fornecedor é obrigatório',
            'cnpj.size'=> 'O CNPJ deve conter exatamente 11 números!',
            'cnpj.unique'=> 'Este CNPJ já está cadastrado!',

            'contact.required'=> 'O contato do fornecedor é obrigatório!',
            'contact.email'=> 'Informe um e-mail válido!',
            'contact.unique'=> 'Este e-mail já está cadastrado!',

            'products_supplied.required'=> 'Os produtos fornecidos são obrigatórios!',
            'products_supplied.min'=> 'Os produtos fornecidos devem ter pelo menos 3 caracteres!'
        ]);
    
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
        return view('suppliers.edit', compact('supplier'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'cnpj' => 'required|size:18|unique:suppliers,cnpj',
            'contact'=> 'required|email|unique:suppliers,contact',
            'products_supplied' => 'required|min:3'
        ], [
            'name.required'=> 'O nome do fornecedor é obrigatório!',
            'name.min'=> 'O nome do fornecedor deve ter pelo menos 3 caracteres!',

            'cnpj.required'=> 'O CNPJ do fornecedor é obrigatório',
            'cnpj.size'=> 'O CNPJ deve conter exatamente 14 números!',
            'cnpj.unique'=> 'Este CNPJ já está cadastrado!',

            'contact.required'=> 'O contato do fornecedor é obrigatório!',
            'contact.email'=> 'Informe um e-mail válido!',
            'contact.unique'=> 'Este e-mail já está cadastrado!',

            'products_supplied.required'=> 'Os produtos fornecidos são obrigatórios!',
            'products_supplied.min'=> 'Os produtos fornecidos devem ter pelo menos 3 caracteres!'
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());
        return redirect()->route('suppliers.index') ->with('success', 'Fornecedor editado com sucesso!');
    }

 
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->back() ->with('success', 'Fornecedor removido com sucesso!');
    }
}
