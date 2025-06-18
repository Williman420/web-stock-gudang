<?php 
include "db_connection.php";

$tanggal_keluar = $_POST["tanggal_keluar"];
$id_produk = $_POST["id_produk"];
$id_lokasi = $_POST["id_lokasi"];
$jumlah_keluar = $_POST["jumlah_keluar"];
$id_pelanggan = $_POST["id_pelanggan"];
$tipe_keluar = $_POST["tipe_keluar"];
$nomor_referensi = $_POST["nomor_referensi"];
$keterangan = $_POST["keterangan"];

mysqli_query($connection, "INSERT INTO stok_keluar (tanggal_keluar, id_produk, id_lokasi, jumlah_keluar, id_pelanggan, tipe_keluar, nomor_referensi, keterangan) 
                           VALUES ('$tanggal_keluar', $id_produk, $id_lokasi, $jumlah_keluar, $id_pelanggan, '$tipe_keluar', '$nomor_referensi', '$keterangan')");

header("location:listStokKeluar.php");