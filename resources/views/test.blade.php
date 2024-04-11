
@extends('layouts.app')
@section('content')
<br>

    @if($data->isEmpty())
        <p>Nebyla nalezena žádná auta</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Název</th>
                    <th>Datum výroby</th>
                    <th>&nbsp;&nbsp;ID spol</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $car)
                    <tr>
                        <td>{{ $car->id }}</td>
                        <td>{{ $car->name }}</td>
                        <td>&nbsp;&nbsp;{{ $car->made }}</td>
                        <td>&nbsp;&nbsp;{{ $car->Company_id }}</td>
                        <td><button class="btn btn-outline btn-error">Smazat</button></td>
                        <td></td>
                        <td><button class="btn btn-outline btn-warning">Editovat</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection