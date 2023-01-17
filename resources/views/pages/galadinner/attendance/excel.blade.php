<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Registered At</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($data as $row)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $row->userRegistered->name }}</td>
                <td>{{ $row->registered_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
