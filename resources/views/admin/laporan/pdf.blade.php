<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Pendaftaran PSB</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #eee;
        }
    </style>
</head>
<body>

<h3>LAPORAN PENDAFTARAN SISWA<br>PSB SMK JAYA</h3>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Asal Sekolah</th>
            <th>Jurusan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $d->calonSiswa->nama_lengkap }}</td>
            <td>{{ $d->calonSiswa->asal_sekolah }}</td>
            <td>{{ $d->jurusan->nama_jurusan }}</td>
            <td>{{ strtoupper($d->status) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
