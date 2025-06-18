<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$alamat = $_POST['alamat'];

// menginput data ke database
mysqli_query($koneksi,"insert into mahasiswa values('','$nama','$nim','$alamat')");

// mengalihkan halaman kembali ke listmahasiswa.php
header("location:listmahasiswa.php");
?>