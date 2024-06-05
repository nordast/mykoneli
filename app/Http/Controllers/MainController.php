<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class MainController extends Controller
{
    public function __invoke(): View
    {
        return view('main.index');
    }
}
