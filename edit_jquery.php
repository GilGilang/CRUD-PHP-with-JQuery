<?php

include './koneksi.php';

$msg = '';

//MENGAMBIL DATA PEGAWAI YANG AKAN DI EDIT
if (array_key_exists('kode', $_GET)) {
    $q = "SELECT * FROM pegawai WHERE kode = '" . $_GET['kode'] . "'";
    $r = mysqli_query($koneksi, $q) or die($q);
    $d = mysqli_fetch_array($r);
}

//PROSES PENYIMPANAN UPDATE
if (array_key_exists('kode', $_POST)) {
    $kode = $_POST['kode'];
    if ($kode != '') {
        $nama = $_POST['nama'];
        $umur = $_POST['umur'];
        $golongan = $_POST['golongan'];
        $gaji = $_POST['gaji'];
        $alamat = $_POST['alamat'];

        $q = "UPDATE pegawai SET kode = '" . $kode . "', nama = '" . $nama . "', umur = '" . $umur . "', golongan = '" . $golongan . "', gaji = '" . $gaji . "', alamat = '" . $alamat . "'"
            . "WHERE kode = '" . $kode . "'";
        $r = mysqli_query($koneksi, $q) or die(mysqli_error($koneksi));

        if ($r) {
            echo '<script>alert("Data Berhasil Diedit");</script>';
            echo '<script>window.close();</script>';
            echo '<script>location.reload(true);</script>';
        } else {
            $msg = "Data Tidak Berhasil Diedit";
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
    <form id="forms" method="POST" onsubmit="return edit_form('edit_jquery.php')">
        <fieldset>
            <legend>Form Edit Pegawai</legend>
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
                        <input type="text" name="kode" size="10" value='<?php echo $d[0]; ?>'>
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
                        <input type="text" name="nama" value='<?php echo $d[1]; ?>'>
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
                                echo "<option value'" . $i . "' ";
                                if ($d[2] == $i) echo "selected";
                                echo ">" . $i . "</option>";
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
                                echo "<option value'" . $char . "' ";
                                if ($d[3] == $char) echo "selected";
                                echo ">" . $char . "</option>";
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
                        <input type="text" name="gaji" value='<?php echo $d[4]; ?>'>
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
                        <input type="text" name="alamat" value='<?php echo $d[5]; ?>'>
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="simpan" value="Simpan">
                    </td>
                </tr>
            </table>
        </fieldset>

    </form>
</body>

</html>