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

    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="fullname" class="form-label"><strong>Fullname: </strong></label>
                        <input type="text" name="fullname" class="form-control" placeholder="Leonardo De Caprio">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="role" class="form-label"><strong>Role: </strong></label>
                        <input type="text" name="role" class="form-control" placeholder="Staff">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="username" class="form-label"><strong>Username: </strong></label>
                        <input type="text" name="username" class="form-control" placeholder="Edward">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="email" class="form-label"><strong>Email: </strong></label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="example@gmail.com"
                            aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="telpon" class="form-label"><strong>Telpon: </strong></label>
                        <input type="number" maxlength="12" name="telpon" class="form-control" placeholder="087879192911">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="alamat" class="form-label"><strong>Alamat: </strong></label>
                        <textarea class="form-control" style="height:150px" name="alamat" placeholder="Alamat"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="password" class="form-label"><strong>Password: </strong></label>
                        <input type="password" name="password" class="form-control" placeholder="password">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="foto" class="form-label"><strong>Foto: </strong><p>*foto tidak dapat diubah setelah dikirim</p></label>
                        <input type="file" name="foto" class="form-control">
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
