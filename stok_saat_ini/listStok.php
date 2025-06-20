<?php

include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Stok</title>
</head>
<body>
    <a href="addStok.php">Tambah Stok</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Produk</th>
            <th>Lokasi</th>
            <th>Jumlah Stok</th>
            <th>Aksi</th>
        </tr>
        <?php
        $sql = "SELECT s.id_stok, p.nama_produk, l.nama_lokasi, s.jumlah_stok 
                FROM stok_saat_ini s
                JOIN produk p ON s.id_produk = p.id_produk
                JOIN lokasi_gudang l ON s.id_lokasi = l.id_lokasi";
        $data = mysqli_query($connection, $sql);
        while($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
            <td><?= $d['id_stok'] ?></td>
            <td><?= $d['nama_produk'] ?></td>
            <td><?= $d['nama_lokasi'] ?></td>
            <td><?= $d['jumlah_stok'] ?></td>
            <td>
                <a href="editStok.php?id_stok=<?= $d['id_stok'] ?>">Edit</a>
                <a href="deleteStok.php?id_stok=<?= $d['id_stok'] ?>">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>