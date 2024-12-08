<?php
// Upload gambar
$gambar = $_FILES['gambar']['name'];
$target_dir = "../uploads/";
$target_file = $target_dir . basename($gambar);


// Koneksi ke database
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

// Tentukan apakah pengguna adalah admin atau bukan
session_start();
$is_admin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';


// Proses saat form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama_kos = mysqli_real_escape_string($koneksi, $_POST['nama_kos']);
    $domisili = mysqli_real_escape_string($koneksi, $_POST['domisili']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $harga_harian = (int)$_POST['harga_harian'];
    $harga_mingguan = (int)$_POST['harga_mingguan'];
    $harga_bulanan = (int)$_POST['harga_bulanan'];
    $link_map = mysqli_real_escape_string($koneksi, $_POST['link_map']);
    $whatsapp = preg_replace('/[^0-9]/', '', $_POST['whatsapp']); // Validasi nomor WhatsApp

    // Pastikan format nomor WhatsApp benar
    if (substr($whatsapp, 0, 1) === '0') {
        $whatsapp = '62' . substr($whatsapp, 1);
    }

    // Upload gambar
    $gambar = $_FILES['gambar']['name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($gambar);

     // Jika admin yang menambah, langsung disetujui (approved), jika non-admin, statusnya pending
     $status = $is_admin ? 'disetujui' : 'pending';

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
        // Insert data ke database
        $query = "INSERT INTO daftar_kos (nama_kos, domisili, alamat, harga_harian, harga_mingguan, harga_bulanan, link_map, gambar, whatsapp, status) 
                  VALUES ('$nama_kos', '$domisili', '$alamat', $harga_harian, $harga_mingguan, $harga_bulanan, '$link_map','$target_file','$whatsapp','disetujui')";
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Data kost berhasil ditambahkan!'); window.location.href = 'dashboardAdmin.php';</script>";
        } else {
            echo "Error: " . mysqli_error($koneksi);
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
    <title>Tambah Data Kos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h3>Tambah Data Kost</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama_kos" class="form-label">Nama Kos</label>
                <input type="text" class="form-control" id="nama_kos" name="nama_kos" required>
            </div>
            <div class="mb-3">
                <label for="domisili" class="form-label">Domisili</label>
                <input type="text" class="form-control" id="domisili" name="domisili" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="mb-3">
                <label for="harga_harian" class="form-label">Harga Harian</label>
                <input type="number" class="form-control" id="harga_harian" name="harga_harian" required>
            </div>
            <div class="mb-3">
                <label for="harga_mingguan" class="form-label">Harga Mingguan</label>
                <input type="number" class="form-control" id="harga_mingguan" name="harga_mingguan" required>
            </div>
            <div class="mb-3">
                <label for="harga_bulanan" class="form-label">Harga Bulanan</label>
                <input type="number" class="form-control" id="harga_bulanan" name="harga_bulanan" required>
            </div>
            <div class="mb-3">
                <label for="link_map" class="form-label">Link Map</label>
                <input type="url" class="form-control" id="link_map" name="link_map" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="whatsapp" class="form-label">Nomor WhatsApp</label>
                <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="Contoh: 6281234567890" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Kost</button>
        </form>
    </div>
</body>

</html>