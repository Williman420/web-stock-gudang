<?php 
include "db_connection.php";

$id_produk = $_POST["id_produk"];
$id_lokasi = $_POST["id_lokasi"];
$jumlah_stok = $_POST["jumlah_stok"];

mysqli_query($connection, "INSERT INTO stok_saat_ini (id_produk, id_lokasi, jumlah_stok) 
                           VALUES ($id_produk, $id_lokasi, $jumlah_stok)");

header("location:listStokSaatIni.php");