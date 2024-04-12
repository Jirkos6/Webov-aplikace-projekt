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
            <table>
            <thead>
                <tr>
                    <th>Jméno</th>
                    <th>Role</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>&nbsp;&nbsp;{{ $data->role }}</td>
                        <td>&nbsp;&nbsp;{{ $data->email }}</td>
                        <td>
                        <form action="{{ route('account.delete', $data->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline btn-error">Smazat</button>
                        </form>
                        </td>
                        <td></td>
                        <td><a href="{{ route('edit.user', $data->id) }}" class="btn btn-outline btn-warning">Editovat</a></td>

                       
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $user->links() }}
            <div class="flex flex-col items-center justify-center min-h-screen">
       
</div>

            </div>
        </div>
    </div>
</x-app-layout>
