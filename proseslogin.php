<?php
   session_start();
   require_once("database.php");
   $username = $_POST['email'];
	$password = $_POST['pass'];
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($connection,"select * from user where email='$username' and pass='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['tipe']=="organisasi"){
 
		// buat session login dan username
		$_SESSION['email'] = $username;
		$_SESSION['tipe'] = "organisasi";
		// alihkan ke halaman dashboard admin
		header("location:halaman_organisasi.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['tipe']=="pengguna"){
		// buat session login dan username
		$_SESSION['email'] = $username;
		$_SESSION['tipe'] = "pengguna";
		// alihkan ke halaman dashboard pegawai
		header("location:halaman_pengguna.php");
 	
}else{
	header("location:index.php?pesan=gagal");
	echo "Wrong Username / Password";
}}
 
?>