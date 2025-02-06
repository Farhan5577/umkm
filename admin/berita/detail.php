<?php
include('./../../koneksi.php');

if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    $data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM berita WHERE slug = '$slug'"));
    if (!$data) {
        return header('location:/admin/berita');
    }
} else {
    return header('location:/admin/berita');
}

require('./../must_login.php');
include('./../component/header.php');
include('./../component/sidebar.php');

?>
<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1><?= $data['judul'] ?></h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>/admin/berita/">Berita</a></li>
                    <li class="breadcrumb-item active">Detail Berita</li>
                </ol>
            </nav>
        </div>
        <!-- <a href="<?= baseUrl(); ?>/admin/berita/tambah.php" class="btn btn-primary mb-4">Tambah Data</a> -->
    </div>

    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <img src="<?= baseUrl(); ?>admin/berita/uploads/<?= $data['image'] ?>" alt="" class="img-fluid img-thumbnail">
            </div>
            <div class="col-12">
                <div class="text-center fw-bold fs-2 my-4">
                    <?= $data['judul'] ?>
                </div>
                <div>
                    <?= $data['isi'] ?>
                </div>
            </div>
        </div>
    </section>

</main>
<?php include('./../component/footer.php') ?>