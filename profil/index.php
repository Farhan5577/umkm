<?php session_start();
include('./../koneksi.php');
$row = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM profil WHERE id= 1"));

include('../component/header.php');

?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Profil</h2>
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Profil</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Story Intro Section ======= -->
    <section id="story-intro" class="story-intro overflow-hidden">
        <div class="container">
            <div class="row align-items-center">
                <div class="section-title" data-aos="fade-up">
                    <h2>Sambutan</h2>
                    <p>
                        <?= $row['judul_sambutan'] ?>
                    </p>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="<?= baseUrl(); ?>admin/profile/uploads/<?= $row['foto_sambutan'] ?>" class="img-fluid img-thumbnail" alt="" />
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <?= $row['isi_sambutan'] ?>
                </div>
            </div>
        </div>
    </section>
    <section class="overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-10 text-center">
                    <video src="<?= baseUrl() ?>assets/img/12.mp4" alt="" class="img-fluid rounded mb-5" data-aos="zoom-in-up" autoplay></video>
                    <img src="<?= baseUrl() ?>assets/img/12.mp4" alt="" class="img-fluid rounded mb-5" data-aos="zoom-in-up" />
                </div>

                <div class="col-12">
                    <?= $row['isi_sejarah'] ?>
                </div>
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#1d284b" fill-opacity="1" d="M0,32L60,53.3C120,75,240,117,360,138.7C480,160,600,160,720,160C840,160,960,160,1080,144C1200,128,1320,96,1380,80L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
    </svg>
    <section style="margin: -5px 0" class="bg-my-primary text-light overflow-hidden">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="section-title" data-aos="zoom-out-down">
                        <h2>visi</h2>
                    </div>

                    <p data-aos="fade-up" data-aos-delay="200">
                        <?= $row['visi'] ?>
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="section-title" data-aos="zoom-out-down">
                        <h2>misi</h2>
                    </div>
                    <ol type="1" data-aos="fade-up" data-aos-delay="200">
                        <?= $row['misi'] ?>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#1d284b" fill-opacity="1" d="M0,32L60,53.3C120,75,240,117,360,138.7C480,160,600,160,720,160C840,160,960,160,1080,144C1200,128,1320,96,1380,80L1440,64L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
    </svg>
    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="section-title" data-aos="fade-up">
                    <h2>Program Kerja Desa Margourip</h2>
                    <p>Membangun Masa Depan yang Lebih Maju</p>
                </div>
                <div class="col-12">
                    <?= $row['program_kerja'] ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End Members Section -->
</main>

<?php include('../component/footer.php') ?>