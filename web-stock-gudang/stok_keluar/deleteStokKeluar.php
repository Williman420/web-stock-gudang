<?php

include 'db_connection.php';
$id_stok_keluar = $_GET['id_stok_keluar'];
mysqli_query($connection, "DELETE FROM stok_keluar WHERE id_stok_keluar = $id_stok_keluar");
header("location: listStokKeluar.php");
?>