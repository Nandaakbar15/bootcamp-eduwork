<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'connection.php';
 
// menangkap data yang dikirim dari form
$email = $_POST['email'];
$password = md5($_POST['password']);

$queryLogin = "SELECT * FROM users WHERE email='$email' and password='$password'";

$login = mysqli_query($connect, $queryLogin);
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah email dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['role']=="admin"){

		// buat session login dan email
		$_SESSION['email'] = $email;
		$_SESSION['status'] = "login";
		$_SESSION['role'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/IndexAdmin.php");

	// cek jika user login sebagai user
	}else if($data['role']=="customer"){
		// buat session login dan email
		$_SESSION['email'] = $email;
		$_SESSION['status'] = "login";
		$_SESSION['role'] = "customer";
		$_SESSION['username'] = $data['username'];
		$_SESSION['user_id'] = $data['id'];
		// alihkan ke halaman dashboard customer
		header("location:customer/IndexCustomer.php");
	}else{

		// alihkan ke halaman login kembali
		header("location:Login.php");
	}	
}else{
	header("location:Login.php");
}
?>