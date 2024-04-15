@extends('layouts.app2')
@section('content')
<br>
<br>
<div class="m-4">
    <iframe src="country-pdf" class="w-full h-64 border-gray-300 border rounded shadow">
    </iframe>
    <a href="country-pdf" class="btn btn-primary mt-2" download>Stáhnout data země</a>
</div>
<div class="m-4">
    <iframe src="company-pdf" class="w-full h-64 border-gray-300 border rounded shadow">
    </iframe>
    <a href="company-pdf" class="btn btn-primary mt-2" download>Stáhnout data společnosti</a>
</div>
<div class="m-4">
    <iframe src="car-pdf" class="w-full h-64 border-gray-300 border rounded shadow">
    </iframe>
    <a href="car-pdf" class="btn btn-primary mt-2" download>Stáhnout data auta</a>
</div>
@endsection
