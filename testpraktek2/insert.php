<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Tambah Data</title></head>
<body>
<h2>Tambah MataKuliah</h2>
<form method="post">
  KodeMK: <input name="KodeMK"><br>
  NamaMK: <input name="NamaMK"><br>
  JumlahSKS: <input name="JumlahSKS" type="number"><br>
  Semester: <input name="Semester" type="number"><br>
  MKInti (Ya/Tidak): <input name="MKInti"><br>
  <button type="submit">Simpan</button>
</form>
<?php
if ($_POST) {
  $sql = "INSERT INTO MataKuliah VALUES (
    '{$_POST['KodeMK']}',
    '{$_POST['NamaMK']}',
    {$_POST['JumlahSKS']},
    {$_POST['Semester']},
    '{$_POST['MKInti']}'
  )";
  $conn->query($sql);
  header("Location: index.php");
}
?>
</body>
</html>