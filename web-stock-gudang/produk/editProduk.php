<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>
    <h2>CRUD DATA PRODUK</h2>
    <br>
    <a href="listProduk.php">KEMBALI</a>
    <br>
    <h3>EDIT DATA PRODUK</h3>
    <?php
    include 'db_connection.php';
    $id_produk = $_GET['id_produk'];
    $data = mysqli_query($connection, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
    while ($d = mysqli_fetch_array($data)) {
    ?>
        <form method="post" action='updateProduk.php'>
            <table>
                <tr>
                    <td>Kode Produk</td>
                    <td>
                        <input type="hidden" name="id_produk" value="<?php echo $d['id_produk'] ?>">
                        <input type="text" name="kode_produk" value="<?php echo $d['kode_produk'] ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Nama Produk</td>
                    <td><input type="text" name="nama_produk" value="<?php echo $d['nama_produk'] ?>" required></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><textarea name="deskripsi"><?php echo $d['deskripsi'] ?></textarea></td>
                </tr>
                <tr>
                    <td>Satuan</td>
                    <td><input type="text" name="satuan" value="<?php echo $d['satuan'] ?>" required></td>
                </tr>
                <tr>
                    <td>Harga Beli</td>
                    <td><input type="number" step="0.01" name="harga_beli" value="<?php echo $d['harga_beli'] ?>" required></td>
                </tr>
                <tr>
                    <td>Harga Jual</td>
                    <td><input type="number" step="0.01" name="harga_jual" value="<?php echo $d['harga_jual'] ?>" required></td>
                </tr>
                <tr>
                    <td>Stok Minimal</td>
                    <td><input type="number" name="stok_minimal" value="<?php echo $d['stok_minimal'] ?>"></td>
                </tr>
                <tr>
                    <td> <input type="submit" value="SIMPAN"></td>
                </tr>
            </table>
        </form>
    <?php } ?>
</body>
</html>