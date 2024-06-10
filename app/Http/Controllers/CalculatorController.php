<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculatorRequest;
use App\Models\Calculator;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CalculatorController extends Controller
{
    public function index(): View
    {
        return view('calculator.index');
    }

    public function store(CalculatorRequest $request): RedirectResponse
    {
        $calculator = Calculator::create($request->validated());
        return to_route('calculator.show', $calculator);
    }

    public function show(Calculator $calculator): View
    {
        return view('calculator.show', compact('calculator'));
    }
}
