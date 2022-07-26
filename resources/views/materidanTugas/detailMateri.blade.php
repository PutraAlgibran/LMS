@extends('landingpage.index')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3"><span class="text-muted fw-light">Materi/{{ $materi->nama }}</span>
        </h4>

        @if (Auth::user()->role !== 'Murid' && Auth::user()->role !== 'Staff')
            <div class="row d-flex align-content-evenly">
                <div class="col-10">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                        Tambah Pertemuan
                    </button>
                </div>
                <div class="col-2 text-right ">
                    <a href="{{ url('/materiGuru') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Modal -->
            <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <form action="{{ url("/storePertemuan/$materi->id") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Upload Materi</h5>
                                <input type="hidden" name="materi_id" value="{{ $materi_id }}">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-2">
                                    <div class="row g-2">
                                        <div class="col mb-0">
                                            <label for="nameWithTitle" class="form-label">Pertemuan Ke - </label>
                                            <input class="form-control" name="nama" type="number" placeholder="1" />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col mb-0">
                                            <label for="emailWithTitle" class="form-label">Keterangan</label>
                                            <textarea rows="5" name="keterangan" class="form-control" placeholder="Kerjain Sendiri!"></textarea>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col mb-0">
                                            <label for="dobWithTitle" class="form-label">Upload File Materi</label>
                                            <input type="file" name="file" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <input type="submit" class="btn btn-primary" value="Kirim">
                                </div>
                            </div>
                    </form>
                </div>
            </div>
    </div>
    @endif
    @foreach ($pertemuan as $key => $p)
        <?php
        $no = $key + 1;
        ?>
        <div class="col-md mb-4 mb-md-0">
            <div id="accordionIcon" class="accordion mt-3 accordion-without-arrow">
                <div class="accordion-item card">
                    <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                            data-bs-target="#accordionIcon-{{ $no }}"
                            aria-controls="accordionIcon-{{ $no }}">Pertemuan - {{ $p->nama }}
                        </button>
                    </h2>
                    <div id="accordionIcon-{{ $no }}" class="accordion-collapse collapse"
                        data-bs-parent="#accordionIcon">
                        <div class="accordion-body">
                            {{ $p->keterangan }}
                        </div>
                        <div class="accordion-body ">
                            <div class="mt-3">
                                <a href="http://localhost:8000/assets/materi/{{ $materi->nama }}/{{ $p->file }}"
                                    onclick="return confirm('Yakin Download Materi?');">Download Materi</a>
                            </div>
                            <div class="mt-3">
                                <div class="row g-2">
                                    <div class="col-2 mt-4">
                                        <a class="btn btn-primary d-grid"
                                            href="{{ url("detailTugas/$p->materi_id/$p->id") }}">Lihat Tugas</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
@endsection
