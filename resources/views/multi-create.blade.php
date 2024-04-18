@extends('layouts.app2')
@section('content')

<br>
@if (session('success'))
    <br>
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    <br>
    <br>
@endif

@if (session('error'))
    <br>
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    <br>
    <br>
@endif

<div class="container mx-auto px-4">
    <h1 class="text-3xl py-4 border-b mb-10">Přidání aut</h1>

    <form method="POST" action="/cars/multi-create/store" class="bg-white bg-accent-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf

        @for ($i = 0; $i < $number; $i++)
            <h1> Auto {{ $i + 1 }} </h1>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="made">
                    Datum výroby:
                </label>
                <input class="bg-accent appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-accent-outline" id="made" name="cars[{{ $i }}][made]" type="date" required max="{{ $date }}">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Model auta:
                </label>
                <input class="bg-accent appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-accent-outline" id="name" name="cars[{{ $i }}][name]" type="text" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="Country_id">
                    Země:
                </label>
                <select class="bg-accent appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-accent-outline" id="Country_id" name="cars[{{ $i }}][Country_id]" required>
                    <option selected disabled value="0" class="info-content">Vyberte zemi</option>
                    @foreach ($data as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
        @endfor

     
        <div class="fixed bottom-0 right-0 p-4">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:bg-accent-outline" type="submit">
                Potvrdit
            </button>
        </div>
    </form>
</div>
@endsection
