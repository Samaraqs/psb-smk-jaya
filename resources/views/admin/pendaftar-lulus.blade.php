@extends('layouts.app')

@section('content')
<h4>Daftar Siswa Lulus</h4>

<table class="table table-bordered table-striped mt-3">
    <thead class="table-success">
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
            <td>
                <span class="badge bg-success">Lulus</span>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center text-muted">
                Belum ada siswa lulus
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

<a href="/admin/dashboard" class="btn btn-secondary mt-3">
    ← Kembali ke Dashboard
</a>
@endsection
