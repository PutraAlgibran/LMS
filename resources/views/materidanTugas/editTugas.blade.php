@extends('landingpage.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <div class="mt-4">
                    <h2>Edit Data</h2>
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

    <form action="{{ url('/updateTugas/' . $tugas->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="emailWithTitle" class="form-label">Start Task</label>
                                <input type="date" name="jam_mulai" value="{{ date($tugas->jam_mulai) }}"
                                    class="form-control">
                            </div>
                            <div class="col mb-0">
                                <label for="emailWithTitle" class="form-label">Deadline</label>
                                <input type="date" name="jam_berakhir"
                                    value="{{ date($tugas->jam_berakhir) }}"class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                        <div class="form-group">
                            <label for="emailWithTitle" class="form-label">Keterangan</label>
                            <textarea rows="5" name="keterangan" class="form-control" placeholder="Kerjain Sendiri!">{{ $tugas->keterangan }}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                        <div class="form-group">
                            <label for="dobWithTitle" class="form-label">Upload File</label>
                            <input type="file" name="tugasUpload" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center my-4">
                    <button type="submit" class="btn btn-success" name="proses">Update</button>

                    <a href="{{ url('/materiGuru') }}" class="btn btn-success">Batal</a>
                </div>
            </div>
    </form>
@endsection
