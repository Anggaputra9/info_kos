<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $query = "SELECT * FROM login WHERE email = '$email'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {

            $_SESSION['user'] = [
                'email' => $user['email'],
                'role' => $user['role'], // Admin atau user
            ];

            if ($user['role'] === 'admin') {
                echo "<script type='text/javascript'>
                    alert('login berhasil.');
                    location.href = 'admin/dashboardAdmin.php';
                    </script>";
            } else {
                echo "<script type='text/javascript'>
                    alert('login berhasil.');
                    location.href = 'User/tampilanUser.php';
                    </script>";
            }
            exit;
        } else {
            $error = "<script>
        alert('Password yang anda masukan salah');
        </script>";
        }
    } else {
        $error = "<script>
        alert('Email tidak ditemukan');
        </script>";
    }
}