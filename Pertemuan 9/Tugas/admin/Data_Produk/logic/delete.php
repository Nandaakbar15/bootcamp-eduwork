<?php 

include("../../../connection.php");

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id = '$id'";

$queryDelete = mysqli_query($connect, $sql);

if($queryDelete) {
    echo "<script>
            alert('Berhasil menghapus data!');
            document.location.href = '../IndexDataProduk.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menghapus data!');
          </script>";
}

?>