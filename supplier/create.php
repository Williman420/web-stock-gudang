<?php

include "db_connection.php";
$nama_supplier = $_POST["nama"];
$alamat = $_POST["alamat"];
$telepon = $_POST["telepon"];
$email = $_POST["email"];
$kontak_person = $_POST["kontak_person"];
mysqli_query($connection, "insert into supplier values('', '$nama_supplier', '$alamat', '$telepon', '$email', '$kontak_person')");
header("location:supplierView.php");
