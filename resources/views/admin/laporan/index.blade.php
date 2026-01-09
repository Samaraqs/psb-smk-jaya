@extends('layouts.app')

@section('content')
<h3>Laporan Pendaftaran Siswa</h3>

<a href="/admin/laporan/cetak" class="btn btn-danger mb-3">
    Cetak PDF
</a>

<table class="table table-bordered">
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
        @forelse($data as $d)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $d->calonSiswa->nama_lengkap }}</td>
            <td>{{ $d->calonSiswa->asal_sekolah }}</td>
            <td>{{ $d->jurusan->nama_jurusan }}</td>
            <td>
                <span class="badge bg-secondary">{{ strtoupper($d->status) }}</span>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center text-muted">
                Data pendaftaran belum ada
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
