<?php

include 'db_connection.php';

$id_stok_keluar = $_POST['id_stok_keluar'];
$tanggal_keluar = $_POST['tanggal_keluar'];
$id_produk = $_POST['id_produk'];
$id_lokasi = $_POST['id_lokasi'];
$jumlah_keluar = $_POST['jumlah_keluar'];
$id_pelanggan = $_POST['id_pelanggan'];
$tipe_keluar = $_POST['tipe_keluar'];
$nomor_referensi = $_POST['nomor_referensi'];
$keterangan = $_POST['keterangan'];


$pelanggan_value = $id_pelanggan ? "'$id_pelanggan'" : "NULL";

mysqli_query($connection, "UPDATE stok_keluar SET 
tanggal_keluar = '$tanggal_keluar', 
id_produk = $id_produk, 
id_lokasi = $id_lokasi, 
jumlah_keluar = $jumlah_keluar, 
id_pelanggan = $pelanggan_value, 
tipe_keluar = '$tipe_keluar', 
nomor_referensi = '$nomor_referensi', 
keterangan = '$keterangan' 
WHERE id_stok_keluar = $id_stok_keluar");

header("location: listStokKeluar.php");
?>