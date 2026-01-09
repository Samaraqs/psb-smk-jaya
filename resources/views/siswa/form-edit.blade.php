@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-header bg-primary text-white">
        Edit Formulir Pendaftaran
    </div>

    <div class="card-body">
        <form method="POST" action="/form-pendaftaran/update">
            @csrf

            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control"
                       value="{{ $pendaftaran->calonSiswa->nama_lengkap }}" required>
            </div>

            <div class="mb-3">
                <label>Asal Sekolah</label>
                <input type="text" name="asal" class="form-control"
                       value="{{ $pendaftaran->calonSiswa->asal_sekolah }}" required>
            </div>

            <div class="mb-3">
                <label>Jurusan</label>
                <select name="jurusan" class="form-select" required>
                    @foreach($jurusans as $j)
                        <option value="{{ $j->id }}"
                            {{ $pendaftaran->jurusan_id == $j->id ? 'selected' : '' }}>
                            {{ $j->nama_jurusan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="/dashboard-siswa" class="btn btn-secondary">
                    ← Kembali
                </a>

                <button type="submit" class="btn btn-success">
                    Update Data
                </button>
            </div>
        </form>

        {{-- ====== BERKAS ====== --}}
        <hr class="my-4">

        <h5>Berkas yang Sudah Diupload</h5>

        @if($pendaftaran->berkas->count() > 0)
            <table class="table table-bordered mt-3">
                <thead class="table-light">
                    <tr>
                        <th>Jenis Berkas</th>
                        <th>File</th>
                    </tr>
                </thead>
               <tbody>
@foreach($pendaftaran->berkas as $b)
<tr>
    <td>{{ ucfirst($b->jenis_berkas) }}</td>

    <td>
        <a href="{{ asset('storage/'.$b->file) }}"
           target="_blank"
           class="btn btn-sm btn-primary">
            Lihat
        </a>
    </td>

    <td>
        <form action="/hapus-berkas/{{ $b->id }}"
              method="POST"
              onsubmit="return confirm('Yakin ingin menghapus berkas ini?')">
            @csrf
            <button class="btn btn-sm btn-danger">
                Hapus
            </button>
        </form>
    </td>
</tr>
@endforeach
</tbody>

            </table>
        @else
            <div class="alert alert-info mt-3">
                Belum ada berkas yang diupload.
            </div>
        @endif

    </div>
</div>
@endsection
