@extends('layouts.master')


@section('title')
<title>Data User Buku Tamu</title>
@endsection

@section('css')

@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h2 class="h3 mb-2 text-gray-800">User Pengguna Aplikasi Buku Tamu Dit. PMPK</h2>
    

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">  
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-plus"></i>
                    Tambah User
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
                    <form role="form" action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="">Nama</label>
                                <input type="text" name="name" placeholder="Nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="">Email</label>
                                <input type="email" name="email" placeholder="Email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="">Password</label>
                                <input type="password" name="password" placeholder="Password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="">Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="">-- Pilih Role --</option>
                                    @foreach ($roles as $r)
                                        <option value="{{ $r->name }}">{{ ucFirst($r->name) }}</option>
                                    @endforeach
                                </select>
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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $u)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucFirst($u->name) }}</td>
                            <td>{{ $u->email }}</td>
                            <td> 
                                @foreach ($u->getRoleNames() as $role)
                                <label for="" class="badge badge-info">{{ ucFirst($role) }}</label>
                                @endforeach
                            </td>
                            <td>
                                <form action="{{ route('user.destroy', $u->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                        <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit{{$u->id}}" data-id="{{ $u->id }}">
                                        <span class="icon text-white-100">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                    </a>
                                    <button class="btn btn-danger btn"><i class="fa fa-trash"></i></button>
                                </form>                                
                            </td>

                             <!-- Modal Edit Data-->
                             <div class="modal fade" id="modalEdit{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Data User</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form role="form" action="{{ route('user.update', $u->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="">Nama</label>
                                                        <input type="text" name="name" value="{{ $u->name }}" placeholder="Nama" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="">Email</label>
                                                        <input type="email" name="email" value="{{ $u->email }}" placeholder="Email" class="form-control" required readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label class="">Password</label>
                                                        <input type="password" name="password" placeholder="Password" class="form-control">
                                                        <p class="text-danger">Biarkan kosong, jika tidak ingin mengganti password</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection