<?php
// MENGAKTIFKAN SESSION
session_start();

// KONEKSI KE DATABASE
include ("koneksi.php");
// MENGAMBIL NILAI DARI FORM
$user = $_POST['username'];
$pass = $_POST['pass'];

// MENGAMBIL DATA DI DATABASE
$query = "SELECT * FROM user WHERE username = '$user' AND password = '$pass'";
$sql = mysqli_query($koneksi,$query);
// MENGE CEK DATA
$cek = mysqli_num_rows($sql);

if ($cek>0) {
    // REGISTER DATA USER
    $row = mysqli_fetch_array($sql);
    $_SESSION['user'] = $row['username'];
    $_SESSION['pass'] = $row['password'];
    $_SESSION['akses'] = true;

    header("location:index.php");
} else {
    header("location:login.php");
}

?>