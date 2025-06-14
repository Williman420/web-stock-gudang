<?php

include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Lokasi</title>
</head>
<body>
    <a href="addLokasi.php">Tambah Lokasi</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Kode</th>
            <th>Nama Lokasi</th>
            <th>Kapasitas</th>
            <th>Aksi</th>
        </tr>
        <?php
        $data = mysqli_query($connection, "SELECT * FROM lokasi_gudang");
        while($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
            <td><?= $d['id_lokasi'] ?></td>
            <td><?= $d['kode_lokasi'] ?></td>
            <td><?= $d['nama_lokasi'] ?></td>
            <td><?= $d['kapasitas'] ?></td>
            <td>
                <a href="editLokasi.php?id_lokasi=<?= $d['id_lokasi'] ?>">Edit</a>
                <a href="deleteLokasi.php?id_lokasi=<?= $d['id_lokasi'] ?>">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>