@extends('landingpage.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center mt-4">
                <div>
                    <h2>Tambah Kegiatan</h2>
                </div>
            </div>
            <div class="col-12">
                <div style="float: right">
                    <a class="btn btn-primary" href="{{ route('activity.index') }}"> Back</a>
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

    <form action="{{ route('activity.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="nama" class="form-label"><strong>Nama Kegiatan: </strong></label>
                        <input type="text" name="nama" class="form-control" placeholder="Jadwal Senin">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="materi" class="form-label"><strong>Materi: </strong></label>
                        <select name="materi_id" class="form-control">
                            <option value="">--- Pilih Materi ---</option>
                            @foreach($materi as $mat)
                            <option value="{{ $mat->id }}">{{ $mat->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="user" class="form-label"><strong>Username: </strong></label>
                        <select name="user_id" class="form-control">
                            <option value="">--- Pilih User ---</option>
                            @foreach($user as $u)
                            <option value="{{ $u->id }}">{{ $u->fullname }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="tugas" class="form-label"><strong>Tugas: </strong></label>
                        <select name="tugas_id" class="form-control">
                            <option value="">--- Pilih Tugas ---</option>
                            @foreach($tugas as $tug)
                            <option value="{{ $tug->id }}">{{ $tug->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center my-4">
                <button type="submit" class="btn btn-success" name="proses">Create</button>
            </div>
        </div>
        </div>

    </form>
@endsection
