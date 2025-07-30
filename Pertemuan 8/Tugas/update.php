<?php 

include('connection.php');

$id = $_POST['id'];

$namaProduk = $_POST['nama_produk'];
$hargaProduk = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$stok = $_POST['stok'];
$kategori = $_POST['kategori'];

$sql = "UPDATE products SET nama_produk='$namaProduk', harga='$hargaProduk', deskripsi='$deskripsi', stok='$stok', kategori='$kategori' WHERE id ='$id'";

$queryUpdate = mysqli_query($connect, $sql);

if($queryUpdate) {
    echo "<script>
            alert('Successfully update the data!');
            document.location.href = 'index.php';
        </script>";
} else {
    echo "<script>
            alert('Failed to update the data!');
        </script>";
}

?>