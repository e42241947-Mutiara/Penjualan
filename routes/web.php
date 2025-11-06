<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    session_start();
    $isLogin = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    return view('beranda', compact('isLogin'));
})->name('beranda');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    session_start();
    $username = $request->input('username');
    $password = $request->input('password');

    if ($username === 'admin' && $password === '12345') {
        $_SESSION['logged_in'] = true;
        return redirect()->route('beranda');
    } else {
        return back()->with('error', 'Username atau Password salah!');
    }
})->name('login.process');

Route::get('/produk', function () {
    session_start();
    $isLogin = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

    $produk = [
        ['id'=>1,'merk'=>'diadora','nama'=>'Diadora Nakumi Women Running Shoes - White','harga'=>'Rp 399.000','foto'=>'images/Sdiadora.webp','deskripsi'=>'Ringan dan nyaman untuk aktivitas olahraga.'],
        ['id'=>2,'merk'=>'skechers','nama'=>'Skechers Summits Women Sneakers - Natural','harga'=>'Rp 699.000','foto'=>'images/Sskechers.webp','deskripsi'=>'Slip-On dengan Memory Foam.'],
        ['id'=>3,'merk'=>'converse','nama'=>'Converse Chuck Taylor All Star Ox - Optical White','harga'=>'Rp 859.000','foto'=>'images/Sconverse.webp','deskripsi'=>'Klasik dengan insole OrthoLite.'],
        ['id'=>4,'merk'=>'skechers','nama'=>'Skechers Bountiful Women Sneakers - White','harga'=>'489.000','foto'=>'images/Sskechers2.webp','deskripsi'=>'Dilengkapi bahan kain rajut mesh yang lembut dan sintetis yang mulus di bagian atas sepatu sneaker training sporty atletik dengan tali. Ditambah sentuhan akhir aksen jahitan dan insole Memory Foam.'],
    ];

    $judul = "Daftar Semua Produk";
    return view('produk', compact('produk', 'isLogin', 'judul'));
})->name('produk');

Route::get('/produk/kategori/{merk}', function ($merk) {
    session_start();
    $isLogin = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

    if (!$isLogin) return redirect()->route('login');

    $semuaProduk = [
        ['id'=>1,'merk'=>'diadora','nama'=>'Diadora Nakumi Women Running Shoes - White','harga'=>'Rp 399.000','foto'=>'images/Sdiadora.webp','deskripsi'=>'Ringan dan nyaman untuk aktivitas olahraga.'],
        ['id'=>2,'merk'=>'skechers','nama'=>'Skechers Summits Women Sneakers - Natural','harga'=>'Rp 699.000','foto'=>'images/Sskechers.webp','deskripsi'=>'Slip-On dengan Memory Foam.'],
        ['id'=>3,'merk'=>'converse','nama'=>'Converse Chuck Taylor All Star Ox - Optical White','harga'=>'Rp 859.000','foto'=>'images/Sconverse.webp','deskripsi'=>'Klasik dengan insole OrthoLite.'],
        ['id'=>4,'merk'=>'skechers','nama'=>'Skechers Bountiful Women Sneakers - White','harga'=>'489.000','foto'=>'images/Sskechers2.webp','deskripsi'=>'Dilengkapi bahan kain rajut mesh yang lembut dan sintetis yang mulus di bagian atas sepatu sneaker training sporty atletik dengan tali. Ditambah sentuhan akhir aksen jahitan dan insole Memory Foam.'],
    ];

    $produk = array_values(array_filter($semuaProduk, fn($p) => strtolower($p['merk']) === strtolower($merk)));
    $judul = "Produk " . ucfirst($merk);

    return view('produk', compact('produk', 'isLogin', 'judul'));
})->name('produk.kategori');

Route::get('/produk/{id}', function ($id) {
    session_start();
    $isLogin = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

    $produk = [
        1 => ['nama'=>'Diadora Nakumi Women Running Shoes - White','harga'=>'Rp 399.000','foto'=>'images/Sdiadora.webp','deskripsi'=>'Ringan dan nyaman untuk aktivitas olahraga.'],
        2 => ['nama'=>'Skechers Summits Women Sneakers - Natural','harga'=>'Rp 699.000','foto'=>'images/Sskechers.webp','deskripsi'=>'Slip-On dengan Memory Foam.'],
        3 => ['nama'=>'Converse Chuck Taylor All Star Ox - Optical White','harga'=>'Rp 859.000','foto'=>'images/Sconverse.webp','deskripsi'=>'Klasik dengan insole OrthoLite.'],
        4 => ['nama'=>'Skechers Bountiful Women Sneakers - White','harga'=>'489.000','foto'=>'images/Sskechers2.webp','deskripsi'=>'Dilengkapi bahan kain rajut mesh yang lembut dan sintetis yang mulus di bagian atas sepatu sneaker training sporty atletik dengan tali. Ditambah sentuhan akhir aksen jahitan dan insole Memory Foam.'],
    ];

    if (!$isLogin) return redirect()->route('login');
    if (!array_key_exists($id, $produk)) abort(404, 'Produk tidak ditemukan');

    $detail = $produk[$id];
    return view('detail', compact('detail', 'id'));
})->name('produk.detail');

Route::get('/logout', function () {
    session_start();
    session_destroy();
    return redirect()->route('beranda');
})->name('logout');

Route::get('/konfirmasi/{id}', function ($id) {
    session_start();
    $isLogin = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    if (!$isLogin) return redirect()->route('login');

    $produkList = [
        1 => ['nama'=>'Diadora Nakumi Women Running Shoes - White','harga'=>'Rp 399.000','foto'=>'images/Sdiadora.webp'],
        2 => ['nama'=>'Skechers Summits Women Sneakers - Natural','harga'=>'Rp 699.000','foto'=>'images/Sskechers.webp'],
        3 => ['nama'=>'Converse Chuck Taylor All Star Ox - Optical White','harga'=>'Rp 859.000','foto'=>'images/Sconverse.webp'],
        4 => ['nama'=>'Skechers Bountiful Women Sneakers - White','harga'=>'Rp 489.000','foto'=>'images/Sskechers2.webp'],
    ];

    if (!array_key_exists($id, $produkList)) abort(404, 'Produk tidak ditemukan');
    $produk = $produkList[$id];

    return view('konfirmasi', compact('produk'));
})->name('konfirmasi');

Route::post('/pembelian-selesai', function (Request $request) {
    return redirect()->route('produk')->with('success', 'Pembelian berhasil dikonfirmasi!');
})->name('pembelian.selesai');

Route::post('/pembelian/selesai', function (Request $request) {
    // setelah konfirmasi, tampilkan popup
    return redirect()->route('pembelian.berhasil');
})->name('pembelian.selesai');

Route::get('/pembelian/berhasil', function () {
    session_start();
    $isLogin = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    return view('pembelian', compact('isLogin'));
})->name('pembelian.berhasil');