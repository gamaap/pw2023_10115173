<?php
session_start();
require 'functions.php';

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

if (!isset($_GET["id"])) {
  header("Location: index.php");
  exit;
}

$id = $_GET["id"];

$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Mahasiswa</title>
</head>

<body>
  <h3>Detail Mahasiswa</h3>
  <ul>
    <li><img src="img/<?= $mhs["gambar"]; ?>" width="50"></li>
    <li>NIM : <?= $mhs["nim"]; ?></li>
    <li>Nama : <?= $mhs["nama"]; ?></li>
    <li>Email : <?= $mhs["email"]; ?></li>
    <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
    <li>
      <a href="ubah.php?id=<?= $mhs["id"]; ?>">Ubah</a> | <a href="hapus.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('Hapus Data?')">Hapus</a>
    </li>
  </ul>
  <a href="index.php">Kembali ke daftar Mahasiswa</a>
</body>

</html>