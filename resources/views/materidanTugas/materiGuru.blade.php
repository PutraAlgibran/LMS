@extends('landingpage.index')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mb-5">
            @foreach ($materi as $key => $m)
                @if ($m->guru[0]->user_id == Auth::id() || Auth::user()->role == 'Admin')
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <h3 class="card-title">{{ $m->nama }}</h3>
                                <h4 class="text-muted">{{ $m->kelas[0]->nama }}</h4>
                            </div>
                            <img src="{{ asset('assets/img/avatars/book.jpg') }}" class="img-thumbnail">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <a class="btn btn-info" href="{{ url("/detailMapel/$m->id") }}"
                                            class="card-link">Detail</a>
                                        <a class="btn btn-warning" href="{{ url("/editMapel/$m->id") }}">Edit</a>

                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ url('/deleteMapel/' . $m->id) }}" class="btn btn-danger delete-confirm"
                                            role="button">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            {{-- Tambah Mata Pelajaran --}}
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="col-12 text-center">
                            <h4>Tambah Mata Pelajaran</h3>
                                <a type="button" data-bs-toggle="modal" data-bs-target="#modalCenter"><i
                                        class="bi bi-plus-lg" style="font-size: 40px">
                                    </i>
                                </a>
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
                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <form action="{{ url('/tambahMataPelajaran') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalCenterTitle">Tambah Mata Pelajaran</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row g-2">
                                                <div class="col mb-3">
                                                    <label for="nameWithTitle" class="form-label">Nama Mata
                                                        Pelajaran</label>
                                                    <select class="form-select" id="nama"
                                                        aria-label="Default select example" name="nama">
                                                        <option selected>Pilih Mata Pelajaran</option>
                                                        <option value="IPA">IPA</option>
                                                        <option value="Matematika">Matematika</option>
                                                        <option value="IPS">IPS</option>
                                                        <option value="Agama Islam">Agama Islam</option>
                                                        <option value="PJOK">PJOK</option>
                                                        <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                                                        <option value="Bahasa Inggris">Bahasa Inggris</option>
                                                        <option value="Seni Budaya">Seni Budaya</option>
                                                        <option value="PPKN">PPKN</option>
                                                        <option value="Prakarya">Prakarya</option>
                                                    </select>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col mb-0">
                                                        <label for="emailWithTitle" class="form-label">Keterangan
                                                            Mapel/Perkenalan</label>
                                                        <textarea rows="5" name="keterangan" class="form-control"
                                                            placeholder="Halo, Kita akan belajar bahasa inggris bersama selama 1 tahun kedepan ya, semangat semua"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col mb-3">
                                                    <label for="nameWithTitle" class="form-label">Nama Kelas</label>
                                                    <select class="form-select" id="kelas_id"
                                                        aria-label="Default select example" name="kelas_id">
                                                        <option selected>Pilih Kelas</option>
                                                        @foreach ($kelas as $k)
                                                            <option value="{{ $k->id }}">{{ $k->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <input type="submit" class="btn btn-primary" value="Kirim">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
