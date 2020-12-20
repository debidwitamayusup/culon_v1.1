<?php
    // var_dump($arrData); 
    // die;
    tcpdf();
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $title = "SURAT PENGAJUAN CUTI PT. VICTORY CHING LUH INDONESIA";
    $obj_pdf->SetTitle($title);
    $obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $obj_pdf->SetFont('helvetica', '', 11);
    $obj_pdf->setFontSubsetting(false);
    $obj_pdf->AddPage();
    // ob_start();
        // we can have any view part here like HTML, PHP etc
        $tgl = date('d-m-Y');
        $content = '
        <html>
            <style>
                table, th, td {
                border: none;
                }
            </style>
            <p style="text-decoration:none; text-align:right;">Tangerang Selatan, '.$tgl.'</p>
            <p>Yth.<br>HR PT. Victory Ching Luh Indonesia<br>di Tempat</p>
            <br>
            <p>Saya yang bertanda tangan di bawah ini:</p>
            <table border:none>
                <tr>
                    <td style="width:15%;">NIK</td>
                    <td>: '.$arrData["dataKaryawan"]["nomorInduk"].'</td>
                </tr>
                <tr>
                    <td style="width:15%;">Nama</td>
                    <td>: '.$arrData["dataKaryawan"]["nama"].'</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>: '.$arrData["dataKaryawan"]["dataJabatan"]["namaJabatan"].'</td>
                </tr>
            </table>
            <br>
            <p>Mengajukan permohonan untuk tidak masuk kerja/cuti mulai:</p>
            <table border:none>
                <tr>
                    <td style="width:25%;">Taggal</td>
                    <td>: '.$arrData["dataCuti"]["startDate"].' sampai tanggal '.$arrData["dataCuti"]["endDate"].' ('.$arrData["dataCuti"]["durasiCuti"].' hari)</td>
                </tr>
                <tr>
                    <td>Nama Cuti</td>
                    <td>: '.$arrData["dataCuti"]["namaCuti"].'</td>
                </tr>
                <tr>
                    <td>Alasan</td>
                    <td>: '.$arrData["dataCuti"]["alasan"].'</td>
                </tr>
            </table>
            <br>
            <p>Surat ini merupakan bukti keabsahan permohonan cuti/ijin karena telah disetujui oleh pihak-pihak yang bersangkutan:</p>
            <table border:none>
                <tr style="text-align: center;">
                    <td>
                    Pemohon,<br><br><br><br>'.$arrData["dataKaryawan"]["nama"].'</td>
                    <td>Leader,<br><br><br><br>'.$arrData["dataKaryawan"]["dataLeader"]["namaLeader"].'</td>
                </tr>
                <tr style="text-align:center;">
                    <td colspan="2">
                    HRD,<br><br><br><br>Nama HRD
                    </td>
                </tr>
            </table>
        </html>

        ';
        // $content = ob_get_contents();
    // ob_end_clean();
    $obj_pdf->writeHTML($content, true, false, true, false, '');
    $obj_pdf->Output($arrData["dataKaryawan"]["nomorInduk"].'-Surat Cuti '.$arrData["dataCuti"]["namaCuti"].'.pdf', 'I');

?>