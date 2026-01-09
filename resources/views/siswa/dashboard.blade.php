@extends('layouts.app')

@section('content')
<div class="container py-4">

    <!-- HEADER DASHBOARD -->
    <div class="card border-0 shadow-sm mb-4 header-card">
        <div class="card-body d-flex align-items-center justify-content-between flex-wrap">
            <div class="text-white">
                <h3 class="fw-bold mb-1">Dashboard Siswa</h3>
                <p class="mb-0 opacity-75">
                    Selamat datang, {{ Auth::user()->name }}.
                    Pantau progres pendaftaranmu di sini.
                </p>
            </div>

            <!-- ICON DARI FOTO SMK -->
            <div class="school-icon mt-3 mt-md-0">
                <img src="{{ asset('images/smk.webp') }}" alt="SMK">
            </div>
        </div>
    </div>

    <div class="row g-4">

        <!-- STATUS PENDAFTARAN -->
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm h-100 status-card">
                <div class="card-body text-center p-4">

                    <h5 class="fw-bold mb-4">Status Pendaftaran</h5>

                    @if(empty($pendaftaran))
                        <div class="status-icon bg-secondary">📝</div>
                        <span class="badge bg-secondary mt-3 px-4 py-2 rounded-pill">Belum Mendaftar</span>
                        <p class="text-muted small mt-3">
                            Silakan lengkapi formulir pendaftaran untuk melanjutkan.
                        </p>

                    @elseif($pendaftaran->status == 'pending')
                        <div class="status-icon bg-warning text-dark">⏳</div>
                        <span class="badge bg-warning text-dark mt-3 px-4 py-2 rounded-pill">
                            Menunggu Verifikasi
                        </span>
                        <p class="text-muted small mt-3">
                            Data kamu sedang diverifikasi oleh admin.
                        </p>

                    @elseif($pendaftaran->status == 'lulus')
                        <div class="status-icon bg-success">🎓</div>
                        <h4 class="fw-bold text-success mt-3">LULUS SELEKSI</h4>
                        <p class="text-success small">
                            Selamat! Kamu diterima sebagai siswa SMK Jaya.
                        </p>

                    @elseif($pendaftaran->status == 'cadangan')
                        <div class="status-icon bg-info">ℹ️</div>
                        <span class="badge bg-info text-dark mt-3 px-4 py-2 rounded-pill">
                            Cadangan
                        </span>
                        <p class="text-muted small mt-3">
                            Kamu berada di daftar cadangan.
                        </p>

                    @elseif($pendaftaran->status == 'ditolak')
                        <div class="status-icon bg-danger">✖</div>
                        <span class="badge bg-danger mt-3 px-4 py-2 rounded-pill">
                            Belum Berhasil
                        </span>
                        <p class="text-muted small mt-3">
                            Jangan menyerah, tetap semangat!
                        </p>
                    @endif

                </div>
            </div>
        </div>

        <!-- TIMELINE PENDAFTARAN -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Tahapan Pendaftaran</h5>

                    <div class="timeline">

                        <!-- STEP 1 -->
                        <div class="timeline-item active">
                            <div class="timeline-number">1</div>
                            <div>
                                <h6 class="fw-bold mb-1">Formulir Pendaftaran</h6>
                                <p class="text-muted small mb-2">
                                    Isi data diri dan pilihan jurusan.
                                </p>

                                @if(empty($pendaftaran))
                                    <a href="/form-pendaftaran" class="btn btn-primary btn-sm rounded-pill px-4">
                                        Mulai
                                    </a>
                                @else
                                    <a href="/form-pendaftaran/edit" class="btn btn-outline-primary btn-sm rounded-pill px-4">
                                        Lihat Data
                                    </a>
                                    <span class="text-success ms-2 small">✓ Selesai</span>
                                @endif
                            </div>
                        </div>

                        <!-- STEP 2 -->
                        <div class="timeline-item {{ empty($pendaftaran) ? '' : 'active' }}">
                            <div class="timeline-number">2</div>
                            <div>
                                <h6 class="fw-bold mb-1">Upload Berkas</h6>
                                <p class="text-muted small mb-2">
                                    Rapor, ijazah, dan pas foto.
                                </p>

                                @if(empty($pendaftaran))
                                    <button class="btn btn-light btn-sm rounded-pill px-4" disabled>
                                        Terkunci
                                    </button>
                                @else
                                    <a href="/upload-berkas" class="btn btn-info btn-sm text-white rounded-pill px-4">
                                        Upload
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!-- STEP 3 -->
                        <div class="timeline-item">
                            <div class="timeline-number">3</div>
                            <div>
                                <h6 class="fw-bold mb-1">Pengumuman</h6>
                                <p class="text-muted small mb-0">
                                    Hasil akhir seleksi.
                                </p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<style>
body{
    background:#f8fafc;
}

/* HEADER */
.header-card{
    background:
        linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.55)),
        url("{{ asset('images/smk.webp') }}") center/cover no-repeat;
    border-radius:22px;
}

.school-icon{
    width:90px;
    height:90px;
    border-radius:20px;
    overflow:hidden;
    background:rgba(255,255,255,.2);
    backdrop-filter:blur(8px);
    padding:8px;
}
.school-icon img{
    width:100%;
    height:100%;
    object-fit:cover;
    border-radius:14px;
}

/* STATUS */
.status-icon{
    width:80px;
    height:80px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:34px;
    color:#fff;
    margin:0 auto;
}

/* TIMELINE */
.timeline{
    display:flex;
    flex-direction:column;
    gap:28px;
}

.timeline-item{
    display:flex;
    gap:16px;
    opacity:.6;
}

.timeline-item.active{
    opacity:1;
}

.timeline-number{
    width:42px;
    height:42px;
    border-radius:50%;
    background:#e5e7eb;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
}

.timeline-item.active .timeline-number{
    background:#4f46e5;
    color:#fff;
}
</style>
@endsection
