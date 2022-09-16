@extends('layouts.master')


@section('title')
<title>Data Pegawai Dit. PMPK</title>
@endsection

@section('css')

@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h2 class="h3 mb-2 text-gray-800">Pegawai Dit. PMPK</h2>
    

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pegawai Dit. PMPK</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">  
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
                @role('admin')
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-plus"></i>
                    Tambah Data Pegawai
                </button>
                @endrole

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Isi Data Dengan Lengkap</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form role="form" action="{{route('pegawai.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="">NIP</label>
                                <input type="number" name="nip" placeholder="NIP" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="">Nama Pegawai</label>
                                <input type="name" name="name" placeholder="Nama Pegawai" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="">Jabatan</label>
                                <input type="position" name="position" placeholder="Jabatan" class="form-control" required>
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
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            @role('admin')
                            <th>Aksi</th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($employee as $e)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $e->nip }}</td>
                            <td>{{ ucFirst($e->name) }}</td>
                            <td>{{ $e->position }}</td>
                            @role('admin')
                            <td>
                                <form action="{{ route('pegawai.destroy', $e->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                        <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit{{$e->id}}" data-id="{{ $e->id }}">
                                        <span class="icon text-white-100">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                    </a>
                                    <button class="btn btn-danger btn"><i class="fa fa-trash"></i></button>
                                </form>                                
                            </td>
                            @endrole
                             <!-- Modal Edit Data-->
                             <div class="modal fade" id="modalEdit{{$e->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Data Pegawai</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form role="form" action="{{ route('pegawai.update', $e->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="">NIP</label>
                                                        <input type="number" name="nip" value="{{ $e->nip }}" placeholder="NIP" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="">Nama Pegawai</label>
                                                        <input type="text" value="{{ $e->name }}" name="name" placeholder="Nama Pegawai" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="">Jabatan</label>
                                                        <input type="text" value="{{ $e->position }}" name="position" placeholder="Jabatan" class="form-control" required>
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

@section('js')
@endsection