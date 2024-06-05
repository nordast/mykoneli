<?php

use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

//Route::view('/', 'welcome');

Route::get('/', MainController::class)->name('main');
Route::view('success', 'main.success');

Route::resource('contact', ContactController::class)->only(['store']);
Route::resource('calculator', CalculatorController::class)->only(['index', 'store']);
