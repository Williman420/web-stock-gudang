<?php

include "db_connection.php";
$nama_pelanggan = $_POST["nama_pelanggan"];
$alamat = $_POST["alamat"];
$telepon = $_POST["telepon"];
$email = $_POST["email"];
mysqli_query($connection, "INSERT INTO pelanggan(id_pelanggan, nama_pelanggan, alamat, telepon, email) 
VALUES ('','$nama_pelanggan','$alamat','$telepon','$email')");
header("location:pelanggan_view.php");
