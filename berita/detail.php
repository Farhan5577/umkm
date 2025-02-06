<main>
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2><?= $row['judul'] ?></h2>
                <ol>
                    <li><a href="<?= baseUrl(); ?>">Home</a></li>
                    <li><a href="<?= baseUrl(); ?>berita">Semua Berita</a></li>
                    <li>Detail berita</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Event List Section ======= -->
    <section id="event-list" class="event-list overflow-hidden">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-lg-6 col-md-8">
                    <img src="<?= baseUrl(); ?>admin/berita/uploads/<?= $row['image'] ?>" alt="" class="img-fluid img-thumbnail">
                </div>
                <div class="col-12">
                    <div class="text-center fw-bold fs-2 my-4">
                        <?= $row['judul'] ?>
                    </div>
                    <div>
                        <?= $row['isi'] ?>
                    </div>
                </div>
            </div>

            <?php if ($data->num_rows > 0) : ?>
                <div class="section-title mt-5" data-aos="fade-up">
                    <h2>Berita Lainnya</h2>
                    <?php include('./other.php'); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- End Event List Section -->
</main>