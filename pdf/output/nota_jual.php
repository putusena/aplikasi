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
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Arya Sena');
$pdf->setTitle('Nota Penjualan');
$pdf->setSubject('Nota Penjualan');
$pdf->setKeywords('App Kasir, Nota Penjualan');

// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'APP Kasir 1.0', PDF_HEADER_STRING);

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

$PenjualanID=$_GET['PenjualanID'];
$sql1="SELECT penjualan.*,pelanggan.NamaPelanggan
FROM penjualan,pelanggan WHERE penjualan.
PelangganID=pelanggan.PelangganID AND penjualan.
PenjualanID=$PenjualanID";
$query1=mysqli_query($koneksi,$sql1);
$penjualan=mysqli_fetch_array($query1);
// create some HTML content
$html = '
<p align="center"><strong><bold>Nota Penjualan</strong></b></p><br>
<table style="width:100%">
<tr>
    <td style="width:25%">No Transaksi</td>
    <td  style="width:25%">: '.$penjualan['PenjualanID'].'</td>
    <td  style="width:25%">Tanggal Transaksi</td>
    <td  style="width:25%">: '.$penjualan['TanggalPenjualan'].'</td>
</tr>
<tr>
    <td  style="width:25%">Nama Pelanggan</td>
    <td  style="width:25%">: '.$penjualan['NamaPelanggan'].'</td>
    <td  style="width:25%">Total Belanja</td>
    <td  style="width:25%">: Rp. '.number_format($penjualan['TotalHarga']).'</td>
</tr>
</table>
<br><br> 
<table style="width:100% border-collapse:collapse;border: 1px solid black;" border="1">
    <tr style="font-weight:bold; text-align:center;">
        <td style="width:5%;">No</td>
        <td style="width:45%;">Produk</td>
        <td style="width:15%;">Harga</td>
        <td style="width:15%;">Jumlah</td>
        <td style="width:20%;">Subtotal</td>
    </tr>
';



$no=0;
    $total_item=0;
    $total_belanja=0;
    $sql2="SELECT detailpenjualan.*,produk.namaproduk,produk.barcode FROM detailpenjualan,produk WHERE detailpenjualan.ProdukID=produk.ProdukID AND detailpenjualan.PenjualanID=$PenjualanID";
    $query2=mysqli_query($koneksi,$sql2);
    while($data=mysqli_fetch_array($query2)){
        $no++;
        $subtotal=$data['JumlahProduk']*$data['harga'];
        $total_item=$total_item+$data['JumlahProduk'];
        $total_belanja=$total_belanja+$subtotal;
    $html.='
    <tr>
        <td>'.$no.'</td>
        <td>'.$data['namaproduk'].'</td>
        <td>'.number_format($data['harga']).'</td>
        <td>'.$data['JumlahProduk'].'</td>
        <td align="right">'.number_format($subtotal).'</td>
    </tr>
    ';
}

$html.='
<tr>
    <td colspan="4" align="center"><b>Grandtotal</b></td>
    <td align="right"><b>'.number_format($total_belanja).'</b></td>
</tr>
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
