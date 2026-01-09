@extends('layouts.app')

@section('content')
<h3>Laporan Pendaftaran Siswa</h3>

<a href="/admin/laporan/cetak" class="btn btn-danger mb-3">
    Cetak PDF
</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Asal Sekolah</th>
            <th>Jurusan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $i => $d)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $d->calonSiswa->nama_lengkap }}</td>
            <td>{{ $d->calonSiswa->asal_sekolah }}</td>
            <td>{{ $d->jurusan->nama_jurusan }}</td>
            <td>{{ strtoupper($d->status) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
