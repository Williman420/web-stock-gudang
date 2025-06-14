<?php 
include "db_connection.php";

$kode_produk = $_POST["kode_produk"];
$nama_produk = $_POST["nama_produk"];
$deskripsi = $_POST["deskripsi"];
$satuan = $_POST["satuan"];
$harga_beli = $_POST["harga_beli"];
$harga_jual = $_POST["harga_jual"];
$stok_minimal = $_POST["stok_minimal"];

mysqli_query($connection, "INSERT INTO produk (kode_produk, nama_produk, deskripsi, satuan, harga_beli, harga_jual, stok_minimal) 
                           VALUES ('$kode_produk', '$nama_produk', '$deskripsi', '$satuan', $harga_beli, $harga_jual, $stok_minimal)");

header("location:listProduk.php");