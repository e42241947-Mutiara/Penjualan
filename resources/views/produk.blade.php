<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Produk | Sistem Penjualan</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
:root { --primary: #4A70A9; }
.navbar { background-color: var(--primary) !important; }
.card-product {
    border-radius: 20px;
    overflow: hidden;
    transition: transform .3s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
    min-height: 400px;
}
.card-product img {
    height: 200px;
    object-fit: contain;
    background-color: #fff;
    padding: 10px;
}
.card-body {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.card-product:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 18px rgba(0,0,0,0.2);
}
.btn-primary { background-color: var(--primary); border:none; }
</style>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('beranda') }}">Stasiun Sepatu</a>
        <div class="d-flex">
            <a href="{{ route('logout') }}" class="btn btn-outline-light" onclick="return confirm('Apakah anda yakin ingin logout?')">
                Logout
            </a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <!-- Bagian judul + tombol kembali -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold mb-0">{{ $judul }}</h2>
        <a href="{{ route('beranda') }}" class="btn btn-secondary">Kembali ke Beranda</a>
    </div>

    <!-- Daftar produk -->
    <div class="row justify-content-center">
        @forelse($produk as $item)
        <div class="col-md-3 col-8 mb-4 d-flex">
            <div class="card card-product shadow-sm w-100">
                <img src="{{ asset($item['foto']) }}" class="card-img-top">
                <div class="card-body text-center">
                    <h5>{{ $item['nama'] }}</h5>
                    <p class="text-muted">{{ $item['harga'] }}</p>
                    <a href="{{ route('produk.detail', $item['id']) }}" class="btn btn-primary w-100">Detail Produk</a>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center">Tidak ada produk ditemukan.</p>
        @endforelse
    </div>
</div>
</body>
</html>
