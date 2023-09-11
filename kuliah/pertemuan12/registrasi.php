<?php
require 'functions.php';

if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
              alert('user berhasil ditambahkan!');
              document.location.href = 'login.php';
          </script>";
  } else {
    echo "user gagal ditambahkan";
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi</title>
</head>

<body>
  <h3>Form Registrasi</h3>
  <form action="" method="post">
    <fieldset style="width: 30%">
      <legend>Silahkan melakukan Registrasi</legend>
      <label for="username">Username</label><br>
      <input type="text" name="username" id="username" size="30" autofocus autocomplete="off" required><br>
      <label for="password">Password</label><br>
      <input type="password" name="password" id="password" size="30" required><br>
      <label for="confirm-password">Konfirmasi Password</label><br>
      <input type="password" name="confirm-password" id="confirm-password" size="30" required><br><br>
      <button type="submit" name="register">Registrasi</button>
    </fieldset>
  </form>
</body>

</html>