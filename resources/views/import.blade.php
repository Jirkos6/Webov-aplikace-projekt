@extends('layouts.app2')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full bg-white p-6 rounded-lg shadow-md space-y-8">
    <div class="text-center">
      <h2 class="text-2xl font-bold text-gray-900">CSV <br> <br>řádky: "name" "shortcut" "flag"</h2>
    </div>
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p class="font-bold">Úspěch</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif
    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="flex flex-wrap mb-6">
        <label for="file" class="block text-gray-700 text-sm font-bold mb-2">Vyberte CSV soubor:</label>
        <input type="file" name="file" required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
        @error('file')
            <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
        @enderror
      </div>
      <button type="submit" class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline">Importovat CSV</button>
    </form>
    <a href="{{ route('export') }}" class="w-full block text-center px-4 py-2 mt-4 font-bold text-white bg-green-500 rounded-full hover:bg-green-700 focus:outline-none focus:shadow-outline">Stáhnout CSV</a>
  </div>
</div>
@endsection
