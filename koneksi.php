<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "info_kos";

$koneksi = mysqli_connect($host,$user,$pass,$db);
if (!$koneksi){
    die ("tidak terkoneksi");
}

?>