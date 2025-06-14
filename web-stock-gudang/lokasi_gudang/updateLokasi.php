<?php
// File: updateLokasi.php
include 'db_connection.php';

$id_lokasi = $_POST['id_lokasi'];
$kode_lokasi = $_POST['kode_lokasi'];
$nama_lokasi = $_POST['nama_lokasi'];
$kapasitas = $_POST['kapasitas'];
$deskripsi = $_POST['deskripsi'];

mysqli_query($connection, "UPDATE lokasi_gudang SET 
kode_lokasi = '$kode_lokasi', 
nama_lokasi = '$nama_lokasi', 
kapasitas = $kapasitas, 
deskripsi = '$deskripsi' 
WHERE id_lokasi = $id_lokasi");

header("location: listLokasi.php");
?>