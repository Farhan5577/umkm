<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function baseUrl()
{
    $root = getenv('HTTP_HOST');
    $namaFolder = 'umkm';
    return 'http://' . $root . '/' . $namaFolder . '/';
}

if (!isset($_SESSION['status'])) {
    header('location:' . baseUrl() . 'login.php?pesan=belum_login');
}
