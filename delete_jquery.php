<?php

include './koneksi.php';

$q = "DELETE FROM pegawai WHERE kode = '" . $_GET['kode'] . "'";
$r = mysqli_query($koneksi, $q) or die(mysqli_error($koneksi));

header("location:tampil_jquery.php");
