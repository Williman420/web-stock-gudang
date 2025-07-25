<?php 
include "db_connection.php";

$kode_produk = $_POST["kode_produk"];
$nama_produk = $_POST["nama_produk"];
$deskripsi = $_POST["deskripsi"];
$satuan = $_POST["satuan"];
$harga_beli = $_POST["harga_beli"];
$harga_jual = $_POST["harga_jual"];
$stok_minimal = $_POST["stok_minimal"];


$gambar_produk = null;
if ($_FILES['gambar_produk']['error'] === UPLOAD_ERR_OK) {
    $file_name = $_FILES['gambar_produk']['name'];
    $file_tmp = $_FILES['gambar_produk']['tmp_name'];
    
    
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
    if (in_array($file_extension, $allowed_extensions)) {
       
        $new_file_name = uniqid('img_', true) . '.' . $file_extension;
        $upload_dir = 'assets/images/produk/';
        
        
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $target_path = $upload_dir . $new_file_name;
        
       
        if (move_uploaded_file($file_tmp, $target_path)) {
            $gambar_produk = $target_path;
        }
    }
}

$sql = "INSERT INTO produk (kode_produk, nama_produk, deskripsi, satuan, harga_beli, harga_jual, stok_minimal, gambar_produk) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, "ssssddds", 
    $kode_produk, 
    $nama_produk, 
    $deskripsi, 
    $satuan, 
    $harga_beli, 
    $harga_jual, 
    $stok_minimal, 
    $gambar_produk
);

mysqli_stmt_execute($stmt);
header("location:listProduk.php");