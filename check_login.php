<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'connection.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"select * from login_akun where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['peran']=="Manager"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['peran'] = "Manager";
		// alihkan ke halaman dashboard admin
		header("location:admin_profile.php");

	}else if($data['peran']=="Guru"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['peran'] = "Guru";
		// alihkan ke halaman dashboard pegawai
		header("location:admin_profile.php?x=admin_profile");

	}else if($data['peran']=="Peserta Didik"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['peran'] = "Peserta Didik";
		// alihkan ke halaman dashboard pegawai
		header("location:user_profile.php?x=user_profile");
	
	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal&&user=$username&&pass=$password");
	}	
}else{
	header("location:Login.php?pesan=gagal&&user=$username&&pass=$password");
}
 
?>