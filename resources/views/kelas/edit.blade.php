@extends('landingpage.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center mt-4">
                <div>
                    <h2>Ubah Data Kelas</h2>
                </div>
            </div>
            <div class="col-12">
                <div style="float: right">
                    <a class="btn btn-primary" href="{{ url('/DataKelas') }}"> Back</a>
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

    <form action="{{ url('/editKelas/' . $kelas->id) }}" method="POST">
        @csrf
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="nama" class="form-label"><strong>Kelas: </strong></label>
                        <input type="text" name="nama" class="form-control" value="{{ $kelas->nama }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center my-4">
                    <button type="submit" class="btn btn-success" name="proses">Update</button>
                </div>
            </div>
        </div>

    </form>
@endsection
