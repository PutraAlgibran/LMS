@extends('landingpage.index')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mb-5">
            @foreach ($materi as $key => $m)
                @if ($m->kelas[0]->id == session()->get('kelas_id'))
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $m->nama }}</h5>
                                <h6 class="card-subtitle text-muted">{{ $m->guru[0]->nama }}</h6>
                            </div>
                            <img src="{{ asset('assets/img/avatars/book.jpg') }}" class="img-thumbnail">
                            <div class="card-body">
                                <a style="font-size: 20px" href="{{ url("/detailMateri/$m->id") }}" class="card-link">Detail
                                    Materi</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
