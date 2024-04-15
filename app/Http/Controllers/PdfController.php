<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Country;
use App\Models\Company;
use App\Models\Car;

class PdfController extends Controller
{
    public function downloadPDF($filename, $data) {
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view($filename, compact('data'))->render());
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $output = $dompdf->output();
        $pdfPath = public_path('pdfs/' . $filename . '.pdf');
        file_put_contents($pdfPath, $output);
        return response()->file($pdfPath);
    }

    public function streamCountryPDF() {
        $data = Country::limit(100)->get();
        return $this->downloadPDF('country-data', $data);
    }
    public function streamCompanyPDF() {
        $data = Company::join('country', 'company.country_id', '=', 'country.id')->select('company.*', 'country.name as country_name')->orderBy('company.id')->limit(100)->get();
        return $this->downloadPDF('company-data', $data);
    }
    public function streamCarPDF() {
        $data = Car::join('country', 'car.country_id', '=', 'country.id')->select('car.*', 'country.name as country_name')->orderBy('car.id')->limit(100)->get();
        return $this->downloadPDF('car-data', $data);
    }

    public function regeneratePDFs() {
        $this->streamCountryPDF();
        $this->streamCompanyPDF();
        $this->streamCarPDF();
        return view('download-pdf');
    }
}
