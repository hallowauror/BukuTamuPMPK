@extends('layouts.master')


@section('title')
<title>Data Tamu Dit. PMPK</title>
@endsection

@section('css')

@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h2 class="h3 mb-2 text-gray-800">Tamu Dit. PMPK</h2>
    

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tamu Dit. PMPK</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">  
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-plus"></i>
                    Tambah Data Tamu
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Input Tamu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form role="form" action="{{route('tamu.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="">Nama Tamu</label>
                                <input type="text" name="name" placeholder="Nama Tamu" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="">No. Telepon</label>
                                <input type="number" name="phone" maxlength="13" placeholder="No. Telepon" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="">Asal Instansi</label>
                                <input type="text" name="agency" placeholder="Asal Instansi" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="">Keperluan</label>
                                <input type="text" name="need" placeholder="Keperluan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="">Hari</label>
                                <input type="date" name="day" placeholder="Hari" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="">Waktu</label>
                                <input type="time" name="time" placeholder="Waktu" class="form-control" required>
                        </div>   
                        <div class="form-group">
                            <label class="">Pegawai yang Ingin Ditemui</label>
                                <select name="employee_id" id="employee_id" class="form-control" required>
                                    <option value="">-- Pilih Pegawai --</option>
                                    @foreach ($employees as $e)
                                        <option value="{{ $e->id }}">{{ ucFirst($e->name) }}</option>
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
                            <th>No. Telepon</th>
                            <th>Asal Instansi</th>
                            <th>Keperluan</th>
                            <th>Pegawai yang Ingin Ditemui</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($guest as $g)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucFirst($g->name) }}</td>
                            <td>{{ $g->phone }}</td>
                            <td>{{ $g->agency }}</td>
                            <td>{{ $g->need }}</td>
                            <td>{{ ucFirst($g->employee->name) }}</td>
                            <td>
                                <form action="{{ route('tamu.destroy', $g->id) }}" method="post">
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

@section('js')
@endsection