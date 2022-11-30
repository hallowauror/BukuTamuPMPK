<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Tamu Direktorat PMPK</title>
    <style>
        body{
            padding: 0;
            margin: 0;
        }
        .header{
            text-align: center;
        }
        .page{
            max-width: 80em;
            margin: 0 auto;
        }
        table th,
        table td{
            text-align: left;
        }
        table.layout{
            width: 100%;
            border-collapse: collapse;
        }
        table.display{
            margin: 1em 0;
        }
        table.display th,
        table.display td{
            border: 1px solid #B3BFAA;
            padding: .5em 1em;
        }
​
        table.display th{ background: #D5E0CC; }
        table.display td{ background: #fff; }
​
        table.responsive-table{
            box-shadow: 0 1px 10px rgba(0, 0, 0, 0.2);
        }
​
        .listcust {
            margin: 0;
            padding: 0;
            list-style: none;
            display:table;
            border-spacing: 10px;
            border-collapse: separate;
            list-style-type: none;
        }
​
        .data {
            padding-left: 600px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h3>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</h3>
        <h3>DIREKTORAT JENDERAL PENDIDIKAN ANAK USIA DINI, PENDIDIKAN DASAR, DAN PENDIDIKAN MENENGAH</h3>
        <h3 class="font-weight-bold">DIREKTORAT PENDIDIKAN MASYARAKAT DAN PENDIDIKAN KHUSUS</h3>
        <h4>Jalan RS. Fatmawati, Gedung B dan E Kompleks Kemendikbud Cipete Jakarta Selatan 12420</h4>
        <hr/>
    </div>
    <div class="page">
        <table class="layout display responsive-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Tamu</th>
                    <th>No. Telepon</th>
                    <th>Asal Instansi</th>
                    <th>Keperluan</th>
                    <th>Pegawai yang Ingin Ditemui</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp

                @foreach ($guests as $g)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $g->name }}</td>
                    <td>{{ $g->phone }}</td>
                    <td>{{ $g->agency }}</td>
                    <td>{{ $g->need }}</td>
                    <td>{{ $g->employee->name }}</td>
                </tr>
                @endforeach

                
            </tfoot>
        </table>
    </div>
</body>
</html>