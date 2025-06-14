<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Produk</title>
</head>
<body>
    <a href="addProduk.php">Tambah Produk</a>
    <br>
    <table border="1" cellPadding='2'>
        <tr>
            <th>ID</th>
            <th>Kode</th>
            <th>Nama Produk</th>
            <th>Satuan</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok Minimal</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'db_connection.php';
        $data = mysqli_query($connection, "SELECT * FROM produk");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $d['id_produk'] ?></td>
                <td><?php echo $d['kode_produk'] ?></td>
                <td><?php echo $d['nama_produk'] ?></td>
                <td><?php echo $d['satuan'] ?></td>
                <td><?php echo $d['harga_beli'] ?></td>
                <td><?php echo $d['harga_jual'] ?></td>
                <td><?php echo $d['stok_minimal'] ?></td>
                <td>
                    <a href="editProduk.php?id_produk=<?php echo $d['id_produk']; ?>">Edit</a>
                    <a href="deleteProduk.php?id_produk=<?php echo $d['id_produk']; ?>">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>