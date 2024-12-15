<?php
// Koneksi ke database
include 'koneksi.php';

// Ambil data kos dari database
$query = "SELECT * FROM daftar_kos WHERE status = 'disetujui'";
$result = mysqli_query($koneksi, $query);

// Periksa apakah query berhasil
if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}
?>

<?php
// Koneksi ke database
include 'koneksi.php';

// Ambil data kos dari database
$query = "SELECT * FROM daftar_kos WHERE status = 'disetujui'";
$result = mysqli_query($koneksi, $query);

// Periksa apakah query berhasil
if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}


// Ambil data kos dari database
$search = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';
$query = "SELECT * FROM daftar_kos WHERE status = 'disetujui'";

// Tambahkan filter pencarian jika ada input dari pengguna
if (!empty($search)) {
    $query .= " AND (nama_kos LIKE '%$search%' OR domisili LIKE '%$search%' OR alamat LIKE '%$search%')";
}

$result = mysqli_query($koneksi, $query);

// Periksa apakah query berhasil
if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}
?>

<!-- Daftar Kos -->
<section id="daftar-kos" class="container py-5">
    <form class="d-flex mx-auto mb-5" style="max-width: 600px" data-aos="fade-up" data-aos-duration="1000" method="GET" action="">
        <input class="form-control me-2" type="search" placeholder="Cari Kost..." name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" aria-label="Search" />
        <button class="btn" type="submit" style="background-color:#86bbd1; padding: 10px 16px; min-width: 80px; color: white;">
            Cari!
        </button>

    </form>

    <h2 class="text-center mb-4" data-aos="fade-up" data-aos-duration="1000">Daftar Kos</h2>

    <div class="row">
        <div class="container mt-5">
            <div class="row">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-md-4 mb-5" data-aos="fade-up" data-aos-duration="1000">
                        <div class="card">
                            <?php
                            // Pastikan path diubah sesuai lokasi saat ini
                            $imagePath = (strpos($_SERVER['REQUEST_URI'], 'admin/') !== false) ? '../uploads/' : 'uploads/';
                            ?>
                            <img src="uploads/<?php echo $row['gambar']; ?>" class="card-img-top" alt="<?php echo $row['nama_kos']; ?>" style="height: 200px; object-fit: cover;">
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
                                    <a href="<?php echo $row['link_map']; ?>" target="_blank" class="btn " style="background-color: #86bbd1; color: white;">Location</a>
                                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#ulasanModal<?php echo $row['id_kos']; ?>" style="background-color: #86bbd1; color: white;">review</button>
                                    <a href="https://wa.me/<?php echo $row['whatsapp']; ?>" target="_blank" class="btn " style="background-color: #86bbd1; color: white;">Reservasi</a>
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