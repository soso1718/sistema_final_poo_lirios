<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateStock;
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

    public function store(StoreUpdateStock $request)
    {
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

    public function update(StoreUpdateStock $request, string $id)
    {
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
