<?php
session_start();
include "../koneksi.php";
include "../function.php";

if ($_POST) {
  if($_POST['aksi']=="tambah-keranjang-bybarcode"){
    $id_user=$_SESSION['id'];
    $barcode=$_POST['barcode'];
    $jumlah=$_POST['jumlah'];

    //temukan produk berdasarkan barcode 
    $sql1="SELECT * FROM produk WHERE barcode=$barcode";
    $query1=mysqli_query($koneksi,$sql1);
    $produk=mysqli_fetch_array($query1);
    if(mysqli_num_rows($query1)>=1){
        //echo "produk ditemukan di database";
        $produkid=$produk['produkid'];
        // cek keranjang bila produk sudah ada hanya meng update jumlah, bila belum ada akan insert data
      $sql3="SELECT * FROM keranjang WHERE produkid=$produkid AND id_user=$id_user";
      $query3=mysqli_query($koneksi, $sql3);
      $duplikate=mysqli_num_rows($query3);
      if($duplikate==0){
        $sql2="INSERT INTO keranjang(keranjangid,produkid,jumlah,id_user) VALUES(DEFAULT, $produkid,$jumlah,$id_user)";
      } else{
        $sql2="UPDATE keranjang SET jumlah=jumlah+$jumlah WHERE produkid=$produkid AND id_user=$id_user";
      }

        mysqli_query($koneksi,$sql2);
        header('location:../index.php?p=tambah');
    } else {
        //echo "produk tidak ditemukan di database";
        header('location:../index.php?p=tambah&err=produk_tidak_ditemukan');
    }
  }
  else if($_POST['aksi']=='tambah-keranjang-bynama'){
    $produkid=$_POST['produkid'];
    $jumlah=$_POST['jumlah'];
    $id_user=$_SESSION['id'];

    $sql3="SELECT * FROM keranjang WHERE produkid=$produkid AND id_user=$id_user";
    $query3=mysqli_query($koneksi, $sql3);
    $duplikate=mysqli_num_rows($query3);
    if($duplikate==0){
      $sql2="INSERT INTO keranjang(keranjangid,produkid,jumlah,id_user) VALUES(DEFAULT, $produkid,$jumlah,$id_user)";
    } else{
      $sql2="UPDATE keranjang SET jumlah=jumlah+$jumlah WHERE produkid=$produkid AND id_user=$id_user";
    }

      mysqli_query($koneksi,$sql2);
      header('location:../index.php?p=tambah');
  } 
  // Simpan Penjualan 
  else if($_POST['aksi']=='simpan-penjualan'){
    $id_user=$_SESSION['id'];
    $PelangganID=$_POST['PelangganID'];
    $TanggalPenjualan=$_POST['TanggalPenjualan'];
    $TotalHarga=$_POST['TotalHarga'];

    $sql1="INSERT INTO penjualan(PenjualanID,TanggalPenjualan,TotalHarga,PelangganID) VALUES(Default,'$TanggalPenjualan',$TotalHarga,$PelangganID)";
    //echo $sql1;
   if(mysqli_query($koneksi,$sql1)){
    echo "Simpan penjualan sukses";
   }
  }
}

if ($_GET) {
    if ($_GET['aksi'] == 'hapus-keranjang') {
        $produkid = $_GET['produkid'];
        $id_user=$_SESSION['id'];
        $sql = "DELETE FROM keranjang WHERE produkid=$produkid AND id_user=$id_user";

        mysqli_query($koneksi, $sql);
        notifikasi($koneksi);
        header('location:../index.php?p=tambah');
}
}
?>