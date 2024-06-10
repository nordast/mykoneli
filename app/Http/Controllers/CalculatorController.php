<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CalculatorController extends Controller
{
    public function index(): View
    {
        return view('calculator.index');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        return view('calculator.show');
    }
}
