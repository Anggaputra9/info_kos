<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" />
    <title>Document</title>
    <style>
        /* Default untuk layar besar (horizontal) */
        .stat-item {
            display: flex;
            flex-direction: row;
            /* Menyusun elemen secara horizontal */
            align-items: center;
            justify-content: center;
        }

        /* Untuk tampilan mobile (lebar layar hingga 768px) */
        @media (max-width: 768px) {
            .stat-item {
                display: flex;
                flex-direction: column;
                /* Menyusun elemen secara vertikal pada layar kecil */
                align-items: center;
                /* Menjaga elemen tetap di tengah */
            }

            .stat-icon {
                margin-bottom: 1rem;
                /* Memberikan jarak antara ikon dan teks */
            }
        }

        button {
            display: flex;
            align-items: center;
            /* Menjaga ikon dan teks sejajar */
            justify-content: center;
            /* Menyelaraskan konten secara horizontal */
            gap: 8px;
            /* Memberi jarak antara ikon dan teks */
            padding: 10px 16px;
            /* Padding untuk tombol */
            font-size: 14px;
            /* Sesuaikan ukuran font */
            white-space: nowrap;
            /* Mencegah teks turun ke baris baru */
            overflow: hidden;
            /* Menyembunyikan konten yang melampaui tombol */
            text-overflow: ellipsis;
            /* Jika perlu, tambahkan efek ellipsis */
            max-width: 100%;
            /* Tombol akan menyesuaikan dengan layar */
            box-sizing: border-box;
            /* Memastikan padding masuk dalam ukuran tombol */
        }

        button i {
            font-size: 18px;
            /* Sesuaikan ukuran ikon */
        }
    </style>
</head>

<body>
    <!-- HEADER -->
    <section id="hero" class="hero section">
        <div class="header__container" data-aos="fade-up" data-aos-duration="1000">
            <div class="header__image">
                <img src="image/welcome-house.png" alt="header" />
            </div>
            <div class="header_content">
                <h1>Temukan Kost & Kontrakan <span>Terbaik</span> di Sekitar Anda!</h1>
                <p>Kami membantu Anda menemukan tempat tinggal sesuai kebutuhan, budget, dan lokasi strategis.</p>
                <button type="button" onclick="location.href='#daftar-kos';"><i class="bi bi-search"></i>Cari Sekarang</button>
            </div>
        </div>

        <!-- STATIC -->
        <div class="row stats-row" data-aos="fade-up" data-aos-delay="500">
            <div class="col-lg-3 col-md-6 col-12" style="justify-content: center;">
                <div class="stat-item text-center p-3 m-auto">
                    <div class="stat-icon mb-3">
                        <i class="bi bi-trophy"></i>
                    </div>
                    <div class="stat-content">
                        <h4>+100 Kos</h4>
                        <p class="mb-0">Beragam pilihan kost nyaman dan strategis.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="stat-item text-center p-3 m-auto">
                    <div class="stat-icon mb-3">
                        <i class="bi bi-briefcase"></i>
                    </div>
                    <div class="stat-content">
                        <h4>+100 Kontrakan</h4>
                        <p class="mb-0">Pilihan kontrakan eksklusif untuk keluarga atau individu.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="stat-item text-center p-3 m-auto">
                    <div class="stat-icon mb-3">
                        <i class="bi bi-graph-up"></i>
                    </div>
                    <div class="stat-content">
                        <h4>Lokasi Luas</h4>
                        <p class="mb-0">Tersedia di berbagai kota dan area strategis.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="stat-item text-center p-3 m-auto">
                    <div class="stat-icon mb-3">
                        <i class="bi bi-award"></i>
                    </div>
                    <div class="stat-content">
                        <h4>Akses Mudah</h4>
                        <p class="mb-0">Pilih properti langsung dari perangkat Anda kapan saja.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>