@extends('landingpage.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Materi /</span> "Nama Materi"</h4>
    <div class="col-md mb-4 mb-md-0">
        <div id="accordionIcon" class="accordion mt-3 accordion-without-arrow">
            <div class="accordion-item card">
                <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
                    <button
                        type="button"
                        class="accordion-button collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#accordionIcon-1"
                        aria-controls="accordionIcon-1"
                    >
                          "Materi Pertemuan - 1"
                    </button>
                </h2>

                <div id="accordionIcon-1" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                    <div class="accordion-body">
                        "Detail Materi"
                    </div>
                    <div class="accordion-body ">
                        <a href="" type="button" class="btn btn-primary btn-icon-text mr-3">Download Materi</a>
                        <a href="{{ url('/detailTugas') }}" type="button" class="btn btn-primary btn-icon-text mr-3">Detail Tugas</a>
                    </div>
                </div>
            </div>
            <div id="accordionIcon" class="accordion mt-3 accordion-without-arrow">
            <div class="accordion-item card">
                <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconTwo">
                    <button
                        type="button"
                        class="accordion-button collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#accordionIcon-2"
                        aria-controls="accordionIcon-2"
                    >
                          "Materi Pertemuan - 2"
                    </button>
                </h2>

                <div id="accordionIcon-2" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                    <div class="accordion-body">
                        "Detail Materi"
                    </div>
                    <div class="accordion-body ">
                        <a href="" type="button" class="btn btn-primary btn-icon-text mr-3">Download Materi</a>
                        <a href="{{ url('/detailTugas') }}" type="button" class="btn btn-primary btn-icon-text mr-3">Detail Tugas</a>
                    </div>
                </div>
            </div>
            <div id="accordionIcon" class="accordion mt-3 accordion-without-arrow">
            <div class="accordion-item card">
                <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconThree">
                    <button
                        type="button"
                        class="accordion-button collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#accordionIcon-3"
                        aria-controls="accordionIcon-3"
                    >
                          "Materi Pertemuan - 3"
                    </button>
                </h2>
                <div id="accordionIcon-3" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                    <div class="accordion-body">
                        "Detail Materi"
                    </div>
                    <div class="accordion-body ">
                        <a href="" type="button" class="btn btn-primary btn-icon-text mr-3">Download Materi</a>
                        <a href="{{ url('/detailTugas') }}" type="button" class="btn btn-primary btn-icon-text mr-3">Detail Tugas</a>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection