<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Kost</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">
    <link href="user_style.css" rel="stylesheet">
    <style>
        /* Membuat navbar transparan */
        .navbar {
            background-color: transparent !important;
        }

        /* Menyesuaikan ukuran logo pada navbar */
        .navbar img {
            max-height: 45px;
        }

        Mengatur tombol Log Out
        .navbar-nav .button-container button {
            background-color: #15133C;
            color: white;
            border: none;
            padding: 10px 20px;
            font-weight: 600;
        }

        /* Responsif untuk navbar */
        @media (max-width: 991px) {
            .navbar-nav {
                text-align: center; /* Menjadikan menu navbar terpusat saat layar kecil */
            }
            .button-container {
                margin-top: 10px; /* Memberi jarak antara tombol dengan navbar */
            }
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light m-auto">
            <div class="container-fluid px-4">
                <!-- Navbar Content -->
                <a href="tampilanUser.php">
                    <img src="../image/logonavbar_MyKost.png" alt="mykost">
                </a>
                <!-- Tombol Hamburger untuk tampilan mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <!-- Navbar Menu -->
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0" style="font-weight: 600;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#hero">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>

                <!-- Tombol Log Out -->
                <div class="button-container ms-auto px-4">
                    <button type="button" class="m-auto" onclick="confirmLogout()">Log Out</button>
                </div>
                <script>
                    function confirmLogout() {
                        if (confirm('Anda yakin ingin Logout?')) {
                            window.location.href = 'logout.php';
                        }
                    }
                </script>
            </div>
        </nav>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
