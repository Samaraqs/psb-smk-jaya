@extends('layouts.app')

@section('content')
<h4>Detail Calon Siswa</h4>

<div class="card shadow mb-3">
    <div class="card-body">
        <p><strong>Nama:</strong> {{ $pendaftaran->calonSiswa->nama_lengkap }}</p>
        <p><strong>Asal Sekolah:</strong> {{ $pendaftaran->calonSiswa->asal_sekolah }}</p>
        <p><strong>Jurusan:</strong> {{ $pendaftaran->jurusan->nama_jurusan }}</p>
    </div>
</div>

<h5>Berkas Pendaftaran</h5>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Jenis Berkas</th>
            <th>File</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pendaftaran->berkas as $b)
        <tr>
            <td>{{ $b->jenis_berkas }}</td>
            <td>
                <a href="{{ asset('storage/'.$b->file) }}" target="_blank">
                    Lihat File
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<!-- NILAI SELEKSI -->
<h5>Nilai Seleksi</h5>
<div class="card shadow mb-4">
    <div class="card-body">
        <form method="POST" action="/admin/nilai">
            @csrf
            <input type="hidden" name="id" value="{{ $pendaftaran->id }}">

            <div class="mb-3">
                <label class="form-label">Nilai Rapor</label>
                <input type="number"
                       name="rapor"
                       class="form-control"
                       min="0"
                       max="100"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nilai Tes</label>
                <input type="number"
                       name="tes"
                       class="form-control"
                       min="0"
                       max="100"
                       required>
            </div>

            <button class="btn btn-primary">
                Simpan Nilai & Tentukan Status
            </button>
        </form>
    </div>
</div>



<div class="mt-4">
    <form method="POST" action="/admin/verifikasi/{{ $pendaftaran->id }}">
        @csrf

        <button name="status" value="lulus" class="btn btn-success">
            Terima (Lulus)
        </button>

        <button name="status" value="cadangan" class="btn btn-primary">
            Jadikan Cadangan
        </button>

        <button name="status" value="ditolak" class="btn btn-danger">
            Tolak
        </button>

        <a href="/admin/pendaftar/pending" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>

@endsection
