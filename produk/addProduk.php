<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<body>
    <h2>CRUD DATA PRODUK</h2>
    <br>
    <h3>Tambah Data Produk</h3>
    <form action="createProduk.php" method="post">
        <table>
            <tr>
                <td>Kode Produk</td>
                <td><input type="text" name="kode_produk" required></td>
            </tr>
            <tr>
                <td>Nama Produk</td>
                <td><input type="text" name="nama_produk" required></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><textarea name="deskripsi"></textarea></td>
            </tr>
            <tr>
                <td>Satuan</td>
                <td><input type="text" name="satuan" required></td>
            </tr>
            <tr>
                <td>Harga Beli</td>
                <td><input type="number" step="0.01" name="harga_beli" required></td>
            </tr>
            <tr>
                <td>Harga Jual</td>
                <td><input type="number" step="0.01" name="harga_jual" required></td>
            </tr>
            <tr>
                <td>Stok Minimal</td>
                <td><input type="number" name="stok_minimal"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>