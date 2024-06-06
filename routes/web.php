<?php

use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'main.index')->name('main');
Route::view('success', 'main.success')->name('success');

Route::resource('contact', ContactController::class)->only(['store']);
Route::resource('calculator', CalculatorController::class)->only(['index', 'store']);
