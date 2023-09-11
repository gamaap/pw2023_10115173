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

if (hapus($id) > 0) {
  echo "<script>
      alert('Data berhasil dihapus!');
      document.location.href = 'index.php';
  </script>";
  // header("Location: latihan1.php");
} else {
  echo "data gagal dihapus";
}
