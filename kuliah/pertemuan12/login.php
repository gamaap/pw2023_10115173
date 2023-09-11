<?php
session_start();
require 'functions.php';

if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}

if (isset($_POST["submit"])) {
  $login = login($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <h3>Form Login</h3>
  <?php if (isset($login["error"])) : ?>
    <p><?= $login["pesan"]; ?></p>
  <?php endif; ?>
  <form action="" method="post">
    <fieldset style="width: 30%">
      <legend>Silahkan melakukan Login</legend>
      <label for="username">Username</label><br>
      <input type="text" name="username" id="username" size="30" required><br>
      <label for="password">Password</label><br>
      <input type="password" name="password" id="password" size="30" required><br>
      <input type="checkbox" name="remember" id="remember">
      <label for="remember">Remember me</label><br><br>
      <button type="submit" name="submit">Login</button>
    </fieldset>
  </form>
</body>

</html>