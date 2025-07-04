<?php
include "db_connection.php";
$id_pelanggan = $_GET["id_pelanggan"];
mysqli_query($connection, "delete from pelanggan where id_pelanggan = '$id_pelanggan'");
header("location:pelanggan_view.php");
