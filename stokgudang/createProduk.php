<?php 
include "db_connection.php";

$kode_produk = $_POST["kode_produk"];
$nama_produk = $_POST["nama_produk"];
$deskripsi = $_POST["deskripsi"];
$satuan = $_POST["satuan"];
$harga_beli = $_POST["harga_beli"];
$harga_jual = $_POST["harga_jual"];
$stok_minimal = $_POST["stok_minimal"];
$gambar_produk= $_POST["gambar_produk"];

$gambar_produk = '';
if ($_FILES['gambar_produk']['error'] == UPLOAD_ERR_OK) {
    $target_dir = "assets/images/produk/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true); // Buat folder jika belum ada
    }
    
    $file_extension = pathinfo($_FILES['gambar_produk']['name'], PATHINFO_EXTENSION);
    $new_filename = uniqid() . '.' . $file_extension; // Generate unique filename
    $target_file = $target_dir . $new_filename;
    
    // Validasi file
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    $max_size = 2 * 1024 * 1024; // 2MB
    
    if (in_array(strtolower($file_extension), $allowed_extensions)) {
        if ($_FILES['gambar_produk']['size'] <= $max_size) {
            if (move_uploaded_file($_FILES['gambar_produk']['tmp_name'], $target_file)) {
                $gambar_path = $target_file;
            } else {
                die("Gagal mengupload gambar");
            }
        } else {
            die("Ukuran file terlalu besar (maks 2MB)");
        }
    } else {
        die("Format file tidak didukung (hanya JPG, PNG, GIF)");
    }
}
mysqli_query($connection, "INSERT INTO produk (kode_produk, nama_produk, deskripsi, satuan, harga_beli, harga_jual, stok_minimal) 
                           VALUES ('$kode_produk', '$nama_produk', '$deskripsi', '$satuan', $harga_beli, $harga_jual, $stok_minimal, '$gambar_produk')");

header("location:listProduk.php");