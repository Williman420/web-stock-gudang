<?php
// File: editLokasi.php
include 'db_connection.php';
$id_lokasi = $_GET['id_lokasi'];
$data = mysqli_query($connection, "SELECT * FROM lokasi_gudang WHERE id_lokasi = '$id_lokasi'");
$d = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Lokasi</title>
</head>
<body>
    <h2>Edit Lokasi</h2>
    <form action="updateLokasi.php" method="post">
        <input type="hidden" name="id_lokasi" value="<?= $d['id_lokasi'] ?>">
        <table>
            <tr>
                <td>Kode Lokasi</td>
                <td><input type="text" name="kode_lokasi" value="<?= $d['kode_lokasi'] ?>" required></td>
            </tr>
            <tr>
                <td>Nama Lokasi</td>
                <td><input type="text" name="nama_lokasi" value="<?= $d['nama_lokasi'] ?>" required></td>
            </tr>
            <tr>
                <td>Kapasitas</td>
                <td><input type="number" name="kapasitas" value="<?= $d['kapasitas'] ?>"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><textarea name="deskripsi"><?= $d['deskripsi'] ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>