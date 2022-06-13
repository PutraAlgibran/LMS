@extends('landingpage.index')
@section('content')
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
    <a class="btn btn-success" href="">Tambah User</a>
</div>
<br>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-dark">
                      <tr>
                        <th>No</th>
                        <th>Fullname</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <tr>
                        <td>1</td>
                        <td>Krisna Naufal</td>
                        <td>krisna</td>
                        <td>admin</td>
                        <td>
                            <form action="" method="POST">
                                <a class="btn btn-info" href=""><i class="bi bi-eye">Details</i></a>
                                <a class="btn btn-primary" href=""><i class="bi bi-pencil-square">Edit</i></a>
                        
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash3">Delete</i></button>
                            </form>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
@endsection