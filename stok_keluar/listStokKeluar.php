<?php

include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Stok Keluar</title>
</head>
<body>
    <a href="addStokKeluar.php">Tambah Stok Keluar</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Produk</th>
            <th>Lokasi</th>
            <th>Jumlah</th>
            <th>Pelanggan</th>
            <th>Tipe</th>
            <th>Referensi</th>
            <th>Aksi</th>
        </tr>
        <?php
        $sql = "SELECT sk.id_stok_keluar, sk.tanggal_keluar, p.nama_produk, l.nama_lokasi, sk.jumlah_keluar, c.nama_pelanggan, sk.tipe_keluar, sk.nomor_referensi 
                FROM stok_keluar sk
                JOIN produk p ON sk.id_produk = p.id_produk
                JOIN lokasi_gudang l ON sk.id_lokasi = l.id_lokasi
                LEFT JOIN pelanggan c ON sk.id_pelanggan = c.id_pelanggan";
        $data = mysqli_query($connection, $sql);
        while($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
            <td><?= $d['id_stok_keluar'] ?></td>
            <td><?= $d['tanggal_keluar'] ?></td>
            <td><?= $d['nama_produk'] ?></td>
            <td><?= $d['nama_lokasi'] ?></td>
            <td><?= $d['jumlah_keluar'] ?></td>
            <td><?= $d['nama_pelanggan'] ?></td>
            <td><?= $d['tipe_keluar'] ?></td>
            <td><?= $d['nomor_referensi'] ?></td>
            <td>
                <a href="editStokKeluar.php?id_stok_keluar=<?= $d['id_stok_keluar'] ?>">Edit</a>
                <a href="deleteStokKeluar.php?id_stok_keluar=<?= $d['id_stok_keluar'] ?>">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>