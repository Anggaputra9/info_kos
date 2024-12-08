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
    <style>
        .navbar {
            box-shadow: 0px 0px 6px rgb(0, 0, 0, 0.3);
        }

        .nav-link.active {
            position: relative;
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 1%;
            background-color: black !important;
            /* Pastikan garis bawah terlihat */
            z-index: 1;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <img src="../image/mykost.png" alt="mykost" style="max-height: 25px;">
                <a class="navbar-brand m-1" style="font-weight: 650;" href="#">
                    <span style="color: blue;">My</span>kost
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($current_page == 'dashboardAdmin.php') ? 'active' : ''; ?>" " aria-current=" page" href="dashboardAdmin.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($current_page == 'contactAdmin.php') ? 'active' : ''; ?>" " aria-current=" page" href="contactAdmin.php">Saran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($current_page == 'logout.php') ? 'active' : ''; ?>" " aria-current=" page" href="logout.php" onclick="return confirm('Anda yakin ingin Logout?')">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>