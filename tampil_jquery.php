<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Tampil Data JQuery</title>
    <script src="jquery.js" type="text/javascript"></script>
    <script>
        //KETIKA PERTAMA KALI DILOAD, MEMANGGIL FILE data_tabel.php DAN DIMASUKKAN KEDALAM div id = 'data'
        $(document).ready(function() {
            $('#data').load("data_tabel.php");

        });

        //FUNCTION UNTUK MENAMPILKAN FORM EDIT DATA DAN DIMASUKKAN KE div id = 'form'
        function edit_form(kode) {
            $.get('edit_jquery.php?kode=' + kode, null, function(data) {
                $('#form').html(data);
            });
            var thisPost = $('#forms').serialize();
            $.post(kode, thisPost, function(data) {
                $('#form').html(data);
            });

            return false;
        }


        //FUNCTION UNTUK MENAMPILKAN FORM TAMBAH DATA DAN DIMASUKKAN PADA div id = 'form'
        function tambah_form() {
            $.get('tambah_jquery.php', null, function(data) {
                $('#form').html(data);
            });
            $('#form').show("slow");

        }

        //FUNCTION MENGHAPUS DATA
        function delete_data(kode) {
            var pilih = confirm("Data yang akan di hapus adalah " + kode);
            if (pilih == true) {
                $.get('delete_jquery.php?kode=' + kode, null, function(data) {
                    $('#data').html(data);
                });
                location.reload(true);
            }
        }

        //FUNCTION UNTUK TAMBAH ATAU EDIT DATA
        function submitForm(url) {
            $('#data').load("data_tabel.php");
            var thisPost = $('#forms').serialize();
            $.post(url, thisPost, function(data) {
                $('#form').html(data);
            });
            $('#data').load("data_tabel.php");

            return false;
        }

        //FUNCTION UNTUK MENAMPILKAN FORM CETAK LAPORAN
        function tampilkan_form_cetak() {
            $.get(
                "tampil_laporan_pegawai.php", // url
                null, // data
                function(data) { // hasil dari request (callback)
                    $("#cetak-laporan").html(data);
                });
        }
    </script>
</head>

<body>
    <h3>Data Pegawai</h3>
    <a href="javascript:void(0)" onclick="tambah_form()">Tambah Baru</a>
    <div id="form"></div>
    <div id="data"></div>

    <!-- Area untuk menampilkan form cetak laporan -->
    <a href="javascript:void(0)" onClick="tampilkan_form_cetak()">Laporan Pegawai</a>
    <div id="cetak-laporan"></div>

</body>

</html>