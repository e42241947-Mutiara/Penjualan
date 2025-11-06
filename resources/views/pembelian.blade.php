<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pembelian Berhasil</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
:root { --primary: #4A70A9; }
body {
    background: rgba(0,0,0,0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.popup-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.3);
    padding: 40px;
    max-width: 400px;
    text-align: center;
    animation: fadeIn .5s ease;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}
.btn-primary {
    background-color: var(--primary);
    border: none;
}
</style>
</head>
<body>
    <div class="popup-card">
        <img src="https://cdn-icons-png.flaticon.com/512/845/845646.png" alt="Success" width="100" class="mb-3">
        <h3 class="text-success fw-bold">Pembelian Berhasil!</h3>
        <p class="text-muted mb-4">Terima kasih telah melakukan pembelian di <b>Stasiun Sepatu</b>.</p>
        <a href="{{ route('produk') }}" class="btn btn-primary w-100">Oke</a>
    </div>
</body>
</html>
