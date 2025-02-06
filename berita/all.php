<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Portal Berita</h2>
                <ol>
                    <li><a href="<?= baseUrl(); ?>/">Home</a></li>
                    <li>Berita</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Event List Section ======= -->
    <section id="event-list" class="event-list overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <?php if ($data->num_rows > 0) : ?>
                    <?php while ($row = mysqli_fetch_assoc($data)) : ?>
                        <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
                            <div class="card shadow cursor-pointer" onclick="window.location.href='<?= baseUrl(); ?>/berita?detail=<?= $row['slug'] ?>'">
                                <div class="card-img">
                                    <img class="img-thumbnail" src="<?= baseUrl(); ?>/admin/berita/uploads/<?= $row['image'] ?>" alt="<?= $row['judul'] ?>" />
                                </div>
                                <div class="card-body shadow-none">
                                    <h5 class="card-title"><?= $row['judul'] ?></h5>
                                    <p class="fst-italic text-center"><?= $row['created_at'] ?></p>
                                    <p class="card-text over_flow">
                                        <?= $row['isi'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <div class="text-center">
                        Data masih kosong
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- End Event List Section -->
</main>