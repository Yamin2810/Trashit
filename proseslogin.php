<?php
   session_start();
   require_once("database.php");
   $username = $_POST['email'];
	$password = $_POST['pass'];
 
// menyeleksi data user dengan username dan password yang sesuai
$login = "select * from user where email='$username' and pass='$password'";
// menghitung jumlah data yang ditemukan
$sq = mysqli_query($connection, $login);
$cek = mysqli_num_rows($sq);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($sq);
 
	// cek jika user login sebagai admin
	if($data['tipe']=="organisasi"){
		// buat session login dan username
		$_SESSION["user_fname"] = $data["fname"];
		$_SESSION["user_lname"] = $data["lname"];
		$_SESSION["user_birth"] = $data["birth"];
		$_SESSION["user_lokasi"] = $data["lokasi"];
		$_SESSION['email'] = $username;
		$_SESSION['pass'] = $password;
		$_SESSION["user_jnk"] = $data["jenis_kelamin"];
		$_SESSION["user_phone"] = $data["phone"];
		$_SESSION['tipe'] = "organisasi";
		// alihkan ke halaman dashboard admin
		header("location:halaman_organisasi.php");
 
	// cek jika user login sebagai pengguna
	}else if($data['tipe']=="pengguna"){
		// buat session login dan username
		$_SESSION["user_fname"] = $data["fname"];
		$_SESSION["user_lname"] = $data["lname"];
		$_SESSION["user_birth"] = $data["birth"];
		$_SESSION["user_lokasi"] = $data["lokasi"];
		$_SESSION['email'] = $username;
		$_SESSION['pass'] = $password;
		$_SESSION["user_jnk"] = $data["jenis_kelamin"];
		$_SESSION["user_phone"] = $data["phone"];
		$_SESSION['tipe'] = "pengguna";
		// alihkan ke halaman dashboard pengguna
		header("location:halaman_pengguna.php");

	}else if($data['tipe']=="admin"){
		// buat session login dan username
		$_SESSION["user_fname"] = $data["fname"];
		$_SESSION["user_lname"] = $data["lname"];
		$_SESSION["user_birth"] = $data["birth"];
		$_SESSION["user_lokasi"] = $data["lokasi"];
		$_SESSION['email'] = $username;
		$_SESSION['pass'] = $password;
		$_SESSION["user_jnk"] = $data["jenis_kelamin"];
		$_SESSION["user_phone"] = $data["phone"];
		$_SESSION['tipe'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:halaman_admin.php");
 	
}else{
	header("location:index.php?pesan=gagal");
	echo "Wrong Username / Password";
}}
 
?>