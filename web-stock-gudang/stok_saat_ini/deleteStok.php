<?php

include 'db_connection.php';
$id_stok = $_GET['id_stok'];
mysqli_query($connection, "DELETE FROM stok_saat_ini WHERE id_stok = $id_stok");
header("location: listStok.php");
?>