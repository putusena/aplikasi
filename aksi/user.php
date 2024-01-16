<?php
session_start();
include "../koneksi.php";
include "../function.php";

if($_POST){
    if($_POST['aksi']=='tambah'){
        $nama=$_POST['nama'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $hak_akses=$_POST['hak_akses'];

        $sql="INSERT INTO user (id_user,nama,username,password,hak_akses) VALUES(DEFAULT,'$nama','$username','$password','$hak_akses')";

        mysqli_query($koneksi,$sql);
        notifikasi($koneksi);
        header('location:../index.php?p=user');
    }
    else if($_POST['aksi']=='ubah'){
        $id_user=$_POST['id_user'];
        $nama=$_POST['nama'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $hak_akses=$_POST['hak_akses'];

        $sql="UPDATE user SET nama='$nama', username='$username', password='$password', hak_akses='$hak_akses' WHERE id_user=$id_user";

        mysqli_query($koneksi,$sql);
        notifikasi($koneksi);
        header('location:../index.php?p=user');
    }
    else if($_POST['aksi']=='login'){
        $username=$_POST['username'];
        $password=$_POST['password'];

        $sql="SELECT * FROM user WHERE username='$username' AND password='$password'";
        $query=mysqli_query($koneksi,$sql);
        $ketemu=mysqli_num_rows($query);
        if($ketemu>=1){
            $user=mysqli_fetch_array($query);
            $_SESSION['user']=$user['username'];
            $_SESSION['nama']=$user['nama'];
            $_SESSION['id']=$user['id_user'];
            $_SESSION['akses']=$user['hak_akses'];
            if($user['hak_akses']==1){
                $_SESSION['menu']="Administrator";
            } else {
                $_SESSION['menu']="Petugas";
            }
            
            $_SESSION['status_proses']='';

            header("location:../index.php");
        } else {
            header("location:../login.php?msg=err");
        }
    }
}

if($_GET){
    if ($_GET['aksi']=='hapus'){
        $id_user=$_GET['id_user'];
        $sql="DELETE FROM user WHERE id_user=$id_user"; // Hard Delete
        mysqli_query($koneksi,$sql);
        notifikasi($koneksi);
        header('location:../index.php?p=user');
    }

}

?> 