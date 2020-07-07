<?php
// konfigurasi database
$host       =   "localhost";
$user       =   "root";
$password   =   "";
$database   =   "penjualan";
// perintah php untuk akses ke database
$koneksi = mysqli_connect($host, $user, $password, $database) or die("Cek Server / Database Anda");
