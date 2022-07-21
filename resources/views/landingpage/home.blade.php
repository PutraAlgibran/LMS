@extends('landingpage.index')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-8 mb-2 order-0">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="d-flex align-items-end row">
                                <div class="col-sm-7">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">Hai
                                            {{ Auth::user()->fullname }}</h5>
                                        <p class="mb-4">
                                            Absensi Kamu <span class="fw-bold">72%</span> dari minimal <span
                                                class="fw-bold">80%</span> absensi pada semester ini.
                                            <br><br>
                                            Yuk lihat absensimu dan jangan
                                            lupa untuk absen setiap ada KBM ya!!!
                                        </p>
                                        <a href="javascript:;" class="btn btn-sm btn-outline-primary"
                                            style="font-size: 20px">Lihat
                                            Absensi</a>
                                    </div>
                                </div>
                                <div class="col-sm-5 text-center text-sm-left">
                                    <div id="growthChart"></div>
                                    <div
                                        class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-5">
                        <div class="alert alert-primary">
                            <div class="card">
                                <div class="card-body">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--/ Calendar -->
            <div class="col-lg-4 order-3 order-md-2">
                <div class="row">
                    <div class="col-lg-12 col-md-4 order-1">
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
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="row">
                                <div class="card-body">    
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div>
                                            <h5 class="card-title text-primary">Kelas</h5>
                                        </div>
                                        <div>
                                        <a href="" type="button" class="btn btn-primary btn-icon-text mr-3">Detail</a>
                                        </div>                
                                    </div> 
                                    <div class="row mb-5">
                                        <div class="col-md-6 col-lg-4 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <h5 class="card-title">Title</h5>
                                                    <h6 class="card-subtitle text-muted">Nama Guru</h6>
                                                </div>
                                                <img src="{{ asset('assets/img/avatars/7.png') }}" class="img-thumbnail">                                                
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
    </div>
@endsection
