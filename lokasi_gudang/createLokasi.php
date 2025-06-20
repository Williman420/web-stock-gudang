<?php 
include "db_connection.php";

$kode_lokasi = $_POST["kode_lokasi"];
$nama_lokasi = $_POST["nama_lokasi"];
$kapasitas = $_POST["kapasitas"];
$deskripsi = $_POST["deskripsi"];

mysqli_query($connection, "INSERT INTO lokasi_gudang (kode_lokasi, nama_lokasi, kapasitas, deskripsi) 
                           VALUES ('$kode_lokasi', '$nama_lokasi', $kapasitas, '$deskripsi')");

header("location:listLokasi.php");