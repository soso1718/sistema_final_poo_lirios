<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();
        return view("stocks.index", compact("stocks"));
    }

    public function create()
    {
        return view('stocks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'amount' => 'required|integer|min:1',
            'category' => 'required|min:2',
            'validity' => 'nullable|date'
        ], [
            'name.required'=> 'O nome do produto é obrigatório!',
            'name.min'=> 'O nome do produto deve ter pelo menos 2 caracteres!',

            'amount.required'=> 'A quantidade dos produtos é obrigatória!',
            'amount.min'=> 'Insira pelo menos 1 produto!',

            'category.required'=> 'A categoria do produto é um campo obrigatório!',
            'category.min'=> 'A categoria do produto deve ter pelo menos 2 caracteres!'
        ]);

        Stock::create($request->all());
        return redirect()->route('stocks.index') ->with('success', 'Lote adicionado com sucesso!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $stock = Stock::findOrFail($id);
        return view('stocks.edit', compact('stock'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:2',
            'amount' => 'required|integer|min:1',
            'category' => 'required|min:2',
            'validity' => 'nullable|date'
        ], [
            'name.required'=> 'O nome do produto é obrigatório!',
            'name.min'=> 'O nome do produto deve ter pelo menos 2 caracteres!',

            'amount.required'=> 'A quantidade dos produtos é obrigatória!',
            'amount.min'=> 'Insira pelo menos 1 produto!',

            'category.required'=> 'A categoria do produto é um campo obrigatório!',
            'category.min'=> 'A categoria do produto deve ter pelo menos 2 caracteres!'
        ]);

        $stock = Stock::findOrFail($id);
        $stock->update($request->all());
        return redirect()->route('stocks.index') ->with('success', 'Lote editado com sucesso!');
    }

    public function destroy(string $id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();
        return redirect()->back() ->with('success', 'Lote excluído com sucesso!');
    }
}
