<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Company;

class CarController extends Controller
{
    public function test()
    {
        $data = Car::all();
        return view('test', ['data' => $data]);
    }
    
    public function delete($id)
    {
        try {
            $car = Car::find($id);
            $car->delete();   
            $car->delete_time = mktime(date("H"), date("i"), date("s")); 
            $car->save();
            return back()->with('success', 'Smazání proběhlo úspěšně!');

        } catch (\Exception $e) {
            return back()->with('error', 'Smazání se nepovedlo: ' . $e->getMessage());
        }
    }
    public function create()
    {
        $companies = Company::all();
        return view('create', ['companies' => $companies]);
    }
    

    public function store(Request $request)
    {
        try {
            $car = new Car;
            $car->made = $request->input('made');
            $car->name = $request->input('name');
            $car->Company_id = $request->input('Company_id');
            $car->save();
    
            $company = Company::find($request->input('Company_id'))->name;
        
            $request->session()->flash('success', "Auto {$car->name} od výrobce {$company} bylo přidáno!");
    
            return redirect('/test'); 
        } catch (\Exception $e) {
            
            $request->session()->flash('error', "Nastala chyba při přidávání auta! {$e->getMessage()}");
    
            return back(); 
        }
    }
    
}