<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateScheduling;
use Illuminate\Http\Request;
use App\Models\Scheduling;
use Illuminate\Support\Facades\Schema;
use App\Models\Professionals;
use App\Models\Catalog;

class SchedulingController extends Controller
{

    public function index()
    {
        $schedulings = Scheduling::all();
        return view('schedulings.index', compact('schedulings'));
    }

    public function create()
    {
        $professionals = Professionals::all();
        $catalog = Catalog::all();
        return view('schedulings.create', compact('professionals', 'catalog'));
    }

    public function store(StoreUpdateScheduling $request)
    {
        Scheduling::create($request->all());
        return redirect()->route('home') ->with('success', 'Agendamento adicionado com sucesso!');
    }

    public function show(string $id)
    {
        $scheduling = Scheduling::findOrFail($id);
        return view('schedulings.show', compact('scheduling'));
    }

    public function edit(string $id)
    {
        $scheduling = Scheduling::findOrFail($id);
        $professionals = Professionals::all();
        $catalog = Catalog::all();
        return view('schedulings.edit', compact('scheduling', 'professionals', 'catalog'));
    }

    public function update(StoreUpdateScheduling $request, string $id)
    {
        $scheduling = Scheduling::findOrFail($id);
        $scheduling->update($request->all());
        return redirect()->route('home') ->with('success', 'Agendamento editado com sucesso!');
    }

    public function destroy(string $id)
    {
        $scheduling = Scheduling::findOrFail($id);
        $scheduling->delete();
        return redirect()->route('home') ->with('success', 'Agendamento excluído com sucesso!');
    }
}
