<?php
session_start();

if (!isset($_GET['id'])) {
    header("Location: Cart.php");
    exit;
}

$id = intval($_GET['id']);

// Hapus produk dari cart
if (isset($_SESSION['cart'][$id])) {
    unset($_SESSION['cart'][$id]);
}

// Redirect kembali ke cart
header("Location: Cart.php");
exit;
