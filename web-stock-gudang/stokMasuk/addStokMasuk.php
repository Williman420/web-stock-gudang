<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Stok Masuk</title>
</head>
<body>
    <h2>CRUD DATA STOK MASUK</h2>
    <br>
    <h3>Tambah Data Stok Masuk</h3>
    <form action="createStokMasuk.php" method="post">
        <table>
            <tr>
                <td>Tanggal Masuk</td>
                <td><input type="datetime-local" name="tanggal_masuk" required></td>
            </tr>
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
                <td>Jumlah Masuk</td>
                <td><input type="number" name="jumlah_masuk" required></td>
            </tr>
            <tr>
                <td>Supplier</td>
                <td>
                    <select name="id_supplier">
                        <option value="">Pilih Supplier</option>
                        <?php
                        $supplier = mysqli_query($connection, "SELECT * FROM supplier");
                        while ($s = mysqli_fetch_array($supplier)) {
                            echo "<option value='{$s['id_supplier']}'>{$s['nama_supplier']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nomor Referensi</td>
                <td><input type="text" name="nomor_referensi"></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><textarea name="keterangan"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>