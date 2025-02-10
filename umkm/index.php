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
    <?php while ($row = mysqli_fetch_assoc($data)) : ?>
        <a href="/umkm/detail_umkm/index.php?id_umkm=<?= $row['id_umkm']; ?>">

            <!-- <div class="card" style="width: 50rem">
                <img src="<?= baseUrl(); ?>admin/umkm/uploads/<?= $row['foto_umkm'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $row['nama_umkm'] ?></h5>
                    <p class="card-text"><?= $row['deskripsi'] ?></p>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div> -->

            <!-- <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card">
                        <img src="<?= baseUrl(); ?>admin/umkm/uploads/<?= $row['foto_umkm'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['nama_umkm'] ?></h5>
                            <p class="card-text"><?= $row['deskripsi'] ?></p>
                        </div>
                    </div>
                </div> -->

            <div class="card mb-3" style="max-width: 100%; height: 40%;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= baseUrl(); ?>admin/umkm/uploads/<?= $row['foto_umkm'] ?>"
                            class="img-fluid rounded-start"
                            alt="..."
                            style="width: 250px; height: 200px; object-fit: cover;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['nama_umkm'] ?></h5>
                            <p class="card-text"><?= $row['deskripsi'] ?></p>
                            <p class="card-text"><small class="text-body-secondary"><?= $row['link_umkm'] ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </a>
    <?php endwhile; ?>
    <!-- pebatas -->
    </div>
    </section>
    <!-- End umkm Section -->
</main>
<?php include('./../component/footer.php') ?>