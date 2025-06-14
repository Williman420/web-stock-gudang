<!DOCTYPE html>
<html lang="en">

<head>
    <title> CRUD PHP to MYSQL</title>
</head>

<body>
    <a href="addPelanggan.php">Tambah Pelanggan</a>
    <br>
    <table border="1" cellPadding='2'>
        <tr>
            <th>id_pelanggan</th>
            <th>Nama</th>
            <th>alamat</th>
            <th>telepon</th>
            <th>email</th>
            
        </tr>
        <?php
        include 'db_connection.php';
        $no = 1;
        $data = mysqli_query($connection, "select * from pelanggan");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $d['id_pelanggan'] ?></td>
                <td><?php echo $d['nama_pelanggan'] ?></td>
                <td><?php echo $d['alamat'] ?></td>
                <td><?php echo $d['telepon'] ?></td>
                <td><?php echo $d['email'] ?></td>
                <td>
                    <a href="editPage.php?id_pelanggan=<?php echo $d['id_pelanggan']; ?>">Edit</a>
                    <a href="delete.php?id_pelanggan=<?php echo $d['id_pelanggan']; ?>">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>