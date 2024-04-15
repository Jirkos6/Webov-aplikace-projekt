<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Config;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    /**
     * Zobrazí seznam zemí.
     *
     * @return  Vrací view 'country' s daty zemí. Pagination je ze souboru /app/Http/Controllers/Config/pagination.php
     */
    public function country() {
    
        $data = Country::all();
        $paginate = Config::get('pagination.pagination');
        $data = Country::paginate($paginate);
        return view('country', ['data' => $data]);
    }

    /**
     * Smaže zemi podle daného ID.
     *
     * @param  $id ID země, která má být smazána.
     * @return  Vrací uživatele na stránku se seznamem zemí s flash zprávou o úspěchu.
     */
    public function countrydelete($id)
    {
        $country = Country::find($id);
        $country->delete();
    
        return redirect('/country')->with('success', 'Země úspěšně smazána!');
    }

    /**
     * Zobrazí formulář pro vytvoření nové země.
     *
     * @return Vrací view 'countrycreate' s daty zemí.
     */
    public function countrycreate()
    {
        $country = Country::all();
        return view('countrycreate', ['country' => $country]);
    }

    /**
     * Uloží novou zemi do databáze.
     *
     * @param  $request vrací data z formuláře pro vytvoření země.
     * @return Vrací uživatele zpět na předchozí stránku s flash zprávou o úspěchu a názvem obrázku.
     */
    public function countrysave(Request $request)
    {
    // Validace vstupních dat z formuláře. 'required' znamená, že pole musí být vyplněno.
    // 'image' znamená, že soubor musí být obrázek. 'mimes' určuje povolené typy obrázků.
    // 'max' určuje maximální velikost souboru v kilobytech.
    
        $request->validate([
            'name' => 'required',
            'shortcut' => 'required',
            'flag' => 'required|image|mimes:jpeg,png|max:2048',
        ]);

        $imageName = time().'.'.$request->flag->extension(); // Vytvoření názvu souboru pro obrázek. Název souboru je aktuální časová značka a přípona obrázku.
        $request->flag->move(public_path('obrazky'), $imageName);  // Přesun obrázku do složky 'public/obrazky' s novým názvem souboru.

        $country = new Country;
        $country->name = $request->name;
        $country->shortcut = $request->shortcut;
        $country->flag = $imageName; // Uložení názvu souboru obrázku do databáze.
        $country->save();

        return back()
            ->with('success',"Země '{$country->name}' se zkratkou '{$country->shortcut}' s obrázkem '/public/obrazky/{$country->flag}' byla vytvořena")
            ->with('image',$imageName);
    }
}
