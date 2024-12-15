<?php
include '../koneksi.php'; // Pastikan file koneksi sudah benar

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);
    $id_kos = (int)$_POST['id_kos'];

    // Query untuk menyimpan ulasan
    $query = "INSERT INTO ulasan (id_kos, pesan) VALUES ('$id_kos', '$pesan')";

    if (mysqli_query($koneksi, $query)) {
        // Tampilkan alert dan redirect menggunakan JavaScript
        echo "<script>
                alert('Ulasan berhasil ditambahkan!');
                window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
              </script>";
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
