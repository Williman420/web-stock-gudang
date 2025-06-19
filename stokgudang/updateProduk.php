<?php
include "db_connection.php";
$id_produk = $_POST['id_produk'];
$kode_produk = $_POST['kode_produk'];
$nama_produk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$satuan = $_POST['satuan'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$stok_minimal = $_POST['stok_minimal'];
$gambar_produk = $_POST['gambar_produk'];

if ($_FILES['gambar_produk']['error'] == UPLOAD_ERR_OK) {
    $target_dir = "assets/images/produk/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $file_extension = pathinfo($_FILES['gambar_produk']['name'], PATHINFO_EXTENSION);
    $new_filename = uniqid() . '.' . $file_extension;
    $target_file = $target_dir . $new_filename;
    
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    $max_size = 2 * 1024 * 1024; // 2MB
    
    if (in_array(strtolower($file_extension), $allowed_extensions)) {
        if ($_FILES['gambar_produk']['size'] <= $max_size) {
            if (move_uploaded_file($_FILES['gambar_produk']['tmp_name'], $target_file)) {
                // Jika upload berhasil, hapus gambar lama jika ada
                if (!empty($gambar_lama) && file_exists($gambar_lama)) {
                    unlink($gambar_lama);
                }
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

mysqli_query($connection, "UPDATE produk SET 
                          kode_produk = '$kode_produk', 
                          nama_produk = '$nama_produk', 
                          deskripsi = '$deskripsi', 
                          satuan = '$satuan', 
                          harga_beli = $harga_beli, 
                          harga_jual = $harga_jual, 
                          stok_minimal = $stok_minimal,
                          gambar_produk = '$gambar_produk'
                          WHERE id_produk = $id_produk");

header("location:listProduk.php");