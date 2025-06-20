<?php 

include "db_connection.php";
$nama_supplier = $_POST["nama"];
$alamat = $_POST["alamat"];
$telepon = $_POST["telepon"];
$email = $_POST["email"];
mysqli_query($connection, "insert into pelanggan values('$id_pelanggan', '$nama_pelanggan', '$alamat', '$telepon', '$email')");
header("location:listPelanggan.php");