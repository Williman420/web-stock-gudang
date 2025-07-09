<?php
include "db_connection.php";
$id_produk = $_POST["id_produk"];
$id_lokasi = $_POST["id_lokasi"];
$jumlah_keluar = $_POST["jumlah_keluar"];
$id_pelanggan = $_POST["id_pelanggan"];
$tipe_keluar = $_POST["tipe_keluar"];
$nomor_referensi = $_POST["nomor_referensi"]; 
$keterangan = $_POST["keterangan"];

mysqli_query($connection, "INSERT INTO stok_keluar (id_produk, id_lokasi, jumlah_keluar, id_pelanggan, tipe_keluar, nomor_referensi, keterangan) 
                           VALUES ($id_produk, $id_lokasi, $jumlah_keluar, $id_pelanggan, '$tipe_keluar', '$nomor_referensi', '$keterangan')");


// Check if stock exists for this product at this location
$result = mysqli_query($connection, "SELECT * FROM stok_saat_ini WHERE id_produk = $id_produk AND id_lokasi = $id_lokasi");

if (mysqli_num_rows($result) > 0) {
    // Stock exists - update it
    $row = mysqli_fetch_assoc($result);
    $id_stok = $row['id_stok'];
    $jumlah_baru = $row['jumlah_stok'] - $jumlah_keluar;

    mysqli_query($connection, "UPDATE stok_saat_ini SET jumlah_stok = $jumlah_baru WHERE id_stok = $id_stok");
    echo "Stock updated successfully.";
} else {
    // Stock doesn't exist - create new entry
    mysqli_query($connection, "INSERT INTO stok_saat_ini (id_produk, id_lokasi, jumlah_stok) 
                              VALUES ($id_produk, $id_lokasi, $jumlah_keluar)");
    echo "Stock created successfully.";
}

header("location:stok_keluar_view.php");
