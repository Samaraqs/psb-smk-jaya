@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-header bg-info text-white">
        Upload Berkas Pendaftaran
    </div>

    <div class="card-body">
        <form method="POST" action="/upload-berkas" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Jenis Berkas</label>
                <select name="jenis_berkas" class="form-select" required>
                    <option value="">-- Pilih Berkas --</option>
                    <option value="Ijazah">Ijazah / SKL</option>
                    <option value="Rapor">Rapor</option>
                    <option value="KK">Kartu Keluarga</option>
                    <option value="Foto">Pas Foto</option>
                </select>
            </div>

            <div class="mb-3">
                <label>File</label>
                <input type="file" name="file" class="form-control" required>
            </div>

            <button class="btn btn-success">
                Upload Berkas
            </button>
            <div class="d-flex justify-content-between mt-4">
    <a href="/dashboard-siswa" class="btn btn-secondary">
        ← Kembali
    </a>
        </form>
    </div>
</div>
@endsection
