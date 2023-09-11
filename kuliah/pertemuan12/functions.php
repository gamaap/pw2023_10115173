<?php

function connection()
{
  return mysqli_connect('localhost', 'root', '', 'phpdasar');
}

function query($query)
{
  $conn = connection();
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data)
{
  $conn = connection();

  $nim = htmlspecialchars($data["nim"]);
  $nama = htmlspecialchars($data["nama"]);
  $email = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  $gambar = htmlspecialchars($data["gambar"]);

  $query = "INSERT INTO mahasiswa VALUES (NULL, '$nama', '$nim', '$email', '$jurusan', '$gambar')";
  mysqli_query($conn, $query) or die(mysqli_error($conn));

  mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = connection();
  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = connection();

  $id = $data["id"];
  $nim = htmlspecialchars($data["nim"]);
  $nama = htmlspecialchars($data["nama"]);
  $email = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  $gambar = htmlspecialchars($data["gambar"]);

  $query = "UPDATE mahasiswa SET 
              nim = '$nim',
              nama = '$nama',
              email = '$email',
              jurusan = '$jurusan',
              gambar = '$gambar'
            WHERE id = $id";
  mysqli_query($conn, $query) or die(mysqli_error($conn));

  mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $query = "SELECT * FROM mahasiswa 
  WHERE 
  nama LIKE '%$keyword%' OR
  nim LIKE '%$keyword%' OR
  email LIKE '%$keyword%' OR
  jurusan LIKE '%$keyword%'";

  return query($query);
}

function login($data)
{
  $conn = connection();
  $username = htmlspecialchars($data["username"]);
  $password = htmlspecialchars($data["password"]);

  // cek username
  if ($user = query("SELECT * FROM user WHERE username = '$username'")[0]) {
    // cek password
    if (password_verify($password, $user["password"])) {
      // Set session
      $_SESSION['login'] = true;
      header("Location: index.php");
      exit;
    }
  }
  return [
    'error' => true,
    'pesan' => 'Username / Password salah'
  ];
}

function registrasi($data)
{
  $conn = connection();

  $username = htmlspecialchars(strtolower($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $confirmPassword = mysqli_real_escape_string($conn, $data["confirm-password"]);

  // jika username / password kosong
  if (empty($username) || empty($password) || empty($confirmPassword)) {
    echo "<script>
            alert('username / password tidak boleh kosong!');
            document.location.href = 'registrasi.php';
        </script>";
    return false;
  }

  // jika username sudah terdaftar di database
  if (query("SELECT * FROM user WHERE username = '$username'")) {
    echo "<script>
              alert('username sudah terdaftar!');
              document.location.href = 'registrasi.php';
          </script>";
    return false;
  }

  // jika password dan konfirmasi password tidak sesuai
  if ($password !== $confirmPassword) {
    echo "<script>
              alert('password dan konfirmasi password tidak sesuai!');
              document.location.href = 'registrasi.php';
          </script>";
    return false;
  }

  // jika password panjangnya dibawah 8 digit
  if (strlen($password) < 8) {
    echo "<script>
              alert('panjang password minimal 8 karakter!');
              document.location.href = 'registrasi.php';
          </script>";
    return false;
  }

  // jika username dan password benar
  $passwordBaru = password_hash($password, PASSWORD_DEFAULT);

  // insert ke table user
  $query = "INSERT INTO user VALUES (null, '$username', '$passwordBaru')";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
