<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Data MataKuliah</title></head>
<body>
<h2>Daftar MataKuliah</h2>
<a href="insert.php">+ Tambah Data</a>
<table border="1" cellpadding="10">
<tr>
  <th>KodeMK</th><th>NamaMK</th><th>JumlahSKS</th><th>Semester</th><th>MKInti</th><th>Aksi</th>
</tr>
<?php
$result = $conn->query("SELECT * FROM MataKuliah");
while ($row = $result->fetch_assoc()): ?>
<tr>
  <td><?= $row['KodeMK'] ?></td>
  <td><?= $row['NamaMK'] ?></td>
  <td><?= $row['JumlahSKS'] ?></td>
  <td><?= $row['Semester'] ?></td>
  <td><?= $row['MKInti'] ?></td>
  <td>
    <a href="update.php?KodeMK=<?= $row['KodeMK'] ?>">Edit</a> |
    <a href="delete.php?KodeMK=<?= $row['KodeMK'] ?>" onclick="return confirm('Yakin Dihapus?')">Hapus</a>
  </td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>