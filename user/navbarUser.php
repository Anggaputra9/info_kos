<?php
// Tentukan halaman aktif berdasarkan URL
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Kost</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">
    <link href="style.css" rel="stylesheet">
    <style>

    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid px-4">
                <!-- Navbar Content -->
                <a href="tampilan"> <!-- Tambahkan tag <a> untuk membuat gambar menjadi link -->
                    <img src="../image/logonavbar_MyKost.png" alt="mykost" style="max-height: 45px;">
                </a>
            </div>
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
                <div class="button-container ms-auto px-4">
                    <button type="button" onclick="confirmLogout()">Log Out</button>
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