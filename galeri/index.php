<?php session_start();
include("./../koneksi.php");
$data = mysqli_query($connect, "SELECT * FROM galeri");
$kategori = ['palestina', 'kunjungan', 'holiday', 'posko'];
include('./../component/header.php') ?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Gallery</h2>
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Gallery</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="gallery-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <?php foreach ($kategori as $k) : ?>
                            <li data-filter=".filter-<?= $k ?>"><?= $k ?></li>

                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="row gallery-container">
                <?php
                while ($row = mysqli_fetch_assoc($data)) :
                ?>
                
                    <div class="col-lg-3 col-md-4 col-6 gallery-item filter-<?= $row['kategori'] ?>">
                        <div class="gallery-wrap shadow">
                            <img src="<?= baseUrl(); ?>admin/galeri/uploads/<?= $row['gambar'] ?>" class="img-fluid img-thumbnail" alt="judul" />
                            <div class="gallery-info">
                                <h4><?= $row['judul'] ?></h4>
                                <p><?= $row['deskripsi'] ?></p>
                                <div class="gallery-links">
                                    <a href="<?= baseUrl(); ?>admin/galeri/uploads/<?= $row['gambar'] ?>" class="glightbox" title="judul"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <!-- End Gallery Section -->
</main>
<?php include('./../component/footer.php') ?>