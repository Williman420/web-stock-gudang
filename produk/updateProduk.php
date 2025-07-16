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
$gambar_sql = '';
$gambar_produk = null;


if ($_FILES['gambar_produk']['error'] === UPLOAD_ERR_OK) {
    $file_name = $_FILES['gambar_produk']['name'];
    $file_tmp = $_FILES['gambar_produk']['tmp_name'];


    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if (in_array($file_extension, $allowed_extensions)) {

        $new_file_name = uniqid('img_', true) . '.' . $file_extension;
        $upload_dir = '../produk/assets/images/produk/';


        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $target_path = $upload_dir . $new_file_name;


        if (move_uploaded_file($file_tmp, $target_path)) {
            $gambar_produk = $target_path;
        }
    }

    if ($gambar_produk !== null) {
        $gambar_sql = ", gambar_produk = '$gambar_produk'";
    }
}

if (mysqli_query($connection, "UPDATE produk SET 
          kode_produk = '$kode_produk', 
          nama_produk = '$nama_produk', 
          deskripsi = '$deskripsi', 
          satuan = '$satuan', 
          harga_beli = $harga_beli, 
          harga_jual = $harga_jual, 
          stok_minimal = $stok_minimal
          $gambar_sql
          WHERE id_produk = $id_produk")) {
    header("Location: produk_view.php");
} else {
    echo "Error updating record: " . mysqli_error($connection);
}
