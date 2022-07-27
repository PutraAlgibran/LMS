@extends('landingpage.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <div class="mt-4">
                    <h2>Edit Data</h2>
                </div>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/updateMapel/' . $materi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="nameWithTitle" class="form-label">Nama Mata
                            Pelajaran</label>
                        <select class="form-select" id="nama" aria-label="Default select example" name="nama">
                            <option selected>Pilih Mata Pelajaran</option>
                            <option value="IPA" {{ $materi->nama == 'IPA' ? 'selected' : '' }}>IPA</option>
                            <option value="Matematika" {{ $materi->nama == 'Matematika' ? 'selected' : '' }}>Matematika
                            </option>
                            <option value="IPS" {{ $materi->nama == 'IPS' ? 'selected' : '' }}>IPS</option>
                            <option value="Agama Islam" {{ $materi->nama == 'Agama Islam' ? 'selected' : '' }}>Agama Islam
                            </option>
                            <option value="PJOK" {{ $materi->nama == 'PJOK' ? 'selected' : '' }}>PJOK</option>
                            <option value="Bahasa Indonesia" {{ $materi->nama == 'Bahasa Indonesia' ? 'selected' : '' }}>
                                Bahasa Indonesia</option>
                            <option value="Bahasa Inggris" {{ $materi->nama == 'Bahasa Inggris' ? 'selected' : '' }}>Bahasa
                                Inggris</option>
                            <option value="Seni Budaya" {{ $materi->nama == 'Seni Budaya' ? 'selected' : '' }}>Seni Budaya
                            </option>
                            <option value="PPKN" {{ $materi->nama == 'PPKN' ? 'selected' : '' }}>PPKN</option>
                            <option value="Prakarya" {{ $materi->nama == 'Prakarya' ? 'selected' : '' }}>Prakarya</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="emailWithTitle" class="form-label">Keterangan
                            Materi/Perkenalan</label>
                        <textarea rows="5" name="keterangan" class="form-control"
                            placeholder="Halo, Kita akan belajar bahasa inggris bersama selama 1 tahun kedepan ya, semangat semua">{{ $materi->keterangan }}</textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="nameWithTitle" class="form-label">Nama Kelas</label>
                        <select class="form-select" id="kelas_id" aria-label="Default select example" name="kelas_id">
                            <option selected>Pilih Kelas</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}"
                                    {{ $materiKelas->kelas_id == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center my-4">
                <button type="submit" class="btn btn-success" name="proses">Update</button>

                <a href="{{ url('/materiGuru') }}" class="btn btn-success">Batal</a>
            </div>
        </div>
    </form>
@endsection
