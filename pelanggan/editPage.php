<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP dan MySQLi</title>
</head>

<body>
    <br>
    <h2>CRUD DATA PELANGGAN</h2>
    <br>
    <a href="listPelanggan.php">KEMBALI</a>
    <br>
    <h3>EDIT DATA PELANGGAN</h3>
    <?php
    include 'db_connection.php';
    $id_pelanggan = $_GET['id_pelanggan'];
    $data = mysqli_query($connection, "select * from pelanggan where id_pelanggan = '$id_pelanggan'");
    while ($d = mysqli_fetch_array($data)) {
    ?>
        <form method="post" action='update.php'>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>
                        <input type="hidden" name="id_pelanggan" value="<?php echo $d['id_pelanggan'] ?>">
                        <input type="text" name="nama_pelanggan" value="<?php echo $d['nama_pelanggan'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>alamat</td>
                    <td>
                        <input type="text" name="alamat" value="<?php echo $d['alamat'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>telepon</td>
                    <td>
                        <input type="text" name="telepon" value="<?php echo $d['telepon'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>email</td>
                    <td>
                        <input type="text" name="email" value="<?php echo $d['email'] ?>">
                    </td>
                </tr>
                <tr>
                    <td> <input type="submit" value="SIMPAN"></td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>

</body>

</html>