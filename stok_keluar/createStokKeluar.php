<?php
include "db_connection.php";

// Get values from POST
$id_produk = $_POST["id_produk"];
$id_lokasi = $_POST["id_lokasi"];
$jumlah_keluar = $_POST["jumlah_keluar"];
$id_pelanggan = $_POST["id_pelanggan"];
$tipe_keluar = $_POST["tipe_keluar"];
$nomor_referensi = $_POST["nomor_referensi"];
$keterangan = $_POST["keterangan"];

// Insert into stok_keluar
mysqli_query($connection, "INSERT INTO stok_keluar 
    (id_produk, id_lokasi, jumlah_keluar, id_pelanggan, tipe_keluar, nomor_referensi, keterangan) 
    VALUES 
    ($id_produk, $id_lokasi, $jumlah_keluar, $id_pelanggan, '$tipe_keluar', '$nomor_referensi', '$keterangan')");

// Check current stock
$result = mysqli_query($connection, "SELECT * FROM stok_saat_ini WHERE id_produk = $id_produk AND id_lokasi = $id_lokasi");

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $id_stok = $row['id_stok'];
    $current_stok = (int) $row['jumlah_stok'];

    // Prevent stock going below 0
    if ($current_stok >= $jumlah_keluar) {
        $jumlah_baru = $current_stok - $jumlah_keluar;

        // Update stok_saat_ini
        mysqli_query($connection, "UPDATE stok_saat_ini 
                                   SET jumlah_stok = $jumlah_baru, 
                                       tanggal_terakhir_keluar = NOW(), 
                                       tanggal_diperbarui = NOW() 
                                   WHERE id_stok = $id_stok");

        // Redirect
        header("Location: stok_keluar_view.php");
        exit();
    } else {
        echo "Error: Stok tidak mencukupi untuk dikurangi.";
    }
} else {
    echo "Error: Data stok tidak ditemukan untuk produk dan lokasi tersebut.";
}
