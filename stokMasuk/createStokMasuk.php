<?php 
include "db_connection.php";

$tanggal_masuk = $_POST["tanggal_masuk"];
$id_produk = $_POST["id_produk"];
$id_lokasi = $_POST["id_lokasi"];
$jumlah_masuk = $_POST["jumlah_masuk"];
$id_supplier = $_POST["id_supplier"];
$nomor_referensi = $_POST["nomor_referensi"];
$keterangan = $_POST["keterangan"];

mysqli_query($connection, "INSERT INTO stok_masuk (tanggal_masuk, id_produk, id_lokasi, jumlah_masuk, id_supplier, nomor_referensi, keterangan) 
                           VALUES ('$tanggal_masuk', $id_produk, $id_lokasi, $jumlah_masuk, $id_supplier, '$nomor_referensi', '$keterangan')");

header("location:listStokMasuk.php");