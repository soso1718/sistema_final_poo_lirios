<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scheduling;

class SchedulingController extends Controller
{

    public function index()
    {
        $schedulings = Scheduling::all();
        return view('schedulings.index', compact('schedulings'));
    }

    public function create()
    {
        return view('schedulings.create');
    }

    public function store(Request $request)
    {
        Scheduling::create($request->all());
        return redirect()->route('schedulings.index') ->with('success', 'Agendamento adicionado com sucesso!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
