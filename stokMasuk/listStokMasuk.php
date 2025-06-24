<?php
// File: listStokMasuk.php
include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Stok Masuk</title>
</head>
<body>
    <a href="addStokMasuk.php">Tambah Stok Masuk</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Produk</th>
            <th>Lokasi</th>
            <th>Jumlah</th>
            <th>Supplier</th>
            <th>Referensi</th>
            <th>Aksi</th>
        </tr>
        <?php
        $sql = "SELECT sm.id_stok_masuk, sm.tanggal_masuk, p.nama_produk, l.nama_lokasi, sm.jumlah_masuk, s.nama_supplier, sm.nomor_referensi 
                FROM stok_masuk sm
                JOIN produk p ON sm.id_produk = p.id_produk
                JOIN lokasi_gudang l ON sm.id_lokasi = l.id_lokasi
                LEFT JOIN supplier s ON sm.id_supplier = s.id_supplier";
        $data = mysqli_query($connection, $sql);
        while($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
            <td><?= $d['id_stok_masuk'] ?></td>
            <td><?= $d['tanggal_masuk'] ?></td>
            <td><?= $d['nama_produk'] ?></td>
            <td><?= $d['nama_lokasi'] ?></td>
            <td><?= $d['jumlah_masuk'] ?></td>
            <td><?= $d['nama_supplier'] ?></td>
            <td><?= $d['nomor_referensi'] ?></td>
            <td>
                <a href="editStokMasuk.php?id_stok_masuk=<?= $d['id_stok_masuk'] ?>">Edit</a>
                <a href="deleteStokMasuk.php?id_stok_masuk=<?= $d['id_stok_masuk'] ?>">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>