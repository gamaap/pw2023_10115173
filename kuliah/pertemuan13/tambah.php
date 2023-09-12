<?php
session_start();
require 'functions.php';

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

// cek apakah tombol tambah sudah ditekan
if (isset($_POST["submit"])) {
  if (tambah($_POST) > 0) {
    echo "<script>
        alert('Data berhasil ditambahkan!');
        document.location.href = 'index.php';
    </script>";
    // header("Location: latihan1.php");
  } else {
    echo "data gagal ditambahkan";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Mahasiswa</title>
</head>

<body>
  <h3>Tambah Data Mahasiswa</h3>
  <form action="" method="post" enctype="multipart/form-data">
    <fieldset style="width: 30%">
      <legend>Form Tambah</legend>
      <label for="nim">NIM</label><br>
      <input type="text" name="nim" id="nim" size="40" required autofocus autocomplete="off"><br>
      <label for="nama">Nama</label><br>
      <input type="text" name="nama" id="nama" size="40" required autocomplete="off"><br>
      <label for="email">Email</label><br>
      <input type="text" name="email" id="email" size="40" required autocomplete="off"><br>
      <label for="jurusan">Jurusan</label><br>
      <input type="text" name="jurusan" id="jurusan" size="40" required autocomplete="off"><br>
      <label for="gambar">Gambar</label><br>
      <input type="file" name="gambar" id="gambar" onchange="previewImage()"><br><br>
      <img src="img/allen.jpg" alt="Default Photo" id="img-preview" width="50" style="display: block;"><br>
      <button type="submit" name="submit">Tambah</button>
    </fieldset>
  </form>
  <script src="js/script.js"></script>
</body>

</html>