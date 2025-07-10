<?php

include "db_connection.php";
$nama_supplier = $_POST["nama_supplier"];
$alamat = $_POST["alamat"];
$telepon = $_POST["telepon"];
$email = $_POST["email"];
$kontak_person = $_POST["kontak_person"];
mysqli_query($connection, "INSERT INTO `supplier`(`id_supplier`, `nama_supplier`, `alamat`, `telepon`, `email`, `kontak_person`) VALUES ('','$nama_supplier','$alamat','$telepon','$email','$kontak_person')");
header("location:supplier_view.php");
