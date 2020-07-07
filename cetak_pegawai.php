<?php
    include "koneksi.php";

    // QUERY UNTUK MENDAPATKAN KESELURUHAN ISI TABEL PEGAWAI
    $q = "SELECT * FROM pegawai";
    $r = mysqli_query($koneksi, $q);

    // PARAMETER FUNGSI DARI loadHtml-nya Dompdf adalah sebuah STRING
    $content = "
    <table width='390' border='1' style='border-collapse:collapse'>
        <tr>
            <td>No</td>
            <td>Kode</td>
            <td>Nama</td>
            <td>Umur</td>
            <td>Golongan</td>
            <td>Gaji</td>
            <td>Alamat</td>
        </tr>";
    $no = 1;
    while ($d = mysqli_fetch_array ($r)) {
        $content .= "
        <tr>
            <td>".$no."</td>
            <td>".$d['kode']."</td>
            <td>".$d['nama']."</td>
            <td>".$d['umur']."</td>
            <td>".$d['golongan']."</td>
            <td>".$d['gaji']."</td>
            <td>".$d['alamat']."</td>
        </tr>";
        $no++;
    }
    $content .= "</table>";

    if($_POST['format']=='1') {
        header("Content-type: application/x-msdownload");
        header("Content-Disposition: attachment; filename=Laporan_Pegawai.docx");
        header("Pragma: no-cache");
header("Expires: 0");
        echo $content;
    }
    elseif($_POST['format']=='2') {
        header("Content-type: application/x-msdownload");
        header("Content-Disposition: attachment; filename=Laporan_Pegawai.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo $content;
    }
    elseif($_POST['format']=='3') {
        require_once('dompdf/autoload.inc.php');

        // instantiate and use the dompdf class
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($content); 

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('LaporanPegawai-'.date('YmdHis').'.pdf');
    }
?>

