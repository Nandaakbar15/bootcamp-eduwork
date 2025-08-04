<?php 

include("../../../connection.php");

$namaProduk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$stok = $_POST['stok'];
$kategori = $_POST['kategori'];

$filename = $_FILES["Gambar"]["name"];
$error = $_FILES["Gambar"]["error"];
$tmp_name = $_FILES["Gambar"]["tmp_name"];

if($error === 4) {
    echo "<script>alert('Upload gambar terlebih dahulu!');</script>";
}

$ekstensigambar1 = explode('.', $filename);
$ekstensigambar2 = $ekstensigambar1[1];

$namaFileBaru = time().'.'.$ekstensigambar2;

$ekstensigambarValid = ['jpg','jpeg','png'];

if(!in_array($ekstensigambar2, $ekstensigambarValid)){
		echo "<script>alert('Format yang di upload salah!');</script>";
	} else {
		move_uploaded_file($tmp_name, '../../../images/'.$namaFileBaru);

        $sql = "INSERT INTO products (id, nama_produk, harga, stok, deskripsi, kategori, Gambar) 
                  VALUES ('','$namaProduk','$harga','$stok','$deskripsi','$kategori','$namaFileBaru')";

		$queryInsert = mysqli_query($connect, $sql);

		if($queryInsert){
			echo "<script>
				   alert('data berhasil ditambahkan!');
				   document.location.href = '../IndexDataProduk.php';	
			      </script>";
		} else {
			echo "<script>
				   alert('data gagal ditambahkan!');
			      </script>";
		}
	}
	

?>