<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('test', [CarController::class, 'test']);


Route::get('login', function () {
    return view('login');
});


Route::get('register', function () {
    return view('register');
});