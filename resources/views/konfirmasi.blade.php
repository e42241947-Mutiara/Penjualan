<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Konfirmasi Pembelian</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
:root { --primary: #4A70A9; }
.navbar { background-color: var(--primary) !important; }
.btn-primary { background-color: var(--primary); border: none; }
.card {
    border-radius: 20px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('produk') }}">Stasiun Sepatu</a>
        <div class="d-flex">
            <a href="{{ route('logout') }}" class="btn btn-outline-light">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-5 mb-5">
    <div class="card p-4 mx-auto" style="max-width: 600px;">
        <h3 class="text-center text-primary fw-bold mb-4">Konfirmasi Pembelian</h3>
        
        <div class="mb-3 text-center">
            <img src="{{ asset($produk['foto']) }}" alt="{{ $produk['nama'] }}" class="img-fluid rounded shadow-sm" style="max-height: 200px;">
        </div>
        <h5 class="text-center">{{ $produk['nama'] }}</h5>
        <p class="text-center text-success fw-bold mb-4">{{ $produk['harga'] }}</p>

        <form method="POST" action="{{ route('pembelian.selesai') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama Anda" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Alamat Pengiriman</label>
                <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Metode Pembayaran</label>
                <select name="pembayaran" class="form-select" required>
                    <option value="">Pilih metode</option>
                    <option value="transfer">Transfer Bank</option>
                    <option value="cod">COD (Bayar di Tempat)</option>
                    <option value="ewallet">E-Wallet (Dana, OVO, Gopay)</option>
                </select>
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary">Konfirmasi dan Bayar</button>
                <a href="{{ route('produk') }}" class="btn btn-outline-secondary mt-2">Batal</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
