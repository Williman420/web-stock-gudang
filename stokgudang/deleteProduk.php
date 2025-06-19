<?php
include "db_connection.php";
$id_produk = $_GET["id_produk"];
$result = mysqli_query($connection, "SELECT gambar FROM produk WHERE id_produk = $id_produk");
$row = mysqli_fetch_assoc($result);
$gambar_produk = $row['gambar'];
mysqli_query($connection, "DELETE FROM produk WHERE id_produk = $id_produk");
if (!empty($gambar_path) && file_exists($gambar_path)) {
    unlink($gambar_path);
}
header("location:listProduk.php");
$id = $_GET['id_produk'] ?? null;

