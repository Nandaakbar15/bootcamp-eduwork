<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:Login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout Berhasil</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../../css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <?php include('./components/nav.php');?>
        <div class="row">
            <h1>Terima kasih, pesanan Anda telah diproses!</h1>
            <a href="IndexCustomer.php">Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
