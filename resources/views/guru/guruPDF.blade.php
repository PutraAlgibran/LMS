<!DOCTYPE html>
<html>

<head>
    <title>Data Guru</title>
</head>

<body>
    <h1 align="center">Data Data Guru</h1>
    <table border="1" align="center" cellpadding="10" cellspacing="0">
        <thead>
            <tr bgcolor="grey">
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telpon</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach ($data as $d)
                <tr>
                    <th scope="row" class="text-center">{{ $i++ }}</th>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->email }}</td>
                    <td>{{ $d->telpon }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
