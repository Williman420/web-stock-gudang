<?php
include "db_connection.php";
$id_produk = $_GET["id_produk"];
mysqli_query($connection, "DELETE FROM produk WHERE id_produk = $id_produk");
header("location:listProduk.php");