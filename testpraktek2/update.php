<?php include 'db.php';
$KodeMK = $_GET['KodeMK'];
$data = $conn->query("SELECT * FROM MataKuliah WHERE KodeMK='$KodeMK'")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head><title>Edit Data</title></head>
<body>
<h2>Edit MataKuliah</h2>
<form method="post">
  NamaMK: <input name="NamaMK" value="<?= $data['NamaMK'] ?>"><br>
  JumlahSKS: <input name="JumlahSKS" type="number" value="<?= $data['JumlahSKS'] ?>"><br>
  Semester: <input name="Semester" type="number" value="<?= $data['Semester'] ?>"><br>
  MKInti: <input name="MKInti" value="<?= $data['MKInti'] ?>"><br>
  <button type="submit">Update</button>
</form>
<?php
if ($_POST) {
  $sql = "UPDATE MataKuliah SET
    NamaMK='{$_POST['NamaMK']}',
    JumlahSKS={$_POST['JumlahSKS']},
    Semester={$_POST['Semester']},
    MKInti='{$_POST['MKInti']}'
    WHERE KodeMK='$KodeMK'";
  $conn->query($sql);
  header("Location: index.php");
}
?>
</body>
</html>
