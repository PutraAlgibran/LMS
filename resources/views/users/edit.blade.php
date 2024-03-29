@extends('landingpage.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <div class="mt-4">
                    <h2>Edit Data User</h2>
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
                        <label for="role" class="form-label">Role: </label>
                        <select class="form-select" id="role" aria-label="Default select example" name="role">
                            <option>Select the role</option>
                            <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Staff" {{ $user->role == 'Staff' ? 'selected' : '' }}>Staff</option>
                            <option value="Guru" {{ $user->role == 'Guru' ? 'selected' : '' }}>Guru</option>
                            <option value="Murid" {{ $user->role == 'Murid' ? 'selected' : '' }}>Murid</option>
                        </select>
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
                        <input type="text" maxlength="12" name="telpon" id="telpon" value="{{ $user->telpon }}"
                            class="form-control" placeholder="087879192911">
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
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="foto" class="form-label"><strong>Foto: </strong>
                            <p>*foto tidak dapat diubah setelah dikirim</p>
                        </label>
                        <input type="file" class="form-control" name="foto" />
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center my-4">
                <button type="submit" class="btn btn-success" name="proses">Update</button>

                <a href="{{ url('home') }}" class="btn btn-success">Batal</a>
            </div>
        </div>

    </form>
@endsection
