<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Company;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Zobrazuje počet řádků v tabulkách Cars, Companies, Countries a Users.
     *
     * @return Vrací view 'dashboard' s počtem záznamů a případnými zprávami pokud je hodnota řádků v tabulce 0.
     */
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

    /**
     * Zobrazuje seznam všech uživatelů a jejich počet.
     *
     * @return Vrací view 'account-manager' s počtem uživatelů a seznamem uživatelů.
     */
    public function accountmanager()
    {
        $userCount = User::all()->count();  
        $user = User::all(); 
        $user = User::paginate(10);

        return view('account-manager', ['userCount' => $userCount, 'user' => $user]);
    }

    /**
     * Smaže uživatele s daným ID.
     *
     * @param  $id ID uživatele, který má být smazán.
     * @return  Vrací uživatele na stránku /account/manager s flash zprávou o úspěchu.
     */
    public function accountdelete($id)
    {
        $user = User::find($id);
        $user->delete();
    
        return redirect('/account/manager')->with('success', 'Uživatel úspěšně smazán!');
    }

    /**
     * Zobrazuje formulář pro úpravu uživatele s daným ID a počet všech uživatelů.
     *
     * @param  $id ID uživatele, který má být upraven.
     * @return Vrací view 'account-edit' s daty uživatele a počtem uživatelů.
     */
    public function edituser($id)
    {
        $userCount = User::all()->count(); 
        $user = User::find($id);
        return view('account-edit', ['user' => $user, 'userCount' => $userCount]);
    }

    /**
     * Aktualizuje údaje uživatele s daným ID podle dat z formuláře.
     *
     * @param   $request vrací data z formuláře pro úpravu uživatele.
     * @param   $id ID uživatele, který má být upraven.
     * @return  Vrací uživatele na stránku /account/manager s flash zprávou o úspěchu.
     */
    public function accountedit(Request $request, $id) {

        $user = User::find($id);
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->save();
        $request->session()->flash('success', "Nové jméno uživatele je {$user->name}, role {$user->role} a email {$user->email}!");
        return redirect('/account/manager');
    }
}
