@extends('landingpage.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center mt-4">
                <div>
                    <h2>Tambah Data Guru</h2>
                </div>
            </div>
            <div class="col-12">
                <div style="float: right">
                    <a class="btn btn-primary" href="{{ url('/DataGuru') }}"> Back</a>
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

    <form action="{{ url('/tambahGuru') }}" method="POST">
        @csrf
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="nama" class="form-label"><strong>Nama Lengkap: </strong></label>
                        <input type="text" name="nama" class="form-control" placeholder="Leonardo De Caprio">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="email" class="form-label"><strong>Email: </strong></label>
                        <input type="email" name="email" class="form-control" placeholder="johndoe@gmail.com">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="telpon" class="form-label"><strong>Nomor Telpon: </strong></label>
                        <input type="text" maxlength="12" name="telpon" id="telpon" class="form-control"
                            placeholder="087879192911">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="user" class="form-label">Guru: </label>
                        <select class="form-select" id="user" aria-label="Default select example" name="user_id">
                            <option selected>Select the user</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->fullname }}</option>
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
