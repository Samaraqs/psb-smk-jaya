<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login | PSB SMK Jaya</title>

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    min-height:100vh;
    background:
        linear-gradient(rgba(15,23,42,.65), rgba(15,23,42,.65)),
        url("{{ asset('images/smk.webp') }}") center/cover no-repeat;
    display:flex;
    align-items:center;
    justify-content:center;
    font-family:'Plus Jakarta Sans',sans-serif;
}

/* LOGIN CARD */
.login-card{
    width:100%;
    max-width:420px;
    border-radius:22px;
    backdrop-filter:blur(14px);
    background:rgba(255,255,255,.85);
    overflow:hidden;
}

/* HEADER */
.login-header{
    text-align:center;
    padding:26px 20px;
    background:linear-gradient(135deg,#4f46e5,#6366f1);
    color:#fff;
}
.login-header h4{
    font-weight:700;
    margin-bottom:4px;
}
.login-header small{
    opacity:.9;
}

/* BODY */
.login-body{
    padding:30px;
}
.form-label{
    font-weight:600;
}
.form-control{
    border-radius:12px;
    padding:12px 14px;
}

/* BUTTON */
.btn-login{
    background:#4f46e5;
    border:none;
    border-radius:12px;
    font-weight:600;
    padding:12px;
    transition:.3s;
}
.btn-login:hover{
    background:#4338ca;
    transform:translateY(-2px);
    box-shadow:0 10px 25px rgba(0,0,0,.25);
}

/* FOOTER */
.login-footer{
    text-align:center;
    padding:16px;
    background:#f8fafc;
}
.login-footer a{
    color:#4f46e5;
    font-weight:600;
    text-decoration:none;
}
</style>
</head>

<body>

<div class="login-card shadow-lg">

    <!-- HEADER -->
    <div class="login-header">
        <h4>Login PSB</h4>
        <small>SMK Jaya Excellence</small>
    </div>

    <!-- BODY -->
    <div class="login-body">
        <form method="POST" action="/login">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email"
                       name="email"
                       class="form-control form-control-lg"
                       placeholder="email@contoh.com"
                       required>
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password"
                       name="password"
                       class="form-control form-control-lg"
                       placeholder="••••••••"
                       required>
            </div>

            <button type="submit" class="btn btn-login btn-lg w-100">
                Masuk
            </button>
        </form>
    </div>

    <!-- FOOTER -->
    <div class="login-footer">
        <small>
            Belum punya akun?
            <a href="/register">Daftar Sekarang</a>
        </small>
    </div>

</div>

</body>
</html>
