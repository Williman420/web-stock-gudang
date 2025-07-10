<?php
include "db_connection.php";
$id_supplier = $_GET["id_supplier"];
mysqli_query($connection, "DELETE FROM supplier WHERE id_supplier = '$id_supplier'");
header("location:supplier_view.php");
