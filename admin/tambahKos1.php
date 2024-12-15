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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_kos = $_POST['nama_kos'];
    $domisili = $_POST['domisili'];
    $alamat = $_POST['alamat'];
    $harga_harian = $_POST['harga_harian'];
    $harga_mingguan = $_POST['harga_mingguan'];
    $harga_bulanan = $_POST['harga_bulanan'];
    $whatsapp = $_POST['whatsapp'];
    $link_map = $_POST['link_map'];

    // Upload gambar
    $target_dir = "../uploads/";
    $gambar = $target_dir . basename($_FILES["gambar"]["name"]);
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $gambar)) {
        // Query untuk menambahkan kos baru
        $query = "INSERT INTO daftar_kos (nama_kos, domisili, alamat, harga_harian, harga_mingguan, harga_bulanan, whatsapp, link_map, gambar, status) 
                  VALUES ('$nama_kos', '$domisili', '$alamat', '$harga_harian', '$harga_mingguan', '$harga_bulanan', '$whatsapp', '$link_map', '$gambar', 'dipending')";
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Pengajuan kost berhasil! Menunggu persetujuan admin'); window.location.href = '../index.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan.');</script>";
        }
    } else {
        echo "<script>alert('Gagal mengupload gambar.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Ajukan Kos Baru</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama_kos" class="form-label">Nama Kos</label>
                <input type="text" class="form-control" name="nama_kos" id="nama_kos" required>
            </div>
            <div class="mb-3">
                <label for="domisili" class="form-label">Domisili</label>
                <input type="text" class="form-control" name="domisili" id="domisili" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" required>
            </div>
            <div class="mb-3">
                <label for="harga_harian" class="form-label">Harga Harian</label>
                <input type="number" class="form-control" name="harga_harian" id="harga_harian">
            </div>
            <div class="mb-3">
                <label for="harga_mingguan" class="form-label">Harga Mingguan</label>
                <input type="number" class="form-control" name="harga_mingguan" id="harga_mingguan">
            </div>
            <div class="mb-3">
                <label for="harga_bulanan" class="form-label">Harga Bulanan</label>
                <input type="number" class="form-control" name="harga_bulanan" id="harga_bulanan">
            </div>
            <div class="mb-3">
                <label for="whatsapp" class="form-label">No. WhatsApp</label>
                <input type="text" class="form-control" name="whatsapp" id="whatsapp" required>
            </div>
            <div class="mb-3">
                <label for="link_map" class="form-label">Link Google Maps</label>
                <input type="url" class="form-control" name="link_map" id="link_map" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Upload Gambar</label>
                <input type="file" class="form-control" name="gambar" id="gambar" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajukan</button>
        </form>
    </div>
</body>

</html>
