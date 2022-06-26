@extends('landingpage.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-5">
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">"Nama Mata Pelajaran"</h5>
                    <h6 class="card-subtitle text-muted">"Nama Pengajar"</h6>
                </div>
                <img src="{{ asset('assets/img/avatars/7.png') }}" class="img-thumbnail">
                <div class="card-body">
                    <a href="javascript:void(0);" class="card-link">Materi</a>
                    <a href="javascript:void(0);" class="card-link">Tugas</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection