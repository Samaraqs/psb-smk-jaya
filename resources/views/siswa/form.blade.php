@extends('layouts.app')

@section('content')
<div class="card shadow">
  <div class="card-header bg-primary text-white">
    Form Pendaftaran Siswa
  </div>

  <div class="card-body">
    <form method="POST" action="/form-pendaftaran" enctype="multipart/form-data">
      @csrf

      <!-- DATA SISWA -->
      <div class="mb-3">
        <label>NISN</label>
        <input type="text" name="nisn" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Asal Sekolah</label>
        <input type="text" name="asal" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required></textarea>
      </div>

      <!-- JURUSAN -->
      <div class="mb-3">
        <label>Pilih Jurusan</label>
        <select name="jurusan" class="form-select" required>
          <option value="">-- Pilih Jurusan --</option>
          @foreach($jurusans as $j)
            <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
          @endforeach
        </select>
      </div>

      <button class="btn btn-success">
        Simpan Pendaftaran
      </button>
    </form>
  </div>
</div>
@endsection
