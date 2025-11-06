<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Beranda | Sistem Penjualan</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    :root { --primary: #4A70A9; }
    body { background-color: #f7f9fc; }
    .navbar { background-color: var(--primary) !important; }

    .welcome-card {
        max-width: 900px;
        margin: 50px auto 30px;
        background: white;
        border-radius: 20px;
        padding: 40px 30px;
        box-shadow: 0 6px 16px rgba(0,0,0,0.1);
    }
    .category-card {
        border-radius: 20px;
        overflow: hidden;
        transition: transform .3s ease, box-shadow .3s ease;
        padding: 15px;
        background: white;
        height: 250px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .category-card img {
        width: 100px;
        height: 100px;
        object-fit: contain;
        margin-top: 10px;
    }
    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 14px rgba(0,0,0,0.2);
    }
</style>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('beranda') }}">Stasiun Sepatu</a>
        <div class="d-flex">
            @if(!$isLogin)
                <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
            @else
                <a href="{{ route('logout') }}" class="btn btn-outline-light" onclick="return confirm('Apakah anda yakin ingin logout?')">
                    Logout
                </a>
            @endif
        </div>
    </div>
</nav>

<!-- WELCOME CARD -->
<div class="welcome-card text-center">
    <h1 class="fw-bold text-primary">Selamat Datang di Stasiun Sepatu</h1>
    <p class="lead mb-4">Temukan berbagai macam brand sepatu di toko kami</p>
    
    <div class="d-grid">
        @if($isLogin)
            <a href="{{ route('produk') }}" class="btn btn-primary btn-lg" style="background-color: var(--primary); border:none;">
                Lihat Semua Produk
            </a>
        @else
            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg">
                Login untuk Lihat Produk
            </a>
        @endif
    </div>
</div>

<!-- KATEGORI -->
<div class="container" style="max-width: 900px;">
    <div class="row justify-content-center">
        @php
            $kategori = [
                ['nama'=>'Diadora','foto'=>'images/diadora.jpg'],
                ['nama'=>'Skechers','foto'=>'images/skechers.jpg'],
                ['nama'=>'Converse','foto'=>'images/converse.jpg']
            ];
        @endphp
        @foreach($kategori as $item)
        <div class="col-md-4 col-10 mb-4">
            <div class="card category-card shadow-sm text-center">
                <img src="{{ $item['foto'] }}" class="mx-auto d-block" alt="{{ $item['nama'] }}">
                <div class="card-body">
                    <h5 class="fw-semibold">{{ $item['nama'] }}</h5>
                    @if($isLogin)
                        <a href="{{ route('produk.kategori', ['merk' => strtolower($item['nama'])]) }}" class="btn btn-primary w-100" style="background-color: var(--primary); border:none;">Lihat Produk</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary w-100">Login untuk Lihat</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</body>
</html>
