<?php

include 'db_connection.php';
$id_stok_keluar = $_GET['id_stok_keluar'];
$data = mysqli_query($connection, "SELECT * FROM stok_keluar WHERE id_stok_keluar = '$id_stok_keluar'");
$d = mysqli_fetch_array($data);

$produk = mysqli_query($connection, "SELECT * FROM produk");
$lokasi = mysqli_query($connection, "SELECT * FROM lokasi_gudang");
$pelanggan = mysqli_query($connection, "SELECT * FROM pelanggan");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Stok Keluar</title>
</head>
<body>
    <h2>Edit Stok Keluar</h2>
    <form action="updateStokKeluar.php" method="post">
        <input type="hidden" name="id_stok_keluar" value="<?= $d['id_stok_keluar'] ?>">
        <table>
            <tr>
                <td>Tanggal Keluar</td>
                <td><input type="datetime-local" name="tanggal_keluar" value="<?= date('Y-m-d\TH:i', strtotime($d['tanggal_keluar'])) ?>" required></td>
            </tr>
            <tr>
                <td>Produk</td>
                <td>
                    <select name="id_produk" required>
                        <?php while($p = mysqli_fetch_array($produk)): 
                            $selected = ($p['id_produk'] == $d['id_produk']) ? 'selected' : '';
                        ?>
                            <option value="<?= $p['id_produk'] ?>" <?= $selected ?>><?= $p['nama_produk'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td>
                    <select name="id_lokasi" required>
                        <?php while($l = mysqli_fetch_array($lokasi)): 
                            $selected = ($l['id_lokasi'] == $d['id_lokasi']) ? 'selected' : '';
                        ?>
                            <option value="<?= $l['id_lokasi'] ?>" <?= $selected ?>><?= $l['nama_lokasi'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jumlah Keluar</td>
                <td><input type="number" name="jumlah_keluar" value="<?= $d['jumlah_keluar'] ?>" required></td>
            </tr>
            <tr>
                <td>Pelanggan</td>
                <td>
                    <select name="id_pelanggan">
                        <option value="">Pilih Pelanggan</option>
                        <?php while($c = mysqli_fetch_array($pelanggan)): 
                            $selected = ($c['id_pelanggan'] == $d['id_pelanggan']) ? 'selected' : '';
                        ?>
                            <option value="<?= $c['id_pelanggan'] ?>" <?= $selected ?>><?= $c['nama_pelanggan'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tipe Keluar</td>
                <td>
                    <select name="tipe_keluar" required>
                        <option value="Penjualan" <?= ($d['tipe_keluar'] == 'Penjualan') ? 'selected' : '' ?>>Penjualan</option>
                        <option value="Transfer" <?= ($d['tipe_keluar'] == 'Transfer') ? 'selected' : '' ?>>Transfer</option>
                        <option value="Rusak" <?= ($d['tipe_keluar'] == 'Rusak') ? 'selected' : '' ?>>Rusak</option>
                        <option value="Lain-lain" <?= ($d['tipe_keluar'] == 'Lain-lain') ? 'selected' : '' ?>>Lain-lain</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nomor Referensi</td>
                <td><input type="text" name="nomor_referensi" value="<?= $d['nomor_referensi'] ?>"></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><textarea name="keterangan"><?= $d['keterangan'] ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>