<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Stok Keluar</title>
</head>
<body>
    <h2>CRUD DATA STOK KELUAR</h2>
    <br>
    <h3>Tambah Data Stok Keluar</h3>
    <form action="createStokKeluar.php" method="post">
        <table>
            <tr>
                <td>Tanggal Keluar</td>
                <td><input type="datetime-local" name="tanggal_keluar" required></td>
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
                <td>Jumlah Keluar</td>
                <td><input type="number" name="jumlah_keluar" required></td>
            </tr>
            <tr>
                <td>Pelanggan</td>
                <td>
                    <select name="id_pelanggan">
                        <option value="">Pilih Pelanggan</option>
                        <?php
                        $pelanggan = mysqli_query($connection, "SELECT * FROM pelanggan");
                        while ($p = mysqli_fetch_array($pelanggan)) {
                            echo "<option value='{$p['id_pelanggan']}'>{$p['nama_pelanggan']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tipe Keluar</td>
                <td>
                    <select name="tipe_keluar" required>
                        <option value="Penjualan">Penjualan</option>
                        <option value="Transfer">Transfer</option>
                        <option value="Rusak">Rusak</option>
                        <option value="Lain-lain">Lain-lain</option>
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