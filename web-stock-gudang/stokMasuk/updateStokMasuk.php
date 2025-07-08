<?php

include 'db_connection.php';

$id_stok_masuk = $_POST['id_stok_masuk'];
$tanggal_masuk = $_POST['tanggal_masuk'];
$id_produk = $_POST['id_produk'];
$id_lokasi = $_POST['id_lokasi'];
$jumlah_masuk = $_POST['jumlah_masuk'];
$id_supplier = $_POST['id_supplier'];
$nomor_referensi = $_POST['nomor_referensi'];
$keterangan = $_POST['keterangan'];


$supplier_value = $id_supplier ? "'$id_supplier'" : "NULL";

mysqli_query($connection, "UPDATE stok_masuk SET 
tanggal_masuk = '$tanggal_masuk', 
id_produk = $id_produk, 
id_lokasi = $id_lokasi, 
jumlah_masuk = $jumlah_masuk, 
id_supplier = $supplier_value, 
nomor_referensi = '$nomor_referensi', 
keterangan = '$keterangan' 
WHERE id_stok_masuk = $id_stok_masuk");

header("location: listStokMasuk.php");
?>