@extends('landingpage.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <div class="mt-4">
                    <h2>Edit Data Murid</h2>
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

    <form action="{{ url('/editMurid/' . $murid->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-xs-12 col-sm-12 col-md-12 mb-1">
                    <div class="form-group">
                        <label for="nama" class="form-label"><strong>Fullname: </strong></label>
                        <input type="text" value="{{ $murid->nama }}" name="nama" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="kelas_id" class="form-label">Kelas: </label>
                        <select class="form-select" id="kelas_id" aria-label="Default select example" name="kelas_id">
                            <option selected>Select the class</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}" {{ $k->id == $murid->kelas_id ? 'selected' : '' }}>
                                    {{ $k->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center my-4">
                <button type="submit" class="btn btn-success" name="proses">Update</button>

                <a href="{{ route('murid.index') }}" class="btn btn-success">Batal</a>
            </div>
        </div>

    </form>
@endsection
