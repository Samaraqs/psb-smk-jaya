<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Portal PSB | SMK Jaya Excellence</title>

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
:root{
    --primary:#4f46e5;
    --accent:#06b6d4;
}

body{
    font-family:'Plus Jakarta Sans',sans-serif;
    margin:0;
}

/* NAVBAR */
.navbar{
    background:rgba(0,0,0,.45);
    backdrop-filter:blur(10px);
}
.navbar a{
    color:#fff !important;
    font-weight:600;
}

/* HERO */
.hero{
    min-height:100vh;
    background:
        linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.6)),
        url("images/smk.webp") center center / cover no-repeat;
    display:flex;
    align-items:center;
    text-align:center;
    color:#fff;
}

.hero h1{
    font-size:3.5rem;
    font-weight:800;
}

.hero p{
    font-size:1.1rem;
    opacity:.9;
    max-width:700px;
    margin:0 auto;
}

/* BUTTON */
.btn-hero{
    padding:14px 36px;
    border-radius:14px;
    font-weight:600;
    border:none;
}

.btn-admin{
    background:#0f172a;
    color:#fff;
}

.btn-siswa{
    background:var(--primary);
    color:#fff;
}

.btn-register{
    background:var(--accent);
    color:#fff;
}

.btn-hero:hover{
    transform:translateY(-3px);
    box-shadow:0 12px 30px rgba(0,0,0,.35);
}

/* RESPONSIVE */
@media (max-width:768px){
    .hero h1{
        font-size:2.3rem;
    }
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top">
<div class="container">
    <a class="navbar-brand fw-bold" href="#">SMK JAYA</a>
</div>
</nav>

<!-- HERO SECTION -->
<section class="hero">
<div class="container">
    <span class="badge bg-light text-dark px-4 py-2 rounded-pill mb-3">
        🎓 Pendaftaran Siswa Baru 2026
    </span>

    <h1 class="my-4">
        Portal Penerimaan<br>
        Siswa Baru SMK Jaya
    </h1>

    <p class="mb-5">
        Sistem Penerimaan Siswa Baru berbasis digital
        yang cepat, transparan, dan mudah digunakan.
    </p>

    <div class="d-flex justify-content-center gap-3 flex-wrap">
        <a href="/login/" class="btn btn-hero btn-admin">Admin</a>
        <a href="/login" class="btn btn-hero btn-siswa">Siswa</a>
        <a href="/register" class="btn btn-hero btn-register">Register</a>
    </div>
</div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
