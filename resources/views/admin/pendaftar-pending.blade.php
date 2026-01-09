@extends('layouts.app')

@section('content')
<h4>Daftar Calon Siswa (Pending)</h4>

<table class="table table-bordered table-striped mt-3">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Calon Siswa</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $i => $d)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $d->calonSiswa->nama_lengkap }}</td>
            <td>{{ $d->jurusan->nama_jurusan }}</td>
            <td>
                <a href="/admin/pendaftar/{{ $d->id }}" class="btn btn-sm btn-info">
                    Lihat Berkas
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="/admin/dashboard" class="btn btn-secondary mt-3">← Kembali</a>
@endsection
