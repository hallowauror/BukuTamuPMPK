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
                    <a href="{{ route('export')}}" class="btn btn-warning my-3">
                        <span class="icon text-white-100">
                            <i class="fas fa-download"></i>
                            Export Data Tamu
                         </span>
                    </a>
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