<?php 

include("connection.php");

$namaProduk = $_POST['nama_produk'];
$hargaProduk = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$stok = $_POST['stok'];
$kategori = $_POST['kategori'];

$sql = "INSERT INTO products (nama_produk, harga, deskripsi, stok, kategori) VALUES ('$namaProduk', '$hargaProduk', '$deskripsi', '$stok', '$kategori')";

$queryInsert = mysqli_query($connect, $sql);


if($queryInsert) {
    echo "<script>
        alert('Successfully add new data!');
        document.location.href = 'index.php';
    </script>";
} else {
    echo "<script>
        alert('Failed add new data!');
    </script>";
}

?>