<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kos = $_POST['id_kos'];
    $aksi = $_POST['aksi'];

    if ($aksi === 'disetujui') {
        $query = "UPDATE daftar_kos SET status = 'disetujui' WHERE id_kos = '$id_kos'";
    } elseif ($aksi === 'ditolak') {
        $query = "DELETE FROM daftar_kos WHERE id_kos = '$id_kos'";
    }

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Aksi berhasil diproses.'); window.location.href='dashboardAdmin.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan.'); window.location.href='dashboardAdmin.php';</script>";
    }
}
?>
