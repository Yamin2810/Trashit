<?php

include("database.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){
	
    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jns    = $_POST['jenis_pickup'];
    $alamat = $_POST['alamat'];
	$berat = $_POST['berat'];
	$status = $_POST['stat'];
	
	// buat query update
	$sql = "UPDATE user_order SET nama='$nama', jenis_order='$jns', alamat='$alamat', berat='$berat', stat='$status' WHERE order_id=$id";
	$query = mysqli_query($connection, $sql);
	
	// apakah query update berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman list-siswa.php
		header('Location: pickup_acc.php');
	} else {
		// kalau gagal tampilkan pesan
		die("Gagal menyimpan perubahan...");
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
