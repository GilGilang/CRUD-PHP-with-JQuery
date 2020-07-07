<script src="jquery.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('#close').click(function() {
            $('form').hide("slow");
        });
    });
</script>

<table width='100%' border='0' cellpadding='1' cellspacing='1'>
    <tr>
        <td>
            <form name='lpegawai' method='POST' action='cetak_pegawai.php' target='_blank'>
                <fieldset>
                    <legend class='huruf'>&nbsp;<b>Form Filter Data Pegawai</b>&nbsp;&nbsp;</legend>&nbsp;
                    <div align="right"><img id="close" src="img/icons8-close-window-48.png" title="close" /></div>
                    <table border='0'>
                        <tr>
                            <td>Format Laporan</td>
                            <td>:</td>
                            <td>
                                <img src='img/word.png'>&nbsp;<input type='radio' name='format' value='1' class='input'>&nbsp;&nbsp;Microsoft Word
                                <br>
                                <img src='img/excel.png'>&nbsp;<input type='radio' name='format' value='2' class='input'>&nbsp;&nbsp;Microsoft Excel
                                <br>
                                <img src='img/pdf.png'>&nbsp;<input type='radio' name='format' value='3' class='input' checked>&nbsp;&nbsp;PDF

                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><br><input type='submit' value='Print Data' class='button'></td>
                        </tr>
                        <tr>
                            <td colspan='3'>Catatan
                                <div align='justify'>
                                    <ol>
                                        <li>Untuk filter data akan disesuaikan dengan isian yang anda isikan pada field di atas</li>
                                        <li>Ketika anda klik Print Data, maka akan tampil jendela baru yang siap untuk dicetak</li>
                                    </ol>
                                </div>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </form>
        </td>
    </tr>
</table>