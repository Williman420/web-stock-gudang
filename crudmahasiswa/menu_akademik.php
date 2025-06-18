<!DOCTYPE html>
<html>
    <head>
        <title>Menu</title>
    </head>
    <body>
        <?php
        session_start();
        $username=$_SESSION['username'];
        $status=$_SESSION['status'];
        echo "<h2>Selamat Datang $username, anda berhasil login</h2>
        Menu Utama<br><br>
        <a href='listmahasiswa.php'>Data Mahasiswa</a><br><br>
        <a href='listdosen.php'>Data Dosen</a><br><br>
        ";

        ?>
        <form method="post" action="logout.php">
            <input type="submit" name="tbsubmit" value="LOGOUT">
        </form> 
        
    </body>
</html>