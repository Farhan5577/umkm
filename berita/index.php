<?php
session_start();
include('./../koneksi.php');

if (isset($_GET['detail'])) {
    $slug = $_GET['detail'];
    $row = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM berita WHERE slug= '$slug'"));

    $data = mysqli_query($connect, "SELECT * FROM berita  WHERE slug != '$slug' ORDER BY created_at DESC");
    if (!$row) {
        return header('location:/berita');
    }

    include('./../component/header.php');
    include('./detail.php');
} else {
    $data = mysqli_query($connect, 'SELECT * FROM berita ORDER BY created_at DESC');
    if (!$data) {
        return  header('location:/berita');
    }
    include('./../component/header.php');
    include('./all.php');
}
include('./../component/footer.php');
