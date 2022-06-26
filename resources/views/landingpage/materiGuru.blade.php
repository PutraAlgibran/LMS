@extends('landingpage.index')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container-fluid">
        <div class="card" padding="20px">
            <br>
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div align="center">
                        <h3 class="display-3">Daftar User</h3>
                    </div>
                </div>
            </div>
            <div align="right">
                <a class="btn btn-success me-5" href="">
                    <i class="bi bi-plus-lg pe-2"></i>Tambah User
                </a>
            </div>
            <br>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Fullname</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                            <tr>
                                <th scope="row" class="text-center"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center">
                                    <form action="" method="POST">
                                        <a class="btn btn-info" href=""><i
                                                class="bi bi-eye pe-2"></i>Details</a>
                                        <a class="btn btn-primary" href=""><i
                                                class="bi bi-pencil-square pe-2"></i>Edit</a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger"><i
                                                class="bi bi-trash3 pe-2"></i>Delete</button>
                                    </form>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection