<?php

include 'db_connection.php';

$id_stok = $_POST['id_stok'];
$id_produk = $_POST['id_produk'];
$id_lokasi = $_POST['id_lokasi'];
$jumlah_stok = $_POST['jumlah_stok'];

mysqli_query($connection, "UPDATE stok_saat_ini SET 
id_produk = $id_produk, 
id_lokasi = $id_lokasi, 
jumlah_stok = $jumlah_stok 
WHERE id_stok = $id_stok");

header("location: listStok.php");
?>