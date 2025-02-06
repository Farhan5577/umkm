<?php session_start();
include("./../koneksi.php");
$data = mysqli_query($connect, "SELECT * FROM umkm");
include('./../component/header.php');
?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>emping</h2>
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>umkm</li>
                    <li>emping</li>
                </ol>
            </div>
        </div>
    </section>

    <!-- End Breadcrumbs -->

    <!-- ======= Story Intro Section ======= -->

    <div class="card mb-3">
  <img src="<?= baseUrl(); ?>admin/umkm/uploads/<?= $row['foto_umkm'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
  </div>
</div>


    <!-- data ke bawah -->

    <!-- End Members Section -->
</main>

<?php include('../component/footer.php') ?>