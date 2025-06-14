<?php
include "db_connection.php";
$id_supplier = $_POST['id_supplier'];
$nama_supplier = $_POST['nama_supplier'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$email = $_POST['email'];
$kontak_person = $_POST['kontak_person'];

mysqli_query($connection, "update supplier set nama_supplier = '$nama_supplier', 
alamat ='$alamat', telepon = '$telepon', email ='$email', kontak_person= '$kontak_person' where id_supplier = '$id_supplier'");

header("location:supplierView.php");
