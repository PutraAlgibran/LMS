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
                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
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
                    <label for="nim" class="form-label"><strong>Fullname:</strong></label>
                    <h3>{{ $user->fullname }}</h3>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                <div class="form-group">
                    <label for="name" class="form-label"><strong>Role:</strong></label>
                    <h3>{{ $user->role }}</h3>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                <div class="form-group">
                    <label for="alamat" class="form-label"><strong>Email: </strong></label>
                    <h3>{{ $user->email }}</h3>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                <div class="form-group">
                    <label for="email" class="form-label"><strong>Telpon: </strong></label>
                    <h3>{{ $user->telpon }}</h3>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 my-1 mb-5">
                <div class="form-group">
                    <label for="email" class="form-label"><strong>Alamat: </strong></label>
                    <h3>{{ $user->alamat }}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
