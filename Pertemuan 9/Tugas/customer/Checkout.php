<?php
session_start();
include("../connection.php");

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:Login.php");
    exit;
}

if (empty($_SESSION['cart'])) {
    header("Location: Cart.php");
    exit;
}

$cart = $_SESSION['cart'];
$user_id = $_SESSION['user_id']; // Pastikan kamu punya ini di session

foreach ($cart as $product_id => $item) {
    $quantity = $item['qty'];
    $total = $item['harga'] * $quantity;

    // Simpan ke tabel orders
    mysqli_query($connect, "INSERT INTO orders (user_id, product_id, quantity, total) 
                            VALUES ($user_id, $product_id, $quantity, $total)");

    // Update stok di tabel products
    mysqli_query($connect, "UPDATE products SET stok = stok - $quantity WHERE id = $product_id");
}

// Kosongkan cart
unset($_SESSION['cart']);

// Redirect ke halaman sukses
header("Location: checkout_success.php");
exit;
