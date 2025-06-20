<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lokasi</title>
</head>
<body>
    <h2>CRUD DATA LOKASI GUDANG</h2>
    <br>
    <h3>Tambah Data Lokasi</h3>
    <form action="createLokasi.php" method="post">
        <table>
            <tr>
                <td>Kode Lokasi</td>
                <td><input type="text" name="kode_lokasi" required></td>
            </tr>
            <tr>
                <td>Nama Lokasi</td>
                <td><input type="text" name="nama_lokasi" required></td>
            </tr>
            <tr>
                <td>Kapasitas</td>
                <td><input type="number" name="kapasitas"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><textarea name="deskripsi"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>