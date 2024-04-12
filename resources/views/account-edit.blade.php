<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          <br> Vítej uživateli {{ Auth::user()->name }}!
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div role="alert" class="alert">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
  <span>Počet registrovaných uživatelů je {{ $userCount }}</span>
</div>
<br>
<br>
@if (Auth::user()->role == 'admin')
        
    
<form action="{{ route('account.edit', $user->id) }}" method="POST" class="p-5 bg-white rounded shadow-md">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name" class="block text-sm font-medium text-gray-700">Uživatelské jméno</label>
        <input type="text" name="name" value="{{ $user->name }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <div class="form-group mt-4">
        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
        <select name="role" id="role" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option value="default" {{ $user->role == 'default' ? 'selected' : '' }}>Default</option>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
    </div>

    <div class="form-group mt-4">
        <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
        <input type="email" name="email" value="{{ $user->email }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <button type="submit" class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Editovat</button>
</form>
@endif
            <div class="flex flex-col items-center justify-center min-h-screen">
       
</div>

            </div>
        </div>
    </div>
</x-app-layout>
