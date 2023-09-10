<?php
require 'functions.php';

$id = $_GET["id"];

$mhs = query("SELECT * FROM mahasiswa WHERE id = $id");

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
      <a href="">Ubah</a> | <a href="">Hapus</a>
    </li>
  </ul>
  <a href="latihan1.php">Kembali ke daftar Mahasiswa</a>
</body>

</html>