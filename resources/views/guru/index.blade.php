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
                        <h3 class="display-3">Daftar Guru</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 ps-4">
                    <a href="{{ url('guru-pdf') }}" type="button" class="btn btn-success btn-icon-text mr-3">
                        Unduh Data Guru (PDF)
                        <i class="typcn typcn-folder btn-icon-append"></i>
                    </a>
                    <a href="{{ url('guru-excel') }}" type="button" class="btn btn-primary btn-icon-text mr-3">
                        Unduh Data Guru (Excel)
                        <i class="typcn typcn-folder btn-icon-append"></i>
                    </a>
                </div>
                <div class="col-6" align="right">
                    <a class="btn btn-success me-3" href="{{ url('/tambahGuru') }}">
                        <i class="bi bi-plus-lg pe-2"></i>Tambah Guru
                    </a>
                </div>
            </div>
            <br>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Fullname</th>
                            <th>Username</th>
                            <th class="text-center">Telpon</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($guru as $g)
                            <tr>
                                <th scope="row" class="text-center">{{ ++$i }}</th>
                                <td>{{ $g->nama }}</td>
                                <td>{{ $g->email }}</td>
                                <td>{{ $g->telpon }}</td>
                                <td class="text-center">
                                    <form action="" method="POST">
                                        <a class="btn btn-info" href=""><i class="bi bi-eye pe-2"></i>Details</a>
                                        <a class="btn btn-primary" href="{{ url('/editGuru/' . $g->id) }}"><i
                                                class="bi bi-pencil-square pe-2"></i>Edit</a>

                                        @csrf
                                        @method('DELETE')

                                        <a href="/deleteGuru/{{ $g->id }}" class="btn btn-danger delete-confirm"
                                            role="button"><i class="bi bi-trash3 pe-2"></i>Delete</a>
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
