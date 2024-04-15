<title>Data Společnosti</title>
<span class="header">
    Data Spolecnosti
</span>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Název</th>
            <th>Zeme</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->country_name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

