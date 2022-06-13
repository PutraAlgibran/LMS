@extends('landingpage.index')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container-fluid">
        <div class="card" padding="20px">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
            <br>
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div align="center">
                        <h3 class="display-3">Daftar User</h3>
                    </div>
                </div>
            </div>
            <div align="right">
                <a class="btn btn-success me-5" href="{{ route('users.create') }}">Tambah User</a>
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
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row" class="text-center">{{ ++$i }}</th>
                                <td>{{ $user->fullname }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->role }}</td>
                                <td class="text-center">
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        <a class="btn btn-info" href="{{ route('users.show', $user->id) }}"><i
                                                class="bi bi-eye">Details</i></a>
                                        <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}"><i
                                                class="bi bi-pencil-square">Edit</i></a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger"><i
                                                class="bi bi-trash3">Delete</i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
