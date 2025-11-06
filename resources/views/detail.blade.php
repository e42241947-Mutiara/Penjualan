<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Produk</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
:root { --primary: #4A70A9; }
.navbar { background-color: var(--primary) !important; }
.btn-primary { background-color: var(--primary); border: none; }
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('produk') }}">Stasiun Sepatu</a>
        <div class="d-flex">
            <a href="{{ route('logout') }}" class="btn btn-outline-light" onclick="return confirm('Apakah anda yakin ingin logout?')">
                Logout
            </a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col-md-5 mb-3">
            <img src="{{ asset($detail['foto']) }}" alt="{{ $detail['nama'] }}" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-7">
            <h2 class="fw-bold">{{ $detail['nama'] }}</h2>
            <h4 class="text-success mb-3">{{ $detail['harga'] }}</h4>
            <p>{{ $detail['deskripsi'] }}</p>
            <div class="mt-4">
                <a href="{{ route('konfirmasi', ['id' => $id]) }}" class="btn btn-primary me-2">
                    Konfirmasi Pembelian
                </a>
                <a href="{{ route('produk') }}" class="btn btn-outline-secondary">Kembali ke Produk</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>