<?php
include '../koneksi.php';

include "auth.php";

// Cek apakah user sudah login
if (!isset($_SESSION['user'])) {
    // Jika belum login, redirect ke halaman login
    echo "<script>
            alert('Anda harus login terlebih dahulu!');
            location.href = '../login.php';
          </script>";
    exit;
}

// Cek apakah role user adalah admin
if ($_SESSION['user']['role'] !== 'admin') {
    // Jika bukan admin, redirect ke halaman user atau halaman lain
    echo "<script>
            alert('Akses ditolak! Anda bukan admin.');
            location.href = '../User/tampilanUser.php';
          </script>";
    exit;
}

if (isset($_GET['id'])) {
    // Validasi ID
    $id = (int)$_GET['id'];

    // Query untuk menghapus data
    $query = "DELETE FROM daftar_kos WHERE id_kos = $id";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data kost berhasil dihapus!'); window.location.href = 'dashboardAdmin.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data kost: " . mysqli_error($koneksi) . "'); window.location.href = 'dashboardAdmin.php';</script>";
    }
} else {
    echo "<script>alert('ID kost tidak ditemukan.'); window.location.href = 'dashboardAdmin.php';</script>";
}
?>
