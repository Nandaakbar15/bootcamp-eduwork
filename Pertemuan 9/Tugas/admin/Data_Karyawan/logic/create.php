<?php 

include("../../../connection.php");

$namaKaryawan = $_POST['nama'];
$alamatKaryawan = $_POST['alamat'];
$nomorTelp = $_POST['noTelp'];
$umurKaryawan = $_POST['umur'];
$jabatanKaryawan = $_POST['jabatan'];

$sql = "INSERT INTO employee (id, nama, alamat, noTelp, umur, jabatan) 
        VALUES ('', '$namaKaryawan', '$alamatKaryawan', '$nomorTelp', '$umurKaryawan', '$jabatanKaryawan')";

$queryInsert = mysqli_query($connect, $sql);

if($queryInsert) {
    echo "<script>
            alert('Berhasil menambahkan data!');
            document.location.href = '../IndexDataKaryawan.php';  
          </script>";
} else {
    echo "<script>
            alert('Gagal Menambahkan data!');
          </script>";
}

?>