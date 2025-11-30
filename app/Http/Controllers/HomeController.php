<?php

namespace App\Http\Controllers;

use App\Models\Scheduling;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $schedulings = Scheduling::all(); 
        return view('home', compact('schedulings'));
    }
}
