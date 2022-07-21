@extends('landingpage.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center mt-4">
                <div>
                    <h2>Tambah Data User</h2>
                </div>
            </div>
            <div class="col-12">
                <div style="float: right">
                    <a class="btn btn-primary" href="{{ route('murid.index') }}"> Back</a>
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

    <form action="{{ url('/tambahMurid') }}" method="POST">
        @csrf
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="fullname" class="form-label"><strong>Nama Lengkap: </strong></label>
                        <input type="text" name="nama" class="form-control" placeholder="Leonardo De Caprio">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="user" class="form-label">Murid: </label>
                        <select class="form-select" id="user" aria-label="Default select example" name="user_id">
                            <option selected>Select the user</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->fullname }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="kelas_id" class="form-label">Kelas: </label>
                        <select class="form-select" id="kelas_id" aria-label="Default select example" name="kelas_id">
                            <option selected>Select the class</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center my-4">
                    <button type="submit" class="btn btn-success" name="proses">Create</button>
                </div>
            </div>
        </div>

    </form>
@endsection
