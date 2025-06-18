<?php include 'db.php';
$KodeMK = $_GET['KodeMK'];
$conn->query("DELETE FROM MataKuliah WHERE KodeMK='$KodeMK'");
header("Location: index.php");
?>