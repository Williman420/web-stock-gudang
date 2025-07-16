
<?php
include 'db_connection.php';

$id_pelanggan = $_POST['id_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$email = $_POST['email'];

$query = "UPDATE pelanggan SET 
    nama_pelanggan = '$nama_pelanggan', 
    alamat = '$alamat', 
    telepon = '$telepon', 
    email = '$email' 
    WHERE id_pelanggan = '$id_pelanggan'";

if (mysqli_query($connection, $query)) {
    header("Location: pelanggan_view.php?update=success");
} else {
    echo "Error updating record: " . mysqli_error($connection);
}
