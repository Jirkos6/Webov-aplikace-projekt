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
    <h1 class="text-3xl py-4 border-b mb-10">Editace aut</h1>

    <form method="POST" action="/cars/multi-edit/array" class="bg-white bg-accent-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')
        @foreach ($cars as $car)
            <h2 class="text-2xl py-2 border-b mb-4">{{ $car->name }}</h2>
            <input type="hidden" name="ids[]" value="{{ $car->id }}">

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="made[{{ $car->id }}]">
                    Datum výroby:
                </label>
                <input class="bg-accent appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-accent-outline" id="made[{{ $car->id }}]" name="made[{{ $car->id }}]" type="date" value="{{ $car->made }}" required max="{{ $date }}">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name[{{ $car->id }}]">
                    Model auta:
                </label>
                <input class="bg-accent appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-accent-outline" id="name[{{ $car->id }}]" name="name[{{ $car->id }}]" type="text" value="{{ $car->name }}" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="Country_id[{{ $car->id }}]">
                    Země:
                </label>
                <select class="bg-accent appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-accent-outline" id="Country_id[{{ $car->id }}]" name="Country_id[{{ $car->id }}]" required>
                <option selected disabled class="info-content">Vyberte zemi</option>
                    @foreach ($data as $country)
                        <option value="{{ $country->id }}" {{ $car->Country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
        @endforeach

        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:bg-accent-outline" type="submit">
                Uložit
            </button>
        </div>
    </form>
</div>
@endsection
