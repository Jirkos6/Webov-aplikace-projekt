@extends('layouts.app2')
@section('content')

<div class="container mx-auto px-4">
    <h1 class="text-3xl py-4 border-b mb-10">Editace auta {{ $car->name }}</h1>

    <form method="POST" action="/cars/{{ $car->id }}" class="bg-white bg-accent-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="made">
                Datum výroby:
            </label>
            <input class="bg-accent appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-accent-outline" id="made" name="made" type="date" value="{{ $car->made }}" required max="{{ $date }}">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Model auta:
            </label>
            <input class="bg-accent appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-accent-outline" id="name" name="name" type="text" value="{{ $car->name }}" required>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="Company_id">
                Výrobce:
            </label>
            <select class="bg-accent appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-accent-outline" id="Company_id" name="Company_id" required>
            <option selected disabled class="info-content">Vyberte výrobce</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" {{ $car->Company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:bg-accent-outline" type="submit">
                Uložit
            </button>
        </div>
    </form>
</div>
@endsection
