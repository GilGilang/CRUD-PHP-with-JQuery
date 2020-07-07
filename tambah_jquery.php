<?php

include './koneksi.php';

$msg = '';

if (array_key_exists('kode', $_POST)) {
    $kode = $_POST['kode'];
    if ($kode != '') {
        $nama = $_POST['nama'];
        $umur = $_POST['umur'];
        $golongan = $_POST['golongan'];
        $gaji = $_POST['gaji'];
        $alamat = $_POST['alamat'];

        $q = "INSERT INTO pegawai VALUES ('" . $kode . "','" . $nama . "','" . $umur . "','" . $golongan . "','" . $gaji . "','" . $alamat . "')";
        $r = mysqli_query($koneksi, $q) or die(mysqli_error($koneksi));

        if ($r) {
            echo '<script>alert("Data Berhasil Ditambahkan");</script>';
            echo '<script>window.close();</script>';
            echo '<script>location.reload(true);</script>';
        } else {
            $msg = "Data Tidak Berhasil Ditambahkan";
        }
    }
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Tampil Data JQuery</title>
    <script src="jquery.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#close').click(function() {
                $('form').hide("slow");
            });
        });
    </script>
</head>

<body>
    <form id="forms" method="POST" onsubmit="return submitForm('tambah_jquery.php')">
        <fieldset>
            <legend>Form Tambah Pegawai</legend>
            <div align="right"><img id="close" src="img/icons8-close-window-48.png" title="close" /></div>

            <table>
                <?php
                if ($msg != '') {
                    echo "<tr><td></td> <td></td> <td>$msg</td></tr>";
                }
                ?>

                <tr>
                    <td>
                        Kode Pegawai
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <input type="text" name="kode" size="10">
                    </td>
                </tr>
                <tr>
                    <td>
                        Nama
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <input type="text" name="nama">
                    </td>
                </tr>
                <tr>
                    <td>
                        Umur
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <select name="umur">
                            <?php
                            for ($i = 20; $i <= 50; $i++) {
                                echo "<option value'" . $i . "'>" . $i . "</option>";
                            }
                            ?>
                        </select> Tahun
                    </td>
                </tr>
                <tr>
                    <td>
                        Golongan
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <select name="golongan">
                            <?php
                            for ($char = "A"; $char <= "Z"; $char++) {
                                echo "<option value'" . $char . "'>" . $char . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Gaji
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <input type="text" name="gaji">
                    </td>
                </tr>
                <tr>
                    <td>
                        Alamat
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <input type="text" name="alamat">
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="simpan" value="Simpan">
                        <input type="reset" name="simpan" value="Reset">
                    </td>
                </tr>
            </table>
        </fieldset>

    </form>
</body>
</html>