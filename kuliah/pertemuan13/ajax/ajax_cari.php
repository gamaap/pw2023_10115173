<?php
require '../functions.php';
$mahasiswa = cari($_GET['keyword']);
?>

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