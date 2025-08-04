<?php
session_start();
include("../connection.php");

if (!isset($_GET['id'])) {
    header("Location: IndexCustomer.php");
    exit;
}

$id = intval($_GET['id']);

// Ambil data produk
$sql = "SELECT * FROM products WHERE id = $id";
$query = mysqli_query($connect, $sql);
$product = mysqli_fetch_assoc($query);

if (!$product) {
    header("Location: IndexCustomer.php");
    exit;
}

// Jika cart belum ada, buat array kosong
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Cek apakah produk sudah ada di cart
if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['qty']++;
} else {
    $_SESSION['cart'][$id] = [
        "nama_produk" => $product['nama_produk'],
        "harga" => $product['harga'],
        "qty" => 1,
        "gambar" => $product['Gambar']
    ];
}

// Simpan notifikasi
$_SESSION['success_message'] = "Produk berhasil ditambahkan ke keranjang!";

// Kembali ke halaman customer
header("Location: IndexCustomer.php");
exit;
