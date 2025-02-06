<?php

require('./must_login.php');
include('./component/header.php');
include('./component/sidebar.php');
?>

<main id="main" class="main">
    <!-- 
        <div class="pagetitle">
            <h1>Home</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Home</li>
                </ol>
            </nav>
        </div> -->
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col">
                <div class="alert alert-success text-center">
                    <div class="fs-1">Selamat Datang <b><?= $_SESSION['data']['name'] ?></b></div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->


<?php include('./component/footer.php') ?>