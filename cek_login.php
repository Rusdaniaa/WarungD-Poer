<?php
include 'koneksi.php';

session_start();


    $email = $_POST["txt_email"];
    $pass = $_POST['txt_pass'];

    /*
    $emailCheck = mysqli_real_escape_string($koneksi, $email);
    %passCheck= mysqli_real_escape_string($koneksi, $pass);
    */

    
    $query = mysqli_query($konek, "SELECT *FROM user WHERE email = '$email'AND user_password='$pass'");
    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($query);
    if($cek > 0){
            // cek jika user login sebagai admin
        $data = mysqli_fetch_assoc($query);
            if($data['user_level']=="admin"){
            // buat session login dan username
            $_SESSION['email'] = $email;
            $_SESSION['user_level'] = "admin";
            // alihkan ke halaman dashboard admin
            header("location:home.php");

            // cek jika user login sebagai pegawai
        }else if($data['user_level']=="kasir"){
            // buat session login dan username
            $_SESSION['email'] = $email;
            $_SESSION['user_level'] = "kasir";
            // alihkan ke halaman dashboard pegawai
            header("location:kasir.php");

        }else if($data['user_level']=="waiters"){
            // buat session login dan username
            $_SESSION['email'] = $email;
            $_SESSION['user_level'] = "waiters";
            // alihkan ke halaman dashboard pegawai
            header("location:waiters.php");
        }else if($data['user_level']=="owner"){
            // buat session login dan username
            $_SESSION['email'] = $email;
            $_SESSION['user_level'] = "owner";
            // alihkan ke halaman dashboard pegawai
            header("location:owner.php");
        }else{

            // alihkan ke halaman login kembali
            header("location:login.php?pesan=gagal");
        }
    }else{
        header("location:home.php?pesan=gagal");
    }

    

?>