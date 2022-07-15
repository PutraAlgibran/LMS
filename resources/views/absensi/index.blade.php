@extends('landingpage.index')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if (Auth::user()->role == 'Murid' and $isAbsen == null)
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
            </div>
            <form action="{{ url('/absensi/store') }}" method="post">
                @csrf
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="status" class="form-label">Status: </label>
                        <select class="form-select" id="status" aria-label="Default select example" name="status">
                            <option selected>Pilih Status</option>
                            <option value="Hadir">Hadir</option>
                            <option value="Sakit">Sakit</option>
                            <option value="Izin">Izin</option>
                            <option value="Bolos">Bolos</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="keterangan" class="form-label"><strong>Keterangan: </strong></label>
                        <textarea class="form-control" style="height:150px" name="keterangan" placeholder="Keterangan"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-4">
                    <button type="submit" class="btn btn-success">Absen</button>
                </div>
            </form>
        </div>
    @endif
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card" padding="20px">
            <br>
            <div class="row">
                <div class="col-3 text-start">
                    <h5>Tanggal {{ date('m/d/Y') }}</h5>
                </div>
                <div class="col-lg-6" align="center">
                    <h3 class="display-3">Riwayat Absensi</h3>
                </div>
                <div class="col-3 text-end">
                    <h5>{{ date('H:i:s') }}</h5>
                </div>
            </div>
            @if (Auth::user()->role !== 'Murid')
                <div class="row">
                    <div class="col-6 ps-4">
                        <a href="{{ url('absensi-pdf') }}" type="button" class="btn btn-success btn-icon-text mr-3">
                            Unduh Absensi (PDF)
                            <i class="typcn typcn-folder btn-icon-append"></i>
                        </a>
                        <a href="{{ url('absensi-excel') }}" type="button" class="btn btn-primary btn-icon-text mr-3">
                            Unduh Absensi (Excel)
                            <i class="typcn typcn-folder btn-icon-append"></i>
                        </a>
                    </div>
                </div>
            @endif
            <br>
            <div class="table-responsive text-nowrap">
                <form action="{{ url('/absensi/search/' . Auth::user()->username) }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-2 ms-3">
                            @if (Auth::user()->role !== 'Murid')
                                <select name="kelas_id" class="form-control">
                                    <option selected value="">Pilih Kelas</option>
                                    @foreach ($kelas as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="col-2">
                            <input type="date" name="tanggal" class="form-control">
                        </div>
                        <div class="col-3">
                            <input type="submit" value="Cari" class="btn btn-primary">
                        </div>
                    </div>
                </form>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Created_at</th>
                            @if (Auth::user()->role !== 'Murid')
                                <th class="text-center">Opsi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php $i = 1; @endphp
                        @foreach ($absensi as $absen)
                            <tr>
                                <th scope="row" class="text-center">{{ $i++ }}</th>
                                <td>{{ $absen->user->fullname }}</td>
                                <td>{{ $absen->kelas->nama }}</td>
                                <td>{{ $absen->status }}</td>
                                <td>{{ $absen->keterangan }}</td>
                                <td class="text-center">{{ $absen->created_at }}</td>
                                @if (Auth::user()->role !== 'Murid')
                                    <td class="text-center">
                                        <form action="{{ route('users.destroy', $absen->id) }}" method="POST">
                                            <a class="btn btn-primary" href="{{ route('users.edit', $absen->id) }}"><i
                                                    class="bi bi-pencil-square"></i>Edit</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="bi bi-trash3"></i>Delete</button>

                                            {{-- <a href="/users-delete/{{ $user->id }}"
                                            class="btn btn-danger btn-sm delete-confirm" role="button"> Delete <i
                                                class="typcn typcn-delete-outline btn-icon-append"></i> </a> --}}
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
