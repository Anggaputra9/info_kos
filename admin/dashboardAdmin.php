<?php

include "auth.php";

// Cek apakah user sudah login
if (!isset($_SESSION['user'])) {
    // Jika belum login, redirect ke halaman login
    echo "<script>
            alert('Anda harus login terlebih dahulu!');
            location.href = '../index.php';
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

// Koneksi ke database
include '../koneksi.php';

// Ambil data kos dari database
$query = "SELECT * FROM daftar_kos WHERE status = 'disetujui'";
$result = mysqli_query($koneksi, $query);

// Periksa apakah query berhasil
if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mykost</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="icon" href="../image/mykost.png" type="image/x-icon">
    <link href="admin.css" rel="stylesheet">
</head>

<body>
    <?php include "navbarAdmin.php"; ?>
    <!-- Hero Section -->
    <section class="header__contaier" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
        <div class="header_image m-auto" style="max-width: 50%;">
            <img src="../image/admin.png" alt="logo" class="mt-5 mb-5">
        </div>
        <div class="header_content text-center">
            <h1>Selamat Datang Selamat Datang <span>Admin MyKost</span><br>
            Jadilah Info Kos terbaik dari yang terbaik!</br></h1>
        </div>
        </div>
       
    </section>

    <section class="hero d-flex flex-column align-items-center text-center py-4" data-aos="fade-up" data-aos-duration="1000">
        <div class="header-container mt-5 mb-4 rounded-background">
            <h4>Menunggu Persetujuan</h4>
        </div>

        <div class="container">
    <div class="row justify-content-center">
        <?php
        // Query untuk mendapatkan data kos dengan status dipending
        $query = "SELECT * FROM daftar_kos WHERE status = 'dipending'";
        $result1 = mysqli_query($koneksi, $query);

        while ($row = mysqli_fetch_assoc($result1)) {
        ?>
            <div class="col-md-4 mb-4"> <!-- Set ukuran kolom -->
                <div class="card" data-aos="fade-up" data-aos-duration="1000">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['nama_kos']); ?></h5>
                        <p class="card-text">
                            <strong>Domisili:</strong> <?php echo htmlspecialchars($row['domisili']); ?><br>
                            <strong>Alamat:</strong> <?php echo htmlspecialchars($row['alamat']); ?><br>
                            <strong>Harga Harian:</strong> Rp <?php echo number_format($row['harga_harian'], 0, ',', '.'); ?><br>
                            <strong>Harga Mingguan:</strong> Rp <?php echo number_format($row['harga_mingguan'], 0, ',', '.'); ?><br>
                            <strong>Harga Bulanan:</strong> Rp <?php echo number_format($row['harga_bulanan'], 0, ',', '.'); ?><br>
                        </p>
                        <form method="POST" action="verifikasiKos.php" class="d-flex justify-content-between">
                            <input type="hidden" name="id_kos" value="<?php echo $row['id_kos']; ?>">
                            <button type="submit" name="aksi" value="disetujui" class="btn btn-success">Setujui</button>
                            <button type="submit" name="aksi" value="ditolak" class="btn btn-danger">Tolak</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

    </section>


    <section class="container py-5">
        <div class="header-kelola" style="display:flex; align-items: center; justify-content: center; ">
            <h2 style="margin:0;" data-aos="fade-up" data-aos-duration="1000">Kelola MyKost</h2>
            <div class="nav-item dropdown">
                <button class="btn btn-primary" style="margin-left: 15px; background-color:#9ec3d9" data-aos="fade-up" data-aos-duration="1000">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Aksi
                    </a>
                    <ul class="dropdown-menu" style=" background-color: #ffffff; ">
                        <li><a class="dropdown-item" href="tambahKos.php">Tambah Kost</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editModal">Edit Kost</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#hapusModal">Hapus Kost</a></li>
                    </ul>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="container mt-5">
                <div class="row">
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="col-md-4 mb-5" data-aos="fade-up" data-aos-duration="1000">
                            <div class="card">
                                <img src="<?php echo $row['gambar']; ?>" class="card-img-top" alt="<?php echo $row['nama_kos']; ?>" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['nama_kos']; ?></h5>
                                    <hr>
                                    <p class="card-text">
                                        Domisili: <?php echo $row['domisili']; ?><br>
                                        Alamat: <?php echo $row['alamat']; ?><br>
                                        Harga Harian: Rp <?php echo number_format($row['harga_harian'], 0, ',', '.'); ?><br>
                                        Harga Mingguan: Rp <?php echo number_format($row['harga_mingguan'], 0, ',', '.'); ?><br>
                                        Harga Bulanan: Rp <?php echo number_format($row['harga_bulanan'], 0, ',', '.'); ?><br>
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <a href="<?php echo $row['link_map']; ?>" target="_blank" class="btn btn-primary" style="background-color: #9ec3d9;">Location</a>
                                        <!-- Tombol untuk membuka modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ulasanModal<?php echo $row['id_kos']; ?>" style="background-color: #9ec3d9;">review</button>
                                        <a href="https://wa.me/<?php echo $row['whatsapp']; ?>" target="_blank" class="btn btn-primary" style="background-color: #9ec3d9;">Reservasi</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal untuk Ulasan (untuk setiap kos) -->
                        <div class="modal fade" id="ulasanModal<?php echo $row['id_kos']; ?>" tabindex="-1" aria-labelledby="ulasanModalLabel<?php echo $row['id_kos']; ?>" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ulasanModalLabel<?php echo $row['id_kos']; ?>">Ulasan untuk <?php echo $row['nama_kos']; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Menampilkan ulasan yang ada -->
                                        <h5>Ulasan Pengguna</h5>
                                        <div id="daftarUlasan<?php echo $row['id_kos']; ?>">
                                            <?php
                                            // Ambil ulasan untuk kos tertentu
                                            $kos_id = $row['id_kos'];
                                            $ulasan_query = "SELECT * FROM ulasan WHERE id_kos = '$kos_id' ORDER BY tanggal DESC";
                                            $ulasan_result = mysqli_query($koneksi, $ulasan_query);

                                            if (mysqli_num_rows($ulasan_result) > 0) {
                                                while ($ulasan_row = mysqli_fetch_assoc($ulasan_result)) {
                                                    echo '<div class="alert alert-info">';
                                                    echo '<p>' . htmlspecialchars($ulasan_row['pesan']) . '</p>';
                                                    echo '<small class="text-muted">Tanggal: ' . $ulasan_row['tanggal'] . '</small>';
                                                    echo '</div>';
                                                }
                                            } else {
                                                echo '<p class="text-muted">Belum ada ulasan.</p>';
                                            }
                                            ?>
                                        </div>

                                        <!-- Form untuk mengirimkan ulasan -->
                                        <h5>Tambah Ulasan</h5>
                                        <form action="simpanUlasan.php" method="POST">
                                            <div class="mb-3">
                                                <textarea class="form-control" name="pesan" rows="3" placeholder="Tulis pengalaman Anda..." required></textarea>
                                            </div>
                                            <input type="hidden" name="id_kos" value="<?php echo $row['id_kos']; ?>">
                                            <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Hapus Kost -->
    <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusModalLabel">Pilih Kost untuk Dihapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Daftar Kos yang akan ditampilkan -->
                    <ul class="list-group">
                        <?php
                        // Query untuk mengambil data
                        $query = "SELECT * FROM daftar_kos";
                        $result = mysqli_query($koneksi, $query);
                        // Periksa apakah query berhasil
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<li class="list-group-item">';
                                echo '<a href="hapusKos.php?id=' . $row['id_kos'] . '">kost - ' . htmlspecialchars($row['nama_kos']) . ' - Hapus</a>';
                                echo '</li>';
                            }
                        } else {
                            echo '<li class="list-group-item">Tidak ada kos yang tersedia.</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit Kost -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Pilih Kost untuk Diedit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Daftar Kos yang akan ditampilkan -->
                    <ul class="list-group">
                        <?php
                        // Query untuk mengambil data
                        $query = "SELECT * FROM daftar_kos";
                        $result = mysqli_query($koneksi, $query);
                        // Periksa apakah query berhasil
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<li class="list-group-item">';
                                echo '<a href="editKos.php?id_kos=' . $row['id_kos'] . '">kost - ' . htmlspecialchars($row['nama_kos']) . ' - Edit</a>';
                                echo '</li>';
                            }
                        } else {
                            echo '<li class="list-group-item">Tidak ada kos yang tersedia.</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php include "../footer.php"; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>