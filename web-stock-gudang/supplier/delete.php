<?php
include "db_connection.php";
$id_supplier = $_GET["id_supplier"];
mysqli_query($connection, "delete from supplier where id_supplier = '$id_supplier'");
header("location:supplierView.php");
