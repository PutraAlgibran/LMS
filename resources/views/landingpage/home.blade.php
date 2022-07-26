@extends('landingpage.index')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-8 mb-2 order-0">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="d-flex align-items-center row">
                                <div class="col-12">
                                    <div class="card-body">
                                        <h4 class="card-title text-primary">Hai
                                            {{ Auth::user()->fullname }}</h4>
                                        <h5 class="mb-4">
                                            Absensi Kamu Saat Ini Adalah
                                            <span
                                                style="color:#696cff; font-size:30px; padding: 0 5px;">{{ $calculate }}%</span>
                                            dari minimal <span
                                                style="color:#696cff; font-size:30px; padding: 0 5px;">80%</span>
                                        </h5>
                                        <a href="{{ url('/absensi' . '/' . Auth::user()->username) }}"
                                            class="btn btn-sm btn-outline-primary" style="font-size: 20px">Lihat
                                            Absensi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-primary">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="card-title">
                                        <h3 class="text-secondary text-center">Quotes Of The Day (QOTD)</h3>
                                    </div>
                                    <figure class="text-center">
                                        <blockquote class="blockquote">
                                            <p>Terus lah tertawa, sebelum tertawa itu dilarang</p>
                                        </blockquote>
                                        <figcaption class="blockquote-footer">
                                            Dikutip dari <cite>Warkop DKI</cite>
                                        </figcaption>
                                    </figure>
                                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSe7qV82gCjOt7pjQ9JOI5u1xP1NSsxSoN9SqZYFJc0AJKPKeg/viewform?usp=sf_link"
                                        type="button" class="btn btn-info mx-auto">Kirim
                                        Quotes Of The Day Versimu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--/ Calendar -->
            <div class="col-lg-4 col-md-12 order-3 order-md-2 mb-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 order-1">
                        <div class="card">
                            <div class="row row-bordered g-0">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::user()->role == 'Murid')
            <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="card">
                                <div class="row">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div>
                                                <h5 class="card-title text-primary">Mata Pelajaran</h5>
                                            </div>
                                            <div>
                                                <a href="{{ url('/materiUser') }}" type="button"
                                                    class="btn btn-primary btn-icon-text mr-3">Detail</a>
                                            </div>
                                        </div>
                                        <div class="container text-center my-3">
                                            <div class="row mx-auto my-auto justify-content-center">
                                                <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                                                    <div class="carousel-inner" role="listbox">
                                                        @foreach ($materi as $key => $m)
                                                            @if ($m->kelas[0]->id == session()->get('kelas_id'))
                                                                <div
                                                                    class="carousel-item {{ $key == $firstIndex ? 'active' : '' }}">
                                                                    <div class="col-md-4">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h6 class="card-subtitle bg-dark py-1">
                                                                                    {{ $m->nama }}
                                                                                </h6>
                                                                                <h6 class="card-subtitle text-muted pt-3">
                                                                                    {{ $m->kelas[0]->nama }}
                                                                                </h6>
                                                                            </div>
                                                                            <div class="card-img">
                                                                                <img src="{{ asset('assets/img/avatars/book.jpg') }}"
                                                                                    class="img-fluid">
                                                                            </div>
                                                                            <div class="card-footer">
                                                                                {{ $m->guru[0]->nama }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <a class="carousel-control-prev bg-transparent w-aut"
                                                        href="#recipeCarousel" role="button" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    </a>
                                                    <a class="carousel-control-next bg-transparent w-aut"
                                                        href="#recipeCarousel" role="button" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
