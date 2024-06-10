<?php

namespace App\Http\Controllers;

use App\Models\Calculator;
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

    /**
     * @throws \JsonException
     */
    public function show(Calculator $calculator): View
    {
        return view('calculator.show', compact('calculator'));
    }

}
