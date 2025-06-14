<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP dan MySQLi</title>
</head>

<body>
    <br>
    <h2>CRUD DATA SUPPLIER</h2>
    <br>
    <a href="supplierView.php">KEMBALI</a>
    <br>
    <h3>EDIT DATA SUPPLIER</h3>
    <?php
    include 'db_connection.php';
    $id_supplier = $_GET['id_supplier'];
    $data = mysqli_query($connection, "select * from supplier where id_supplier = '$id_supplier'");
    while ($d = mysqli_fetch_array($data)) {
    ?>
        <form method="post" action='update.php'>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>
                        <input type="hidden" name="id_supplier" value="<?php echo $d['id_supplier'] ?>">
                        <input type="text" name="nama_supplier" value="<?php echo $d['nama_supplier'] ?>">
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
                    <td>kontak person</td>
                    <td>
                        <input type="text" name="kontak_person" value="<?php echo $d['kontak_person'] ?>">
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