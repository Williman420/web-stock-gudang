<?php
$koneksi = mysqli_connect("localhost", "root", "", "akademik2");

// Check connection
if (mysqli_connect_error()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>