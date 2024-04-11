<?php

namespace App\Http\Controllers;

use App\Models\Car;

class CarController extends Controller
{
    public function test()
    {
        $data = Car::all();
        return view('test', $data);
    }
}