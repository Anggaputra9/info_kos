<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo "<script>
            alert('Anda harus login terlebih dahulu!');
            location.href = '../login.php';
          </script>";
    exit;
}
?>
