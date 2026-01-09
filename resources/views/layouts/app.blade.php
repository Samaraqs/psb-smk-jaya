<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | PSB SMK Jaya</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
        }

        body {
            background-color: #f4f6f9;
            display: flex;
            flex-direction: column;
        }

        /* TOPBAR */
        .topbar {
            background: linear-gradient(135deg, #0d6efd, #0b5ed7);
            padding: 14px 0;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        }

        .app-title {
            font-weight: 700;
            font-size: 20px;
            color: #ffffff;
            letter-spacing: 0.5px;
        }

        .content-wrapper {
            flex: 1;
        }

        footer {
            background: #ffffff;
            border-top: 1px solid #e5e7eb;
        }
    </style>
</head>
<body>

<!-- NAVBAR / TOPBAR -->
<div class="topbar">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="app-title">
            PSB SMK Jaya
        </div>

        <!-- LOGOUT -->
        <form action="/logout" method="POST" class="m-0">
            @csrf
            <button class="btn btn-danger btn-sm fw-semibold">
                Logout
            </button>
        </form>
    </div>
</div>

<!-- CONTENT -->
<div class="content-wrapper">
    <div class="container my-4">
        @yield('content')
    </div>
</div>

<!-- FOOTER -->
<footer class="text-center text-muted py-3">
    © 2026 PSB SMK Jaya
</footer>

</body>
</html>
