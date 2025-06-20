<!DOCTYPE html>
<html lang="en">

<head>
    <title> CRUD PHP to MYSQL</title>
</head>

<body>
    <a href="addSupplier.php">Tambah Supplier</a>
    <br>
    <table border="1" cellPadding='2'>
        <tr>
            <th class="px-1">id_supplier</th>
            <th class="px-1">Nama</th>   
            <th class="px-1">alamat</th>
            <th class="px-1">telepon</th>
            <th class="px-1">email</th>
            <th class="px-1">kontak person</th>
        </tr>
        <?php
        include 'db_connection.php';
        $no = 1;
        $data = mysqli_query($connection, "select * from supplier");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $d['id_supplier'] ?></td>
                <td><?php echo $d['nama_supplier'] ?></td>
                <td><?php echo $d['alamat'] ?></td>
                <td><?php echo $d['telepon'] ?></td>
                <td><?php echo $d['email'] ?></td>
                <td><?php echo $d['kontak_person'] ?></td>
                <td>
                    <a href="editPage.php?id_supplier=<?php echo $d['id_supplier']; ?>">Edit</a>
                    <a href="delete.php?id_supplier=<?php echo $d['id_supplier']; ?>">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>