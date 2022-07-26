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
                        <h3 class="display-3">Daftar Murid</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 ps-4">
                    <a href="{{ url('murid-pdf') }}" type="button" class="btn btn-success btn-icon-text mr-3">
                        Unduh Data Murid (PDF)
                        <i class="typcn typcn-folder btn-icon-append"></i>
                    </a>
                    <a href="{{ url('murid-excel') }}" type="button" class="btn btn-primary btn-icon-text mr-3">
                        Unduh Data Murid (Excel)
                        <i class="typcn typcn-folder btn-icon-append"></i>
                    </a>
                </div>
                <div class="col-6" align="right">
                    <a class="btn btn-success me-3" href="{{ url('/tambahMurid') }}">
                        <i class="bi bi-plus-lg pe-2"></i>Tambah Murid
                    </a>
                </div>
            </div>
            <br>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Lengkap</th>
                            <th>Kelas</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($murid as $m)
                            <tr>
                                <th scope="row" class="text-center">{{ ++$i }}</th>
                                <td>{{ $m->nama }}</td>
                                <td>{{ $m->kelas->nama }}</td>
                                {{-- <td>{{ $m->kelas[0] }}</td> --}}
                                <td class="text-center">
                                    {{-- <form action="" method="POST"> --}}

                                    <a class="btn btn-primary" href="{{ url('/editMurid/' . $m->id) }}"><i
                                            class="bi bi-pencil-square"></i></a>

                                    @csrf
                                    @method('DELETE')
                                    <a href="/deleteMurid/{{ $m->id }}" class="btn btn-danger delete-confirm"
                                        role="button"><i class="bi bi-trash3"></i></a>
                                    {{-- <button type="submit" class="btn btn-danger"><i
                                            class="bi bi-trash3 pe-2"></i>Delete</button> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
