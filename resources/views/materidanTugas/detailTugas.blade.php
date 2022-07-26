@extends('landingpage.index')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3"><span class="text-muted fw-light">Tugas/{{ $materi->nama }}</span>
        </h4>
        <div class="row g-2 d-flex justify-content-between">
            <div class="col-10 mt-4 text-right">
                <a href="{{ url("/detailMateri/$materi->id") }}" class="btn btn-primary">Back</a>
            </div>
            @if (Auth::user()->role !== 'Murid' && Auth::user()->role !== 'Staff' && $tugas == null)
                <div class="col-2 mt-4 text-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                        Tambah Tugas
                    </button>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form action="{{ url('/tambahTugas') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Upload Tugas</h5>
                            <input type="hidden" name="materi_id" value="{{ $materi_id }}">
                            <input type="hidden" name="guru_id" value="{{ $guru_id }}">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-2">
                                <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Nama Tugas</label>
                                    <select class="form-select" id="nama" aria-label="Default select example"
                                        name="nama">
                                        <option>Pilih Jenis Tugas</option>
                                        <option selected value="Tugas">Tugas</option>
                                        <option value="UAS">UAS</option>
                                        <option value="UTS">UTS</option>
                                        <option value="Ulangan Harian">Ulangan Harian</option>
                                    </select>
                                </div>
                                <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Pertemuan Ke-</label>
                                    <select class="form-select" aria-label="Default select example" name="pertemuan_id">
                                        <option selected>Pilih Pertemuan</option>
                                        @foreach ($pertemuan as $p)
                                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <label for="emailWithTitle" class="form-label">Start Task</label>
                                        <input type="date" name="jam_mulai" class="form-control">
                                    </div>
                                    <div class="col mb-0">
                                        <label for="emailWithTitle" class="form-label">Deadline</label>
                                        <input type="date" name="jam_berakhir" class="form-control">
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <label for="emailWithTitle" class="form-label">Keterangan</label>
                                        <textarea rows="5" name="keterangan" class="form-control" placeholder="Kerjain Sendiri!">Kerjain Sendiri!</textarea>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <label for="dobWithTitle" class="form-label">Upload File</label>
                                        <input type="file" name="tugasUpload" class="form-control">
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
        @endif
    </div>
    {{-- Tugas Murid --}}
    @if ($tugas !== null)
        <div class="col-md mb-4 mb-md-0">
            <div id="accordionIcon" class="accordion mt-3 accordion-without-arrow">
                <div class="accordion-item card">
                    <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                            data-bs-target="#accordionIcon-1" aria-controls="accordionIcon-1">
                            {{ $tugas->nama }}
                        </button>
                    </h2>
                    <div id="accordionIcon-1" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                        <div class="accordion-body">
                            {{ $tugas->keterangan }}
                        </div>
                        <div class="accordion-body ">
                            <div class="mt-3">
                                <a href="http://localhost:8000/assets/materi/{{ $materi->nama }}/{{ $tugas->nama }}/{{ $tugas->file }}"
                                    onclick="return confirm('Yakin Download Tugas?');">Download Tugas</a>
                            </div>
                            <div class="mt-3">
                                <form action="{{ url("/uploadTugas/$tugas->id") }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="materi_id" value="{{ $materi->id }}">
                                    <div class="row g-2">
                                        <div class="col-6 mb-0">
                                            <h5>Tugas Hanya Dapat Dikirim 1x</h5>
                                            <label for="dobWithTitle" class="form-label">Upload File Tugas</label>
                                            @if ($tugasUpload !== null and $tugasUpload !== '')
                                                <a href="http://localhost:8000/assets/materi/{{ $materi->nama }}/{{ $tugas->nama }}/TugasUpload/{{ $tugasUpload->file }}"
                                                    onclick="return confirm('Yakin Download Tugas?');">Download
                                                    Tugasmu</a>
                                            @elseif($tugasUpload !== '')
                                                @if (Date('Y-m-d') <= $tugas->jam_berakhir)
                                                    <input type="file" name="tugasUpload" class="form-control">
                                                @else
                                                    <br>
                                                    <h4>Pengumpulan Tugas Telah Berakhir, Silahkan Hubungi Guru Yang
                                                        Bersangkutan!</h4>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    @if ($tugasUpload == null and $tugasUpload == '')
                                        @if (Date('Y-m-d') <= $tugas->jam_berakhir)
                                            <div class="row g-2">
                                                <div class="col-3 mt-4">
                                                    <input type="submit" class="btn btn-primary" value="Kirim">
                                                </div>
                                            </div>
                                        @else
                                            <div class="row g-2">
                                                <div class="col-3 mt-3">
                                                    <input type="submit" class="btn btn-primary disabled"
                                                        value="Kirim">
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (Auth::user()->role == 'Guru' and $tugas !== null)
        {{-- Data Tugas Murid --}}
        <div class="col-md mb-4 mb-md-0">
            <div id="accordionIcon" class="accordion mt-3 accordion-without-arrow">
                <div class="accordion-item card">
                    <h4 class="text-center">Data Tugas Murid</h4>
                    <?php $i = 1; ?>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>File</th>
                                    <th>Waktu Upload</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($daftarTugas as $t)
                                    <tr class="table-success">
                                        <td>
                                            <i class="fab fa-bootstrap fa-lg text-primary me-3"></i>
                                            <strong>{{ $i++ }}</strong>
                                        </td>
                                        <td>{{ $t->user[0]->fullname }}</td>
                                        <td><a href="http://localhost:8000/assets/materi/{{ $materi->nama }}/{{ $tugas->nama }}/TugasUpload/{{ $t->file }}"
                                                onclick="return confirm('Yakin Download Tugas?');">Download
                                                Tugas</a>
                                        </td>
                                        <td>{{ $t->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
