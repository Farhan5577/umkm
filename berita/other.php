<div class="row justify-content-center">

    <?php while ($row = mysqli_fetch_assoc($data)) : ?>
        <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
            <div class="card shadow cursor-pointer" onclick="window.location.href='<?= baseUrl(); ?>/berita?detail=<?= $row['slug'] ?>'">
                <div class="card-img">
                    <img class="img-thumbnail" src="<?= baseUrl(); ?>admin/berita/uploads/<?= $row['image'] ?>" alt="<?= $row['judul'] ?>" />
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

</div>