
@section('content')
    <h1>All Cars</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Made</th>
                <th>Company ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->made }}</td>
                    <td>{{ $car->Company_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection