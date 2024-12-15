<?php
// Koneksi ke database
include '../koneksi.php';

session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user'])) {
  // Jika belum login, redirect ke halaman login
  echo "<script>
          alert('Anda harus login terlebih dahulu!');
          location.href = '../index.php';
        </script>";
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mykost</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="icon" href="image/logo_mykost.png" type="image/x-icon" />
  <link href="style.css" rel="stylesheet" />
  <style></style>
</head>

<body>
  <?php include "navbarUser.php"; ?>

  <?php include "header.php"; ?>

  <?php include "about.php"; ?>

  <?php include "futures.php"; ?>

  <?php include "daftar_kos.php"; ?>

  <?php include "contact.php"; ?>

  <?php include "footer.php"; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>