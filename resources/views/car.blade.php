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

@if($data->isEmpty())
    <p>Nebyla nalezena žádná auta</p>
@else
    <table class="table-auto w-full">
        <thead>
            <tr>
            @if (Auth::user()->role == 'admin')
                <th class="px-4 py-2 text-left">Select</th>
                @endif
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">Název</th>
                <th class="px-4 py-2 text-left">Datum výroby</th>
                <th class="px-4 py-2 text-left">Země</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $car)
                <tr>
                @if (Auth::user()->role == 'admin')
                    <td class="border px-4 py-2"><input type="checkbox" class="item-checkbox" data-id="{{ $car->id }}"></td>
                    @endif
                    <td class="border px-4 py-2">{{ $car->id }}</td>
                    <td class="border px-4 py-2">{{ $car->name }}</td>
                    <td class="border px-4 py-2">{{ $car->made }}</td>
                    <td class="border px-4 py-2">{{ $car->country_name }}</td>
                    @auth
                    @if (Auth::user()->role == 'admin')
                    <td class="border px-4 py-2"><button class="btn btn-outline btn-error" data-id="{{ $car->id }}" onclick="setFormAction('{{ $car->id }}')">Smazat</button></td>
                    <td class="border px-4 py-2"></td>
                    <td class="border px-4 py-2"><a href="/{{ $car->name }}/{{ $car->id }}/edit" class="btn btn-outline btn-warning">Editovat</a></td>
                    @endif
                   @endauth
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
<br>
@if (Auth::user()->role == 'admin')
&nbsp; <button id="MultieditButton" class="btn btn-outline btn-ghost">Editovat vybrané řádky</button> &nbsp; &nbsp; 
<input
                id="numberInput"
                type="number"
                class="w-24 px-2 py-1 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                min="1"
                
               
            />
            <button
                id="addButton"
                class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300"
            >
                Přidat
            </button>
@endif



<div id="myModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
              Tuto akci nebude možné vrátit!
            </h3>
          </div>
        </div>
      </div>
      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
    

      <form id="deleteForm" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-outline btn-error" type="submit" id="deleteButton1">Smazat</button>
</form>
        &nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-outline btn-primary" id="cancelButton">
  Zrušit
</button>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<br>
{{ $data->links() }}
@endsection
