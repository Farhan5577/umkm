<?php if ($_GET['view'] == 'main') : ?>
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Data UMKM</h2>
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
        <div class="container">
            <div class="row">


                <?php
                while ($row = mysqli_fetch_assoc($data)) :
                ?>
                    <div class="col-lg-4 col-md-6">

                        <a href="<?= baseUrl(); ?>umkm?view=show&umkm=<?= $row['link_umkm'] ?>" class="btn-sm m-1 btn btn-info">
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
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <!-- pebatas -->


        </section>
        <!-- End umkm Section -->
    </main>

<?php else : ?>

    <?php
    $umkm_id = $_GET['umkm'];
    $query = "SELECT * FROM umkm WHERE link_umkm = '$umkm_id'";
    $result = mysqli_query($connect, $query);
    $umkm_detail = mysqli_fetch_assoc($result);
    ?>
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Data UMKM</h2>
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


        <section id="umkm-detail" class="umkm-detail">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <img src="<?= baseUrl(); ?>admin/umkm/uploads/<?= $umkm_detail['foto_umkm'] ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <div class="card-body">
                            <h2 class="card-title"><?= $umkm_detail['nama_umkm'] ?></h2>
                            <p class="card-text"><?= $umkm_detail['deskripsi'] ?></p>
                            <p class="card-text">Total Produk<small class="text-body-secondary">
                                    <?php
                                    $total_produk_query = "SELECT COUNT(*) as total_produk FROM produk WHERE umkm_id = '{$umkm_detail['id_umkm']}'";
                                    $total_produk_result = mysqli_query($connect, $total_produk_query);
                                    $total_produk_data = mysqli_fetch_assoc($total_produk_result);
                                    echo $total_produk_data['total_produk'];
                                    ?>
                                </small></p>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <h3>Produk UMKM</h3>
                    </div>
                    <?php
                    $produk_query = "SELECT * FROM produk WHERE umkm_id = '{$umkm_detail['id_umkm']}'";
                    $produk_result = mysqli_query($connect, $produk_query);
                    while ($produk = mysqli_fetch_assoc($produk_result)) :
                    ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <img src="<?= baseUrl(); ?>admin/umkm/uploads/<?= $produk['foto'] ?>" class="card-img-top" alt="<?= $produk['nama'] ?>" style="aspect-ratio: 1 / 1; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $produk['nama'] ?></h5>
                                    <p class="card-text"><?= $produk['deskripsi'] ?></p>

                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    </main>

<?php endif; ?>