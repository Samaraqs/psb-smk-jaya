@extends('layouts.app')

@section('content')
<div class="container-fluid py-4 px-4" style="background-color: #f8fafc; min-height: 100vh;">
    
    <div class="row mb-5">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold text-dark mb-1">Pusat Kendali Admin</h2>
                <p class="text-muted">Pantau dan kelola pendaftaran siswa SMK Jaya secara realtime.</p>
            </div>
            <div class="d-none d-md-block">
                <span class="badge bg-white shadow-sm text-dark p-2 px-3" style="border-radius: 10px;">
                    📅 {{ date('d M Y') }}
                </span>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 20px; transition: 0.3s;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="p-3 bg-warning bg-opacity-10 rounded-3 text-warning">
                            <span style="font-size: 24px;">⏳</span>
                        </div>
                        <a href="/admin/pendaftar/pending" class="btn btn-light btn-sm rounded-circle">➡️</a>
                    </div>
                    <h6 class="text-muted small fw-bold text-uppercase">Menunggu Review</h6>
                    <h2 class="fw-extrabold mb-0">{{ $pendingCount }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 20px;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="p-3 bg-success bg-opacity-10 rounded-3 text-success">
                            <span style="font-size: 24px;">✅</span>
                        </div>
                        <a href="/admin/pendaftar/lulus" class="btn btn-light btn-sm rounded-circle">➡️</a>
                    </div>
                    <h6 class="text-muted small fw-bold text-uppercase">Siswa Lulus</h6>
                    <h2 class="fw-extrabold mb-0">{{ $lulusCount }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 20px;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="p-3 bg-primary bg-opacity-10 rounded-3 text-primary">
                            <span style="font-size: 24px;">🔄</span>
                        </div>
                        <a href="/admin/pendaftar/cadangan" class="btn btn-light btn-sm rounded-circle">➡️</a>
                    </div>
                    <h6 class="text-muted small fw-bold text-uppercase">Daftar Cadangan</h6>
                    <h2 class="fw-extrabold mb-0">{{ $cadanganCount }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 20px;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="p-3 bg-danger bg-opacity-10 rounded-3 text-danger">
                            <span style="font-size: 24px;">❌</span>
                        </div>
                        <a href="/admin/pendaftar/ditolak" class="btn btn-light btn-sm rounded-circle">➡️</a>
                    </div>
                    <h6 class="text-muted small fw-bold text-uppercase">Tidak Lulus</h6>
                    <h2 class="fw-extrabold mb-0">{{ $ditolakCount }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm mb-4" style="border-radius: 24px; background: linear-gradient(to right, #ffffff, #f1f5f9);">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="me-4 d-none d-md-block">
                        <div class="bg-dark text-white rounded-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; font-size: 30px;">
                            📊
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <h4 class="fw-bold mb-1">Laporan & Rekap Data</h4>
                        <p class="text-muted mb-0 small">Generate laporan hasil seleksi dalam format PDF atau Excel.</p>
                    </div>
                    <div class="ms-3">
                        <a href="/admin/laporan" class="btn btn-dark px-4 py-2 fw-bold shadow-sm" style="border-radius: 12px;">
                            Buka Laporan
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-2" style="border-radius: 24px; background: #4f46e5;">
                <div class="card-body text-white text-center">
                    <h5 class="fw-bold">Manajemen Jurusan</h5>
                    <p class="small opacity-75">Update kuota & info jurusan SMK Jaya.</p>
                    <a href="/admin/jurusan" class="btn btn-light btn-sm w-100 fw-bold py-2" style="border-radius: 10px; color: #4f46e5;">
                        Kelola Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .fw-extrabold { font-weight: 800; }
    .card { transition: transform 0.2s ease; }
    .card:hover { transform: translateY(-5px); }
</style>
@endsection