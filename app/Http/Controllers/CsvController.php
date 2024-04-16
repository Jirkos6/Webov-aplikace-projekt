<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Country;

class CsvController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:2048',  
        ]);
    
        $file = $request->file('file');
        $fileContents = file($file->getPathname());
        foreach ($fileContents as $line) {
            $data = str_getcsv($line);
            Country::create([
                'name' => $data[0],
                'shortcut' => $data[1],
                'flag' => $data[2],
            ]);
        }
        return redirect()->route('importForm')->with('success', 'CSV soubor úspěšně naimportován.');
    }
    
    public function importView()
    {
    return view ("import");
    }

    public function export()
{
    $countries = Country::all();
    $csvFileName = 'countries.csv';
    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        'Pragma' => 'no-cache',
        'Expires' => '0',
    ];

    $callback = function() use ($countries) {
        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['Name', 'Shortcut', 'Flag']);
        foreach ($countries as $country) {
            fputcsv($handle, [$country->name, $country->shortcut, $country->flag]);
        }
        fclose($handle);
    };

    return response()->stream($callback, 200, $headers);
}

}
