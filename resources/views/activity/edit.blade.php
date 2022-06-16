@extends('landingpage.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <div class="mt-4">
                    <h2>Edit Data User</h2>
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

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="fullname" class="form-label"><strong>Fullname: </strong></label>
                        <input type="text" value="{{ $user->fullname }}" name="fullname" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="role" class="form-label"><strong>Role: </strong></label>
                        <input type="text" name="role" class="form-control" value="{{ $user->role }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="username" class="form-label"><strong>Username: </strong></label>
                        <input type="text" name="username" class="form-control" value="{{ $user->username }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="email" class="form-label"><strong>Email: </strong></label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}"
                            aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="telpon" class="form-label"><strong>Telpon: </strong></label>
                        <input type="number" maxlength="12" name="telpon" class="form-control"
                            value="{{ $user->telpon }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="alamat" class="form-label"><strong>Alamat: </strong></label>
                        <textarea class="form-control" style="height:150px" name="alamat">{{ $user->alamat }}</textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="password" class="form-label"><strong>Password: </strong></label>
                        <input type="password" name="password" class="form-control" value="{{ $user->password }}">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center my-4">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
        </div>

    </form>
@endsection
