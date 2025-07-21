<?php
include "db_connection.php";

// Ambil dan sanitasi input
$id_produk        = (int) $_POST["id_produk"];
$id_lokasi        = (int) $_POST["id_lokasi"];
$jumlah_keluar    = (int) $_POST["jumlah_keluar"];
$id_pelanggan     = (int) $_POST["id_pelanggan"];
$tipe_keluar      = mysqli_real_escape_string($connection, $_POST["tipe_keluar"]);
$nomor_referensi  = mysqli_real_escape_string($connection, $_POST["nomor_referensi"]);
$keterangan       = mysqli_real_escape_string($connection, $_POST["keterangan"]);

// Cek stok dulu
$result = mysqli_query($connection, "SELECT * FROM stok_saat_ini WHERE id_produk = $id_produk AND id_lokasi = $id_lokasi");

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $id_stok = $row['id_stok'];
    $current_stok = (int) $row['jumlah_stok'];

    if ($current_stok >= $jumlah_keluar) {
        // Insert ke stok_keluar
        $insert = mysqli_query($connection, "INSERT INTO stok_keluar 
            (id_produk, id_lokasi, jumlah_keluar, id_pelanggan, tipe_keluar, nomor_referensi, keterangan) 
            VALUES 
            ($id_produk, $id_lokasi, $jumlah_keluar, $id_pelanggan, '$tipe_keluar', '$nomor_referensi', '$keterangan')");

        // Update stok
        $jumlah_baru = $current_stok - $jumlah_keluar;

        $update = mysqli_query($connection, "UPDATE stok_saat_ini 
            SET jumlah_stok = $jumlah_baru, 
                tanggal_terakhir_keluar = NOW(), 
                tanggal_diperbarui = NOW() 
            WHERE id_stok = $id_stok");

        header("Location: stok_keluar_view.php");
        exit();
    } else {
        echo "Error: Stok tidak mencukupi.";
    }
} else {
    echo "Error: Stok tidak ditemukan untuk produk dan lokasi tersebut.";
}
?>