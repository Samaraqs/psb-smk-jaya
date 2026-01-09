@extends('layouts.app')

@section('content')
<h4 class="mb-3">Daftar Siswa Cadangan</h4>

<table class="table table-bordered table-striped">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Jurusan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse($data as $i => $d)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $d->calonSiswa->nama_lengkap }}</td>
            <td>{{ $d->jurusan->nama_jurusan }}</td>
            <td><span class="badge bg-primary">Cadangan</span></td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center text-muted">
                Tidak ada siswa cadangan
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

<a href="/admin/dashboard" class="btn btn-secondary mt-3">← Kembali</a>
@endsection
