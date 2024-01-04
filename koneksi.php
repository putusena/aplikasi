<?php

$server='localhost';
$user='root';
$password='';
$db='kasir';

$koneksi=mysqli_connect($server,$user,$password,$db); // Koneksi Secara Prosedural
$mysqli= new mysqli($server,$user,$password,$db); // OOP
$mysqli->select_db($db);
$mysqli->query("SET NAMES 'utf8'");
$database=$db;

if($koneksi){
    // echo "Koneksi Sukses";
} else {
    echo "Koneksi Gagal";
    echo "<br>".mysqli_connect_error();
}
?>