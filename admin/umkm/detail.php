<?php
include('./../../koneksi.php');
require('./../must_login.php');
include('./../component/header.php');
include('./../component/sidebar.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM umkm WHERE id_umkm = '$id'"));
    if (!$data) {
        return header('location:<?= baseUrl(); ?>admin/umkm');
    }
} else {
    return header('location:<?= baseUrl(); ?>admin/umkm');
}



?>
<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1><?= $data['nama_umkm'] ?></h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin/umkm/">umkm</a></li>
                    <li class="breadcrumb-item active">Detail umkm</li>
                </ol>
            </nav>
        </div>
        <!-- <a href="/admin/umkm/tambah.php" class="btn btn-primary mb-4">Tambah Data</a> -->
    </div>

    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <center><img src="<?= baseUrl(); ?>admin/umkm/uploads/<?= $data['foto_umkm'] ?>" alt="" class="img-fluid img-thumbnail"></center>
            </div>
            <div class="col-12">
                <div class="text-center fw-bold fs-2 mb-2 mt-4">
                    <?= $data['nama_umkm'] ?>
                </div>
                <div class="text-center  fs-5 opacity-50 mb-4">
                    <?= $data['link_umkm'] ?>
                </div>
                <div>
                    <?= $data['deskripsi'] ?>
                </div>
            </div>
        </div>
    </section>

</main>
<?php include('./../component/footer.php') ?>