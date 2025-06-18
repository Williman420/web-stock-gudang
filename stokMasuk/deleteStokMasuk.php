<?php

include 'db_connection.php';
$id_stok_masuk = $_GET['id_stok_masuk'];
mysqli_query($connection, "DELETE FROM stok_masuk WHERE id_stok_masuk = $id_stok_masuk");
header("location: listStokMasuk.php");
?>