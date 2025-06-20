<?php
$connection = mysqli_connect("localhost", "root", "", "db_gudang");

if (mysqli_connect_errno()) {
    echo "DB connection error: " . mysqli_connect_error();
}