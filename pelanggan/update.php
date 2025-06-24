<?php
include "db_connection.php";
$id_pelanggan = $_POST['id_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$email = $_POST['email'];
$kontak_person = $_POST['kontak_person'];

mysqli_query($connection, "update pelanggan set nama_pelanggan = '$nama_pelanggan', 
alamat ='$alamat', telepon = '$telepon', email ='$email' where id_pelanggan = '$id_pelanggan'");

header("location:listPelanggan.php");
