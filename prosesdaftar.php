<?php
   require_once("database.php");
   // Ambil data dri form 
   $email                   = $_POST['email'];
   $pass                    = $_POST['password'];
   $fName                   = $_POST['first_name'];
   $lName                   = $_POST['last_name'];
   $birthday                = $_POST['birthday'];
   $jk                      = $_POST['gender'];
   $phone                   = $_POST['phone'];
   $lokasi                   = $_POST['alamat'];
   // END ambil data dri form
   $sql                     = "SELECT * FROM user WHERE email = '$email'";
   $query                   = $connection->query($sql);
   if($query->num_rows != 0) {
     echo "<div align       = 'center'>Username Sudah Terdaftar! <a href='prosesdaftar.php'>Back</a></div>";
   } else {
     if(!$username || !$pass) {
       echo "<div align     = 'center'>Masih ada data yang kosong! <a href='register.html'>Back</a>";
     } else {
       $data                = "INSERT INTO user (user_id, fname, lname, birth, email, pass, jenis_kelamin, phone, lokasi, tipe) VALUES ('', '$fName', '$lName', '$birthday','$email', '$pass', '$jk', '$phone','$lokasi','pengguna')";
       $simpan              = $connection->query($data);
       if($simpan) {
         echo "<div align   = 'center'>Pendaftaran Sukses, Silahkan <a href='index.html'>Login</a></div>";
       } else {
         echo "<div align   = 'center'>Proses Gagal!</div>";
       }
     }
   }
?>