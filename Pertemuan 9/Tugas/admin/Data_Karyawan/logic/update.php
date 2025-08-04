<?php 

include("../../../connection.php");

$id = $_POST['id'];

$namaKaryawan = $_POST['nama'];
$alamatKaryawan = $_POST['alamat'];
$nomorTelp = $_POST['noTelp'];
$umurKaryawan = $_POST['umur'];
$jabatanKaryawan = $_POST['jabatan'];

$sql = "UPDATE employee 
        SET nama = '$namaKaryawan', alamat = '$alamatKaryawan', noTelp = '$nomorTelp', umur = $umurKaryawan, jabatan = $jabatanKaryawan
        WHERE id = '$id'";

$queryUpdate = mysqli_query($connect, $sql);

if($queryUpdate) {
    echo "<script>
            alert('Berhasil mengubah data!');
            document.location.href = '../IndexDataKaryawan.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal mengubah data!');
          </script>";
}

?>