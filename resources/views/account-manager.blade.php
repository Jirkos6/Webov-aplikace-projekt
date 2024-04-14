<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Vítej uživateli {{ Auth::user()->name }}!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div role="alert" class="alert">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Počet registrovaných uživatelů je {{ $userCount }}</span>
            </div>
            <br>
            @if (session('success'))
                <br>
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                <br>
                <br>
            @endif
            <br>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="overflow-x-auto">
                    <div class="min-w-screen min-h-screen bg-gray-100 font-sans overflow-hidden">
                        <div class="w-full lg:w-5/6">
                            <div class="bg-white shadow-md rounded my-6">
                                <table class="min-w-max w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                            <th class="py-3 px-6 text-left">Avatar</th>
                                            <th class="py-3 px-6 text-left">Jméno</th>
                                            <th class="py-3 px-6 text-left">Role</th>
                                            <th class="py-3 px-6 text-center">Email</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light">
                                        @foreach ($user as $data)
                                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <img src="{{ Storage::url($data->profile_photo_path) }}" alt="{{ $data->name }}" width="50" height="50"> 
                                                    </td>
                                                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $data->name }}</td>
                                                <td class="py-3 px-6 text-left">{{ $data->role }}</td>
                                                <td class="py-3 px-6 text-center">{{ $data->email }}</td>
                                                <td class="py-3 px-6 text-center">
                                                    @if (Auth::user()->role == 'admin')
                                                        <form action="{{ route('account.delete', $data->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline btn-error">Smazat</button>
                                                        </form>
                                                    @endif
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    @if (Auth::user()->role == 'admin')
                                                        <a href="{{ route('edit.user', $data->id) }}" class="btn btn-outline btn-warning">Editovat</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{ $user->links() }}
            </div>
        </div>
    </div>
    
</x-app-layout>
