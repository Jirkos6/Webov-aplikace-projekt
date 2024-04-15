<title>Data Auta</title>

<span class="header">
    Data Auta
</span>
<table class="table" >
    <thead>
        <tr>
            <th>ID</th>
            <th>Název</th>
            <th>Vyrobeno</th>
            <th>Zeme</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->made }}</td>
                <td>{{ $item->country_name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
