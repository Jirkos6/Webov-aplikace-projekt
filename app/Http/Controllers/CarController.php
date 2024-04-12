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
            $car->delete_time = time(); 
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
            $request->validate([
                'Company_id' => 'required|not_in:0',
            ]);
            $car->save();
    
            $company = Company::find($request->input('Company_id'))->name;
        
            $request->session()->flash('success', "Auto {$car->name} od výrobce {$company} bylo přidáno!");
            $car->create_time = time(); 
            $car->save();
            return redirect('/test'); 
        } catch (\Exception $e) {
            
            $request->session()->flash('error', "Nastala chyba při přidávání auta! {$e->getMessage()}");
    
            return back(); 
        }
    }
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $companies = Company::all();
        return view('edit', ['car' => $car, 'companies' => $companies]);
    }

    public function update(Request $request, $id)
    {
        try {
        $car = Car::findOrFail($id);
        $car->made = $request->input('made');
        $car->name = $request->input('name');
        $car->Company_id = $request->input('Company_id');
        $company = Company::find($request->input('Company_id'))->name;
        $car->edit_time = time(); 
        $car->save();
        $request->session()->flash('success', "Auto bylo editováno na {$car->name}, vyrobeno {$car->made} od společnosti {$company}!");
        return redirect('/test'); 
        }
        catch (\Exception $e)  {
            $request->session()->flash('error', "Nastala chyba při editaci auta {$car->name}! {$e->getMessage()}");
            return redirect('/test'); 
        }
    }
    
}