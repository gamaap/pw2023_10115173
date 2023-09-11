<?php
session_start();
require 'functions.php';

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

$mahasiswa = query("SELECT * FROM mahasiswa");

// action searching

if (isset($_POST["cari"])) {
  $mahasiswa = cari($_POST['keyword']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <h3>Daftar Mahasiswa</h3>
  <a href="tambah.php">Tambah Data</a><br><br>
  <form action="" method="post">
    <input type="text" name="keyword" id="keyword" class="keyword" size="40" placeholder="Cari..." autocomplete="off" autofocus>
    <button type="submit" name="cari" class="tombol-cari">Cari</button>
  </form><br>
  <div class="container">
    <table border="1" cellpadding="10" cellspacing="0">
      <tr>
        <th>#</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Aksi</th>
      </tr>

      <?php if (empty($mahasiswa)) : ?>
        <tr>
          <td colspan="4">
            <p>Data mahasiswa tidak ditemukan!</p>
          </td>
        </tr>
      <?php endif; ?>

      <?php $no = 1; ?>
      <?php foreach ($mahasiswa as $mhs) : ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><img src="img/<?= $mhs["gambar"]; ?>" width="50"></td>
          <td><?= $mhs["nama"]; ?></td>
          <td>
            <a href="detail.php?id=<?= $mhs["id"]; ?>">Lihat Detail</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
  <a href="logout.php">Logout</a>

  <script src="js/script.js"></script>
</body>

</html>