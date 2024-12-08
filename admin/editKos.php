<?php
include '../koneksi.php'; // Koneksi ke database

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

// Ambil ID Kos dari URL
$id_kos = isset($_GET['id_kos']) ? intval($_GET['id_kos']) : 0;

// Jika ID Kos tidak valid, tampilkan pesan error
if ($id_kos <= 0) {
    die("ID Kos tidak valid.");
}

// Jika form disubmit, proses data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama_kos = mysqli_real_escape_string($koneksi, $_POST['nama_kos']);
    $domisili = mysqli_real_escape_string($koneksi, $_POST['domisili']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $harga_harian = intval($_POST['harga_harian']);
    $harga_mingguan = intval($_POST['harga_mingguan']);
    $harga_bulanan = intval($_POST['harga_bulanan']);
    $whatsapp = mysqli_real_escape_string($koneksi, $_POST['whatsapp']);
    $link_map = mysqli_real_escape_string($koneksi, $_POST['link_map']);

    // Update data kos
    $query = "UPDATE daftar_kos 
              SET nama_kos = '$nama_kos', domisili = '$domisili', alamat = '$alamat', 
                  harga_harian = $harga_harian, harga_mingguan = $harga_mingguan, harga_bulanan = $harga_bulanan,
                  whatsapp = '$whatsapp', link_map = '$link_map'
              WHERE id_kos = $id_kos";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data kos berhasil diperbarui!'); window.location.href='dashboardAdmin.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
    exit;
}

// Ambil data kos berdasarkan ID
$query = "SELECT * FROM daftar_kos WHERE id_kos = $id_kos";
$result = mysqli_query($koneksi, $query);

// Periksa apakah data kos ditemukan
if (!$result || mysqli_num_rows($result) == 0) {
    die("Kos tidak ditemukan.");
}

$data_kos = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Data Kos</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nama_kos" class="form-label">Nama Kos</label>
                <input type="text" class="form-control" id="nama_kos" name="nama_kos" value="<?php echo htmlspecialchars($data_kos['nama_kos']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="domisili" class="form-label">Domisili</label>
                <input type="text" class="form-control" id="domisili" name="domisili" value="<?php echo htmlspecialchars($data_kos['domisili']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required><?php echo htmlspecialchars($data_kos['alamat']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="harga_harian" class="form-label">Harga Harian</label>
                <input type="number" class="form-control" id="harga_harian" name="harga_harian" value="<?php echo $data_kos['harga_harian']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="harga_mingguan" class="form-label">Harga Mingguan</label>
                <input type="number" class="form-control" id="harga_mingguan" name="harga_mingguan" value="<?php echo $data_kos['harga_mingguan']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="harga_bulanan" class="form-label">Harga Bulanan</label>
                <input type="number" class="form-control" id="harga_bulanan" name="harga_bulanan" value="<?php echo $data_kos['harga_bulanan']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="whatsapp" class="form-label">WhatsApp</label>
                <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="<?php echo htmlspecialchars($data_kos['whatsapp']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="link_map" class="form-label">Link Map</label>
                <input type="text" class="form-control" id="link_map" name="link_map" value="<?php echo htmlspecialchars($data_kos['link_map']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="indexAdmin.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>

</html>