<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include './../koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($connect, "select * from user where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_fetch_assoc($data);

function baseUrl(){
    $root = getenv('HTTP_HOST');
    $namaFolder = 'umkm';
    return 'http://'.$root.'/'.$namaFolder.'/';
}


if ($cek > 0) {
    $_SESSION['data'] = ['username' => $username, 'name' => $cek['name']];
    $_SESSION['status'] = "login";

    header("location:".baseUrl()."admin");
} else {
    header("location:".baseUrl()."login.php?pesan=gagal");
}
