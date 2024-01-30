<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
include "../../koneksi.php";
//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 * @group html
 * @group rtl
 * @group pdf
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Arya Sena');
$pdf->setTitle('Laporan Produk');
$pdf->setSubject('Laporan Produk');
$pdf->setKeywords('APP Kasir, Laporan Produk');

// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'APP KASIR 1.0', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)


// create some HTML content
$html = '<p align="center"><strong><bold>Nota Penjualan</strong></b></p><br>
<table style="width:100%; border-collapse:collapse; border: 1px solid black;" border="1"i>
    <tr style="font-weight:bold; text-align:center">
        <td style="width:10%;">No</td>
        <td style="width:20%;">Barcode</td>
        <td style="width:30%;">Nama Produk</td>
        <td style="width:20%;">Harga</td>
        <td style="width:10%;">Stock</td>
    </tr>
';

$sql_produk="SELECT * FROM produk";
$query=mysqli_query($koneksi,$sql_produk);
while($bayar=mysqli_fetch_array($query)){
    $html.='
    <tr>
        <td>'.$bayar['produkid'].'</td>
        <td>'.$bayar['barcode'].'</td>
        <td>'.$bayar['namaproduk'].'</td>
        <td>'.$bayar['harga'].'</td>
        <td>'.$bayar['stok'].'</td>
    </tr>
    ';
}

$html.='
</table>
<br><br>
-- Dicetak Pada : '.date('d-F-Y H:i:s').' --
';
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
$pdf->Output('laporan_peserta_didik.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
