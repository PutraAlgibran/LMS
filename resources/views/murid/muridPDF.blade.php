<!DOCTYPE html>
<html>

<head>
    <title>Data Murid</title>
</head>

<body>
    <h1 align="center">Data Murid</h1>
    <table border="1" align="center" cellpadding="10" cellspacing="0">
        <thead>
            <tr bgcolor="grey">
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Telpon</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach ($data as $d)
                <tr>
                    <th scope="row" class="text-center">{{ $i++ }}</th>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->kelas->nama }}</td>
                    <td>{{ $d->user->telpon }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
