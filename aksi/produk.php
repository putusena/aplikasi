<?php
session_start();
include "../koneksi.php";
include "../function.php";

if ($_POST) {
    if ($_POST['aksi'] == 'tambah') {
        $barcode = $_POST['barcode'];
        $namaproduk = $_POST['namaproduk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        
        $sql="INSERT INTO produk (produkid,barcode,namaproduk,harga,stok) VALUES(DEFAULT,'$barcode','$namaproduk','$harga','$stok')";

        mysqli_query($koneksi,$sql);
        notifikasi($koneksi);
        header('location:../index.php?p=produk');
    }
    else if($_POST['aksi']=='ubah'){
        $produkid=$_POST['produkid'];
        $barcode=$_POST['barcode'];
        $namaproduk=$_POST['namaproduk'];
        $harga=$_POST['harga'];
        $stok=$_POST['stok'];

        $sql = "UPDATE produk SET barcode='$barcode', namaproduk='$namaproduk', harga='$harga', stok='$stok' WHERE produkid=$produkid";

        mysqli_query($koneksi, $sql);
        notifikasi($koneksi);
        header('location:../index.php?p=produk');
    }
}

if ($_GET) {
    if ($_GET['aksi'] == 'hapus') {
        $produkid = $_GET['produkid'];
        $sql = "DELETE FROM produk WHERE produkid=$produkid";

        mysqli_query($koneksi, $sql);
        notifikasi($koneksi);
        header('location:../index.php?p=produk');
}
}
?>
