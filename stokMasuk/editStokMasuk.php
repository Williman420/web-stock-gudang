<?php
// File: editStokMasuk.php
include 'db_connection.php';
$id_stok_masuk = $_GET['id_stok_masuk'];
$data = mysqli_query($connection, "SELECT * FROM stok_masuk WHERE id_stok_masuk = '$id_stok_masuk'");
$d = mysqli_fetch_array($data);

$produk = mysqli_query($connection, "SELECT * FROM produk");
$lokasi = mysqli_query($connection, "SELECT * FROM lokasi_gudang");
$supplier = mysqli_query($connection, "SELECT * FROM supplier");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Stok Masuk</title>
</head>
<body>
    <h2>Edit Stok Masuk</h2>
    <form action="updateStokMasuk.php" method="post">
        <input type="hidden" name="id_stok_masuk" value="<?= $d['id_stok_masuk'] ?>">
        <table>
            <tr>
                <td>Tanggal Masuk</td>
                <td><input type="datetime-local" name="tanggal_masuk" value="<?= date('Y-m-d\TH:i', strtotime($d['tanggal_masuk'])) ?>" required></td>
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
                <td>Jumlah Masuk</td>
                <td><input type="number" name="jumlah_masuk" value="<?= $d['jumlah_masuk'] ?>" required></td>
            </tr>
            <tr>
                <td>Supplier</td>
                <td>
                    <select name="id_supplier">
                        <option value="">Pilih Supplier</option>
                        <?php while($s = mysqli_fetch_array($supplier)): 
                            $selected = ($s['id_supplier'] == $d['id_supplier']) ? 'selected' : '';
                        ?>
                            <option value="<?= $s['id_supplier'] ?>" <?= $selected ?>><?= $s['nama_supplier'] ?></option>
                        <?php endwhile; ?>
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