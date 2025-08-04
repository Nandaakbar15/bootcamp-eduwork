<?php 
include("../../../connection.php");

$id = $_POST['id'];
$gambarLama = $_POST['gambarLama'];

$namaProduk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$stok = $_POST['stok'];
$kategori = $_POST['kategori'];

$filename = $_FILES["Gambar"]["name"];
$error = $_FILES["Gambar"]["error"];
$tmp_name = $_FILES["Gambar"]["tmp_name"];

// jika ganti gambar
if ($filename != '') {
    $ekstensigambar2 = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    // menampung data format file yang diizinkan
    $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];

    // validasi format file
    if (!in_array($ekstensigambar2, $ekstensigambarvalid)) {
        echo '<script>alert("Format file tidak diizinkan")</script>';
        exit;
    } else {
        // hapus gambar lama
        if (file_exists('../../../images/'.$gambarLama)) {
            unlink('../../../images/'.$gambarLama);
        }
        // buat nama file baru
        $namaFileBaru = time().'.'.$ekstensigambar2;
        move_uploaded_file($tmp_name, '../../../images/'.$namaFileBaru);
        $namagambar = $namaFileBaru;
    }
} else {
    // jika tidak ganti gambar
    $namagambar = $gambarLama;
}

// membuat query update
$queryUpdate = "UPDATE products 
                SET nama_produk = '$namaProduk', 
                    harga = '$harga', 
                    deskripsi = '$deskripsi', 
                    stok = '$stok',
                    kategori = '$kategori', 
                    Gambar = '$namagambar' 
                WHERE id = '$id'";

$result = mysqli_query($connect, $queryUpdate);

if ($result) {
    echo "<script>
            alert('Berhasil mengubah data!');
            document.location.href = '../IndexDataProduk.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal mengubah data!');
          </script>";
}
?>
