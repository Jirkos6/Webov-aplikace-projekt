<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Company;
use App\Models\Country;
use App\Models\User;
use Config;
use Illuminate\Support\Facades\DB;


class CarController extends Controller
{
    public function car()
    {
        $data = Car::join('country', 'car.country_id', '=', 'country.id')->select('car.*', 'country.name as country_name')->orderBy('car.id')->paginate(10);
    
        return view('car', ['data' => $data]);
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
        $date = date("Y-m-d");
        return view('create', ['companies' => $companies, 'date' => $date]);
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
            return redirect('/car'); 
        } catch (\Exception $e) {
            
            $request->session()->flash('error', "Nastala chyba při přidávání auta! {$e->getMessage()}");
    
            return back(); 
        }
    }
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $companies = Company::all();
        $date = date("Y-m-d");
        return view('edit', ['car' => $car, 'companies' => $companies, 'date' => $date]);
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
        return redirect('/car'); 
        }
        catch (\Exception $e)  {
            $request->session()->flash('error', "Nastala chyba při editaci auta {$car->name}! {$e->getMessage()}");
            return redirect('/car'); 
        }
    }
    public function dashboardgraph()
    {
        $carCount = Car::all()->count();
        $carMessage = $carCount == 0 ? 'Tabulka Cars neobsahuje žádné řádky!' : '';
    
        $companyCount = Company::all()->count();
        $companyMessage = $companyCount == 0 ? 'Tabulka Companies neobsahuje žádné řádky!' : '';
    
        $countryCount = Country::all()->count();
        $countryMessage = $countryCount == 0 ? 'Tabulka Countries neobsahuje žádné řádky!' : '';

        $userCount = User::all()->count();
        $userMessage = $userCount == 0 ? 'Nejsou registrovaní žádní uživatelé!' : '';
    

        return view('dashboard', [
            'carCount' => $carCount, 
            'companyCount' => $companyCount, 
            'countryCount' => $countryCount,
            'carMessage' => $carMessage,
            'companyMessage' => $companyMessage,
            'countryMessage' => $countryMessage,
            'userCount' => $userCount,
            'userMessage' => $userMessage
        ]);
    }
    public function accountmanager()
    {
    $userCount = User::all()->count();  
    $user = User::all(); 
    $user = User::paginate(10);

    return view('account-manager', ['userCount' => $userCount, 'user' => $user]);

    }
    public function accountdelete($id)
    {
        $user = User::find($id);
        $user->delete();
    
        return redirect('/account/manager')->with('success', 'Uživatel úspěšně smazán!');
    }
    public function edituser($id)
{
    $userCount = User::all()->count(); 
    $user = User::find($id);
    return view('account-edit', ['user' => $user, 'userCount' => $userCount]);
}
    public function accountedit(Request $request, $id) {

        $user = User::find($id);
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->save();
        $request->session()->flash('success', "Nové jméno uživatele je {$user->name}, role {$user->role} a email {$user->email}!");
        return redirect('/account/manager');

    }
    public function country() {
    
    $data = Country::all();
    $paginate = Config::get('pagination.pagination');
    $data = Country::paginate($paginate);
    return view('country', ['data' => $data]);
    }

    public function countrydelete($id)
    {
        $country = Country::find($id);
        $country->delete();
    
        return redirect('/country')->with('success', 'Země úspěšně smazána!');
    }

    public function countrycreate()
    {
    $country = Country::all();
    return view('countrycreate', ['country' => $country]);
    }
    public function countrysave(Request $request)
{
    $request->validate([
        'name' => 'required',
        'shortcut' => 'required',
        'flag' => 'required|image|mimes:jpeg,png|max:2048',
    ]);

    $imageName = time().'.'.$request->flag->extension();  
    $request->flag->move(public_path('obrazky'), $imageName);

    $country = new Country;
    $country->name = $request->name;
    $country->shortcut = $request->shortcut;
    $country->flag = $imageName;
    $country->save();

    return back()
        ->with('success',"Země '{$country->name}' se zkratkou '{$country->shortcut}' s obrázkem '/public/obrazky/{$country->flag}' byla vytvořena")
        ->with('image',$imageName);
}
}