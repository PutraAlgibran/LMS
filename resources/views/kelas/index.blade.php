@extends('landingpage.index')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card" padding="20px">
            <br>
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div align="center">
                        <h3 class="display-3">Daftar Kelas</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12" align="right">
                    <a class="btn btn-success me-3" href="{{ url('/tambahKelas') }}">
                        <i class="bi bi-plus-lg pe-2"></i>Tambah Kelas
                    </a>
                </div>
            </div>
            <br>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 text-center">
                        @foreach ($kelas as $k)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $k->nama }}</td>
                                <td class="text-center">
                                    <form action="" method="POST">
                                        <a class="btn btn-info" href=""><i class="bi bi-eye"></i></a>
                                        <a class="btn btn-primary" href="{{ url('/editKelas/' . $k->id) }}"><i
                                                class="bi bi-pencil-square"></i></a>

                                        @csrf
                                        @method('DELETE')

                                        <a href="/deleteGuru/{{ $k->id }}" class="btn btn-danger delete-confirm"
                                            role="button"><i class="bi bi-trash3"></i></a>
                                        {{-- <button type="submit" class="btn btn-danger delete-confirm"><i
                                                class="bi bi-trash3 pe-2"></i>Delete</button> --}}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
