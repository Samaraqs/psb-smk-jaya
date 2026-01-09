<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi | PSB SMK Jaya</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0d6efd, #198754);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .register-card {
            border-radius: 16px;
            overflow: hidden;
            width: 100%;
            max-width: 450px; /* Menjaga ukuran tetap proporsional */
        }

        .register-header {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(6px);
            color: white;
            text-align: center;
            padding: 30px 20px;
        }

        .register-header h4 {
            font-weight: 700;
            margin-bottom: 5px;
            letter-spacing: 1px;
        }

        .register-body input {
            border-radius: 10px;
            border: 1px solid #dee2e6;
        }

        .register-body input:focus {
            box-shadow: 0 0 0 0.25 mil rem rgba(25, 135, 84, 0.25);
            border-color: #198754;
        }

        .btn-register {
            border-radius: 10px;
            font-weight: 600;
            transition: 0.3s;
            padding: 12px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0,0,0,0.2);
            background-color: #157347;
        }
    </style>
</head>
<body>

<div class="register-card shadow-lg border-0 card">

    <div class="register-header">
        <h4>Registrasi Akun</h4>
        <small>Calon Siswa PSB SMK Jaya</small>
    </div>

    <div class="card-body p-4 register-body bg-white">
        
        @if ($errors->any())
            <div class="alert alert-danger border-0 shadow-sm mb-4" style="border-radius: 12px;">
                <ul class="mb-0 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/register">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold small text-muted">Nama Lengkap</label>
                <input type="text"
                       name="name"
                       class="form-control form-control-lg"
                       placeholder="Masukkan nama lengkap"
                       value="{{ old('name') }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold small text-muted">Email</label>
                <input type="email"
                       name="email"
                       class="form-control form-control-lg"
                       placeholder="nama@email.com"
                       value="{{ old('email') }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold small text-muted">Password</label>
                <input type="password"
                       name="password"
                       class="form-control form-control-lg"
                       placeholder="Minimal 6 karakter"
                       required>
            </div>

            <button type="submit" class="btn btn-success btn-lg w-100 btn-register mt-3">
                Daftar Sekarang
            </button>
        </form>
    </div>

    <div class="card-footer text-center bg-light py-3">
        <small class="text-muted">
            Sudah punya akun?
            <a href="/login" class="fw-semibold text-decoration-none text-success">
                Login di sini
            </a>
        </small>
    </div>

</div>

</body>
</html>