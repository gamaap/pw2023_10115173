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

// query mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// cek apakah tombol tambah sudah ditekan
if (isset($_POST["submit"])) {
  if (ubah($_POST) > 0) {
    echo "<script>
        alert('Data berhasil diubah!');
        document.location.href = 'index.php';
    </script>";
    // header("Location: latihan1.php");
  } else {
    echo "data gagal diubah";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Mahasiswa</title>
</head>

<body>
  <h3>Ubah Data Mahasiswa</h3>
  <form action="" method="post" enctype="multipart/form-data">
    <fieldset style="width: 30%">
      <legend>Form Ubah</legend>
      <input type="hidden" name="id" id="id" value="<?= $mhs["id"]; ?>">
      <label for="nim">NIM</label><br>
      <input type="text" name="nim" id="nim" size="40" value="<?= $mhs["nim"]; ?>" required autofocus autocomplete="off"><br>
      <label for="nama">Nama</label><br>
      <input type="text" name="nama" id="nama" size="40" value="<?= $mhs["nama"]; ?>" required autocomplete="off"><br>
      <label for="email">Email</label><br>
      <input type="text" name="email" id="email" size="40" value="<?= $mhs["email"]; ?>" required autocomplete="off"><br>
      <label for="jurusan">Jurusan</label><br>
      <input type="text" name="jurusan" id="jurusan" size="40" value="<?= $mhs["jurusan"]; ?>" required autocomplete="off"><br>
      <label for="gambar">Gambar</label><br>
      <input type="hidden" name="gambar_lama" id="gambar_lama" value="<?= $mhs["gambar"]; ?>">
      <input type="file" name="gambar" id="gambar" onchange="previewImage()"><br><br>
      <img src="img/<?= $mhs["gambar"]; ?>" alt="Default Photo" id="img-preview" width="50" style="display: block;"><br>
      <button type="submit" name="submit">Ubah</button>
    </fieldset>
  </form>
  <script src="js/script.js"></script>
</body>

</html>