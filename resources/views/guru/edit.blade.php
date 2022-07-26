@extends('landingpage.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <div class="mt-4">
                    <h2>Edit Data Guru</h2>
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

    <form action="{{ url('/editGuru/' . $guru->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-xs-12 col-sm-12 col-md-12 mb-1">
                    <div class="form-group">
                        <label for="nama" class="form-label"><strong>Fullname: </strong></label>
                        <input type="text" value="{{ $guru->nama }}" name="nama" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-1">
                    <div class="form-group">
                        <label for="email" class="form-label"><strong>Email: </strong></label>
                        <input type="email" value="{{ $guru->email }}" name="email" class="form-control" id="email"
                            placeholder="name@gmail.com">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-1">
                    <div class="form-group">
                        <label for="telpon" class="form-label"><strong>Telpon: </strong></label>
                        <input type="text" value="{{ $guru->telpon }}" name="telpon" maxlength="12"
                            class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="user_id" class="form-label">User Name (by: user_id)</label>
                        <select class="form-select" id="user_id" aria-label="Default select example" name="user_id"
                            required>
                            <option>Select the user</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $guru->user_id ? 'selected' : '' }}>
                                    {{ $user->fullname }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center my-4">
                <button type="submit" class="btn btn-success" name="proses">Update</button>

                <a href="{{ url('/DataGuru') }}" class="btn btn-success">Batal</a>
            </div>
        </div>

    </form>
@endsection
