<?php
// File: deleteLokasi.php
include 'db_connection.php';
$id_lokasi = $_GET['id_lokasi'];
mysqli_query($connection, "DELETE FROM lokasi_gudang WHERE id_lokasi = $id_lokasi");
header("location: listLokasi.php");
?>