@extends('landingpage.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tugas /</span> "Nama Materi"</h4>
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
                          "Tugas Pertemuan - 1"
                    </button>
                </h2>

                <div id="accordionIcon-1" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                    <div class="accordion-body">
                        "Detail Tugas"
                    </div>
                    <div class="accordion-body ">
                        <div class="mt-3">
                            <!-- Button trigger modal -->
                            <button
                            type="button"
                            class="btn btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#modalCenter"
                            >
                            Upload Tugas
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Upload Tugas</h5>
                                        <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                        ></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-2">
                                            <div class="col mb-3">
                                                <label for="nameWithTitle" class="form-label">Name</label>
                                                <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Name" />
                                            </div>
                                            <div class="col mb-0">
                                                <label for="emailWithTitle" class="form-label">Kelas</label>
                                                <input type="text" id="emailWithTitle" class="form-control" placeholder="Nama Kelas" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-0">
                                                <label for="dobWithTitle" class="form-label">Upload File</label>
                                                <input type="file" id="dobWithTitle" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                        </button>
                                        <button type="button" class="btn btn-primary">Kirim</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
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
                          "Tugas Pertemuan - 2"
                    </button>
                </h2>

                <div id="accordionIcon-2" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                    <div class="accordion-body">
                        "Detail Tugas"
                    </div>
                    <div class="accordion-body ">
                        
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
                          "Tugas Pertemuan - 3"
                    </button>
                </h2>
                <div id="accordionIcon-3" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                    <div class="accordion-body">
                        "Detail Tugas"
                    </div>
                    <div class="accordion-body ">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection