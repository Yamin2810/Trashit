<?php

include("database.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){
	
	// ambil data dari formulir
	$nama = $_POST['nama'];
	$jns = $_POST['jenis_pickup'];
	$alamat = $_POST['alamat'];
	$berat = $_POST['berat'];
	
	// buat query
	$sql = "INSERT INTO user_order (order_id, nama, jenis_order, alamat, berat, stat) VALUE ('', '$nama', '$jns', '$alamat', '$berat', 'Tunggu')";
	$query = mysqli_query($connection, $sql);
	
	// apakah query simpan berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman pickup history dengan status=sukses
		header('Location: data.php');
	} else {
		// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
		header('Location: pickup.php?status=gagal');
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
