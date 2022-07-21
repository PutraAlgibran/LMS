<!DOCTYPE html>
<html>

<head>
    <title>Data Absensi Siswa</title>
</head>

<body>
    <h1 align="center">Data Absensi</h1>
    <table border="1" align="center" cellpadding="10" cellspacing="0">
        <thead>
            <tr bgcolor="grey">
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Created_at</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach ($absensi as $absen)
                <tr>
                    <th scope="row" class="text-center">{{ $i++ }}</th>
                    <td>{{ $absen->fullname }}</td>
                    <td>{{ $absen->nama }}</td>
                    <td>{{ $absen->status }}</td>
                    <td>{{ $absen->keterangan }}</td>
                    <td class="text-center">{{ $absen->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
