<?php

include 'db_connection.php';
$id_stok = $_GET['id_stok'];
$data = mysqli_query($connection, "SELECT * FROM stok_saat_ini WHERE id_stok = '$id_stok'");
$d = mysqli_fetch_array($data);

$produk = mysqli_query($connection, "SELECT * FROM produk");
$lokasi = mysqli_query($connection, "SELECT * FROM lokasi_gudang");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Stok</title>
</head>
<body>
    <h2>Edit Stok</h2>
    <form action="updateStok.php" method="post">
        <input type="hidden" name="id_stok" value="<?= $d['id_stok'] ?>">
        <table>
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
                <td>Jumlah Stok</td>
                <td><input type="number" name="jumlah_stok" value="<?= $d['jumlah_stok'] ?>" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>