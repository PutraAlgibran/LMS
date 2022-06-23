<!DOCTYPE html>
<html>

<head>
    <title>Data Users</title>
</head>

<body>
    <h1 align="center">Data Users</h1>
    <table border="1" align="center" cellpadding="10" cellspacing="0">
        <thead>
            <tr bgcolor="grey">
                <th>No</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Email</th>
                <th>Telpon</th>
                <th>Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($data as $us)
                <tr>
                    <th scope="row" class="text-center">{{ $no++ }}</th>
                    <td>{{ $us->fullname }}</td>
                    <td>{{ $us->role }}</td>
                    <td>{{ $us->email }}</td>
                    <td>{{ $us->telpon }}</td>
                    <td class="text-center">{{ $us->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
