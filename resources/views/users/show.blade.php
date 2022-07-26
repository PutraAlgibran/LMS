@extends('landingpage.index')
@section('content')
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
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <h1 class="mt-4 text-center">Profile Details</h1>
                        <hr>
                        <div class="col-12 text-center">
                            <label class="form-label">Nama</label>
                            <h3>{{ $user->fullname }}</h3>
                        </div>
                        <!-- Account -->
                        <div class="mx-auto mb-4 justify-content-center">
                            <div class="d-flex align-items-center align-items-sm-center gap-4">
                                <img src="{{ asset('assets/img/avatars/' . $user->foto) }}" alt="user-avatar"
                                    class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <form id="formAccountSettings" method="POST" onsubmit="return false">
                                <div class="row d-flex justify-content-between">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Status</label>
                                        <h3>{{ $user->role }}</h3>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Phone Number</label>
                                        <h3>{{ $user->telpon }}</h3>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-between">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Email</label>
                                        <h3>{{ $user->email }}</h3>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Address</label>
                                        <h3>{{ $user->alamat }}</h3>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-12 mt-2 d-flex justify-content-between">
                                        <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}"><i
                                                class="bi bi-pencil-square pe-2"></i>Edit</a>

                                        <a class="btn btn-primary" href="{{ url('/home') }}"> Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /Account -->
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
@endsection
