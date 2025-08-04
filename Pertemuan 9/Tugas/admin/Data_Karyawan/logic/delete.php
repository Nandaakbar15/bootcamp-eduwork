<?php 

include("../../../connection.php");

$id = $_GET['id'];

$sql = "DELETE FROM employee WHERE id = '$id'";

$queryDelete = mysqli_query($connect, $sql);

if($queryDelete) {
    echo "<script>
            alert('Sukses menghapus data!');
            document.location.href = '../IndexDataKaryawan.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menghapus data!');
          </script>";
}

?>