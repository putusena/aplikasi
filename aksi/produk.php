<?php
session_start();
include "../koneksi.php";
include "../function.php";

if ($_POST) {
    if ($_POST['aksi'] == 'tambah') {
        $namaproduk = $_POST['namaproduk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        
        $sql = "INSERT INTO produk (namaproduk, harga, stok) VALUES ('$namaproduk', '$harga', '$stok')";

        mysqli_query($koneksi, $sql);
        notifikasi($koneksi);
        header('location:../index.php?p=produk');
    } else if ($_POST['aksi'] == 'ubah') {
        $produkid = $_POST['produkid'];
        $namaproduk = $_POST['namaproduk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $sql = "UPDATE produk SET namaproduk='$namaproduk', harga='$harga', stok='$stok' WHERE produkid=$produkid";

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
