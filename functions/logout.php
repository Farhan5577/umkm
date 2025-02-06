<?php
function baseUrl(){
    $root = getenv('HTTP_HOST');
    $namaFolder = 'umkm';
    return 'http://'.$root.'/'.$namaFolder.'/';
}


// mengaktifkan session
session_start();

if ($_SESSION['status'] == 'login') {

    // menghapus semua session
    session_destroy();

    // mengalihkan halaman sambil mengirim pesan logout
    header("location:".baseUrl());
} else {
    header("location:".baseUrl()."login.php");
}
