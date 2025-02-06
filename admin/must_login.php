<?php
function baseUrl(){
    $root = getenv('HTTP_HOST');
    $namaFolder = 'umkm';
    return 'http://'.$root.'/'.$namaFolder.'/';
}
session_start();

if (!isset($_SESSION['status'])) {
    header('location:'.baseUrl().'login.php?pesan=belum_login');
}
