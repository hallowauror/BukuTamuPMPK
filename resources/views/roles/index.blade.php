@extends('layouts.master')


@section('title')
<title>Data Role Aplikasi Buku Tamu</title>
@endsection

@section('css')

@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h2 class="h3 mb-2 text-gray-800">Role Pengguna Aplikasi Buku Tamu Dit. PMPK</h2>
    

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Role</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">  
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-plus"></i>
                    Tambah Role
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Isi Data Dengan Lengkap</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form role="form" action="{{route('role.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="">Nama Role</label>
                                <input type="text" name="name" placeholder="Nama Role" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
                    </div>
                    </div>
                </div>
                </div>   
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Role</th>
                            <th>Guard</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($role as $r)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucFirst($r->name) }}</td>
                            <td>{{ $r->guard_name }}</td>
                            <td>
                                <form action="{{ route('role.destroy', $r->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger btn"><i class="fa fa-trash"></i></button>
                                </form>                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection