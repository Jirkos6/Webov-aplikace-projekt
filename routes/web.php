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
Route::get('profil', function () {
    return view('user-profile');
});
Route::get('/cars/create', [CarController::class, 'create']);
Route::post('/cars', [CarController::class, 'store']);

Route::delete('/car/{id}', [CarController::class, 'delete']);