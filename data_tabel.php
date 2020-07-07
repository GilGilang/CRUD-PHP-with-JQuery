<?php

//MEMANGGIL FILE KONEKSI
include "./koneksi.php";
$list = [];

//MENDEFINISIKAN NILAI LIMIT
$lim = 4;

//MENDEFINISIKAN HALAMAN PERTAMA
$hal = array_key_exists('hal', $_GET) ? $_GET['hal'] : 0;

//QUERY UNTUK MENDAPATKAN JUMLAH SELURUH ROW
$sql = "select * from pegawai";
$res = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
$jml = mysqli_num_rows($res);

//MENGHITUNG MAKSIMAL HALAMAN
$max = ceil($jml / $lim);

//MELAKUKAN QUERY LIMIT
$sqlLimit = "SELECT * FROM pegawai LIMIT $hal, $lim";
$resLimit = mysqli_query($koneksi, $sqlLimit) or die(mysqli_error($koneksi));
?>

<table border="1" width="100%" cellpadding="3" cellspacing="0" style="bordercollapse:collapse">
    <tr align="center">
        <th>No</th>
        <th> Kode Pegawai </th>
        <th> Nama </th>
        <th> Umur </th>
        <th> Golongan </th>
        <th> Gaji </th>
        <th> Alamat </th>
        <th> Edit </th>
        <th> Hapus </th>
    </tr>

    <?php
    //NOMOR URUT DITAMBAH HALAMAN
    $i = 1 + $hal;
    while ($data = mysqli_fetch_array($resLimit)) {
        if ($i % 2 == 0) $bg = '#cccccc';
        else $bg = '#ffffff';

        echo "<tr bgcolor = ' " . $bg . "'>
        <td> " . $i . "</td>
        <td>" . $data["kode"] . "</td>
        <td>" . $data["nama"] . "</td>
        <td>" . $data["umur"] . "</td>
        <td>" . $data["golongan"] . "</td>
        <td>" . $data["gaji"] . "</td>
        <td>" . $data["alamat"] . "</td>
        <td align='center'><a href='javascript:void(0)' onclick=\"edit_form('$data[0]')\">Edit</a></td>
        <td align='center'><a href='javascript:void(0)' onclick=\"delete_data('$data[0]')\">Hapus</a></td>
        </tr>";
        $i++;
    }
    ?>
</table>
<table width="100%">
    <tr>
        <td>
            Jumlah Data : <?= $jml; ?>
        </td>
        <td align="right">
            Halaman :
            <?php
            for ($h = 1; $h <= $max; $h++) {
                $list[$h] = $lim * $h - $lim; ?>

                <a href="javascript:void(0)" onclick="ubahTabelData(<?= $list[$h]; ?>)"><?= $h ?></a>

            <?php } ?>
        </td>
    </tr>
</table>

<script>
    // https://api.jquery.com/jQuery.get/
    // jQuery.get(url [, data][, success][, dataType])
    function ubahTabelData(halaman_aktif) {
        $.get('data_tabel.php?hal=' + halaman_aktif, null, function(data) {
            $('#data').html(data)
        });

    }
</script>