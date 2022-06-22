@extends('landingpage.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="mt-4">
                    <h2>Details Data Mahasiswa</h2>
                </div>
            </div>
            <div class="col-lg-12 mt-2">
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
    <div class="container-fluid">
        <div class="row mx-1">
            <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                <div class="form-group">
                    <label for="nim" class="form-label"><strong>Guru:</strong></label>
                    <h3>{{ $activity->nama }}</h3>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                <div class="form-group">
                    <label for="name" class="form-label"><strong>Materi:</strong></label>
                    <h3>{{ $activity->materi->nama }}</h3>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                <div class="form-group">
                    <label for="alamat" class="form-label"><strong>Nama Siswa: </strong></label>
                    <h3>{{ $activity->user->fullname }}</h3>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                <div class="form-group">
                    <label for="email" class="form-label"><strong>Tugas: </strong></label>
                    <h3>{{ $activity->tugas->nama }}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
