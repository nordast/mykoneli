<?php

use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return '';
})->name('login');

Route::redirect('/login', '/backend/login');

Route::view('/', 'main.index')->name('main');
Route::view('/success', 'main.success')->name('success');

Route::resource('contact', ContactController::class)->only(['store']);
Route::resource('calculator', CalculatorController::class)->only(['index', 'store', 'show']);
Route::resource('post', PostController::class)->only(['index', 'show']);
