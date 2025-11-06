<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | Sistem Penjualan</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
:root { --primary: #4A70A9; }
body {
    background: rgba(0,0,0,0.5);
    display: flex; justify-content: center; align-items: center;
    height: 100vh;
}
.login-popup {
    display: flex;
    width: 700px;
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(0,0,0,0.3);
    animation: fadeIn .6s ease;
}
.login-left {
    background-color: var(--primary);
    flex: 1;
    display: flex; justify-content: center; align-items: center;
}
.login-left img { width: 80%; }
.login-right { flex: 1.2; padding: 40px; }
.btn-primary { background-color: var(--primary); border: none; }
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
</head>
<body>
<div class="login-popup">
    <div class="login-left">
        <img src="https://cdn-icons-png.flaticon.com/512/5087/5087579.png" alt="Login Icon">
    </div>
    <div class="login-right">
        <h3 class="fw-bold mb-3 text-primary">Login ke Sistem</h3>
        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action="{{ route('login.process') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        <div class="mt-3 d-grid">
            <a href="{{ route('beranda') }}" class="btn btn-outline-secondary">Kembali</a>
        </div>
        <!-- <div class="text-center mt-2">
            <small>Gunakan <b>admin</b> / <b>12345</b></small>
        </div> -->
    </div>
</div>
</body>
</html>
