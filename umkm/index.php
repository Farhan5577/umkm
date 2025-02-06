<?php session_start();
include("./../koneksi.php");
$data = mysqli_query($connect, "SELECT * FROM umkm");
// $kategori = ['palestina', 'kunjungan', 'holiday', 'posko'];
include('./../component/header.php') ?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Data umkm</h2>
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>umkm</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->
    <!-- ======= umkm Section ======= -->
    <center>
        <h2>Daftar UMKM</h2>
    </center>
    <?php
    while ($row = mysqli_fetch_assoc($data)) :
    ?>
    <a href="<?= baseUrl(); ?>emping/index.php?id=<?= $row['id'] ?>" class="btn-sm m-1 btn btn-info">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?= baseUrl(); ?>admin/umkm/uploads/<?= $row['foto_umkm'] ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title"><?= $row['nama_umkm'] ?></h2>
                        <p class="card-text"><?= $row['deskripsi'] ?></p>
                        <p class="card-text"><small class="text-body-secondary"></small></p>
                    </div>
                </div>
            </div>
        </div>
        </a>
    <?php endwhile; ?>
    <!-- pebatas -->

    <div class="row umkm-container">
        <?php
        while ($row = mysqli_fetch_assoc($data)) :
        ?>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    </div>
    </section>
    <!-- End umkm Section -->
</main>
<?php include('./../component/footer.php') ?>