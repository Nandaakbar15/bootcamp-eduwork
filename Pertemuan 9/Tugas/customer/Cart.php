<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:Login.php");
    exit;
}

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../../css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <?php include("./components/nav.php");?>
        <div class="row">
            <h1>Keranjang belanja</h1>
            <?php if (empty($cart)): ?>
            <p>Keranjang masih kosong.</p>
            <?php else: ?>
                <table border="1" cellpadding="10">
                    <tr>
                        <th>Gambar Produk</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Hapus</th>
                    </tr>
                    <?php
                    $grand_total = 0;
                    foreach ($cart as $id => $item):
                        $total = $item['harga'] * $item['qty'];
                        $grand_total += $total;
                    ?>
                    <tr>
                        <td><img src="../../images/<?= $item['gambar'];?>" alt="..." width="90"></td>
                        <td><?= $item['nama_produk']; ?></td>
                        <td>Rp <?= number_format($item['harga'], 0, ',', '.'); ?></td>
                        <td><?= $item['qty']; ?></td>
                        <td>Rp <?= number_format($total, 0, ',', '.'); ?></td>
                        <td><a href="remove_from_cart.php?id=<?= $id;?>" class="btn btn-danger" onclick="return confirm('Yakin mau hapus data ini?')">Hapus</a></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3"><strong>Total Keseluruhan</strong></td>
                        <td>Rp <?= number_format($grand_total, 0, ',', '.'); ?></td>
                        <td><a href="checkout.php" class="btn btn-success">Checkout</a></td>
                    </tr>
                </table>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>