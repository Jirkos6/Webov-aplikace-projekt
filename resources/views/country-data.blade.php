<title>Data Země</title>

<span class="header">
    Data Zeme
</span>
<table class="table">
    <thead>
        <tr>
            <th >ID</th>
            <th >Název</th>
            <th >Zkratka</th>
            <th >Vlajka</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
            <td >{{ $item->id }}</td>
                <td >{{ $item->name }}</td>
                <td >{{ $item->shortcut }}</td>
                <td >{{ $item->flag }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
