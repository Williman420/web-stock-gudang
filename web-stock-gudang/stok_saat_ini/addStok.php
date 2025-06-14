<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Stok</title>
</head>
<body>
    <h2>CRUD DATA STOK SAAT INI</h2>
    <br>
    <h3>Tambah Data Stok</h3>
    <form action="createStokSaatIni.php" method="post">
        <table>
            <tr>
                <td>Produk</td>
                <td>
                    <select name="id_produk" required>
                        <?php
                        include 'db_connection.php';
                        $produk = mysqli_query($connection, "SELECT * FROM produk");
                        while ($p = mysqli_fetch_array($produk)) {
                            echo "<option value='{$p['id_produk']}'>{$p['nama_produk']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td>
                    <select name="id_lokasi" required>
                        <?php
                        $lokasi = mysqli_query($connection, "SELECT * FROM lokasi_gudang");
                        while ($l = mysqli_fetch_array($lokasi)) {
                            echo "<option value='{$l['id_lokasi']}'>{$l['nama_lokasi']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jumlah Stok</td>
                <td><input type="number" name="jumlah_stok" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>