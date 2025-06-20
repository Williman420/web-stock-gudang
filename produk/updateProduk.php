<?php
include "db_connection.php";
$id_produk = $_POST['id_produk'];
$kode_produk = $_POST['kode_produk'];
$nama_produk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$satuan = $_POST['satuan'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$stok_minimal = $_POST['stok_minimal'];

mysqli_query($connection, "UPDATE produk SET 
                          kode_produk = '$kode_produk', 
                          nama_produk = '$nama_produk', 
                          deskripsi = '$deskripsi', 
                          satuan = '$satuan', 
                          harga_beli = $harga_beli, 
                          harga_jual = $harga_jual, 
                          stok_minimal = $stok_minimal 
                          WHERE id_produk = $id_produk");

header("location:listProduk.php");