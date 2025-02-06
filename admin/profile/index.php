<?php
include('./../../koneksi.php');



$data = mysqli_fetch_assoc(mysqli_query($connect, 'SELECT * FROM profil'));

require('./../must_login.php');
include('./../component/header.php');
include('./../component/sidebar.php');

?>
<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Management profil</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= baseUrl() ?>admin">Home</a></li>
                    <li class="breadcrumb-item active">profil</li>
                </ol>
            </nav>
        </div>

    </div>

    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-12 text-end">
                <a class="btn btn-lg btn-warning" href="<?= baseUrl(); ?>admin/profile/edit.php">Edit</a>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold fs-3">Foto Sambutan</label>
                    <img src="<?= baseUrl() ?>admin/profile/uploads/<?= $data['foto_sambutan'] ?>" alt="" class="img-fluid img-thumbnail">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="judul" class="form-label fw-bold fs-3">Judul sambutan Ketua MDMC </label>
                    <div>
                        <?= $data['judul_sambutan'] ?>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="judul" class="form-label fw-bold fs-3">isi sambutan ketua MDMC </label>
                    <div>
                        <?= $data['isi_sambutan'] ?>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <div class="fw-bold fs-3">isi sejarah MDMC </div>
                    <div>
                        <?= $data['isi_sejarah'] ?>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <div class="fw-bold fs-3">visi MDMC </div>
                    <div>
                        <?= $data['visi'] ?>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <div class="fw-bold fs-3">misi MDMC </div>
                    <div>
                        <?= $data['misi'] ?>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <div class="fw-bold fs-3">program kerja</div>
                    <div>
                        <?= $data['program_kerja'] ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php include('./../component/footer.php') ?>