<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Buku Tamu Dit. PMPK</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12 d-lg-block">
                                <div class="text-center">
                                    <img src="{{ asset('assets/img/PMPK.png')}}" alt="Logo" width="60%">
                                    <h1 class="font-weight-bolder text-dark">Selamat Datang !</h1>
                                </div>
                                <br/>
                                <div class="py-1 px-4">
                                    <h5>Untuk semua tamu yang berkunjung ke lingkungan Direktorat Pendidikan
                                        Masyarakat dan Pendidikan Khusus, dimohon untuk mengisi form buku tamu ini.
                                        Terima Kasih.
                                    </h5>
                                    <hr/>
                                </div>
                                <form class="py-1 px-4" role="form" action="{{route('tamu-pmpk.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf  
                                <div class="form-group">
                                        <label class="font-weight-bold">Nama Tamu</label>
                                        <input type="text" name="name" placeholder="Masukan Nama Anda" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">No. Telepon</label>
                                        <input type="number" name="phone" maxlength="13" placeholder="Masukan No. Telepon Anda" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Asal Instansi</label>
                                        <input type="text" name="agency" placeholder="Masukan Asal Instansi Anda" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Keperluan</label>
                                        <input type="text" name="need" placeholder="Masukan Keperluan Anda" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Hari</label>
                                        <input type="date" name="day" placeholder="Hari" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Waktu</label>
                                        <input type="time" name="time" placeholder="Waktu" class="form-control" required>
                                    </div>   
                                    <div class="form-group">
                                        <label class="font-weight-bold">Pegawai yang Ingin Ditemui</label>
                                        <select name="employee_id" id="employee_id" class="form-control js-example-basic-single" required>
                                            <option value="">-- Pilih Pegawai --</option>
                                            @foreach ($employees as $e)
                                                <option value="{{ $e->id }}">{{ ucFirst($e->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm my-2">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

</body>

</html>