<?php session_start();
include('./../koneksi.php');
$data =mysqli_query($connect, "SELECT * FROM kontak");
include('./../component/header.php');

// var_dump($data);
// die;

?>
<main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Kontak Kami</h2>
                <ol>
                    <li><a href="<?= baseUrl() ?>">Home</a></li>
                    <li>Kontak Kami</li>
                </ol>
            </div>
        </div>
    </section>

    <section id="contact-us" class="contact-us">
        <div class="container"> 
          <div class="row justify-content-center" >

      
            <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.4287549797474!2d112.1629873!3d-7.9594821!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78f3edaeb953c5%3A0x16de621caa8cba61!2sKantor%20Balai%20Desa%20Margourip!5e0!3m2!1sen!2sid!4v1706900000000" style="border: 0; width: 100%; height: 270px" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <!-- dari sini -->
            <h1 class="text-center my-4" >Cabang Kami</h1>
          <?php if ($data->num_rows > 0) : ?>
            <div class="accordion accordion-flush mb-4" id="accordionFlushExample" >
            <?php while ($row = mysqli_fetch_assoc($data)) : ?>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button style="background-color: lightgray ;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?= $row['id'] ?>" aria-expanded="false" aria-controls="flush-collapse<?= $row['id'] ?>">
                    <?= $row['nama_lokasi'] ?>
                    </button>
                  </h2>
                  <div id="flush-collapse<?= $row['id'] ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      <div class="row mt-5">
                        <div class="col-lg-5 col-md-4">
                         <div class="info">
                           <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Lokasi:</h4>
                              <p>
                              <?= $row['lokasi'] ?>
                              </p>
                           </div>

                            <div class="email">
                              <i class="bi bi-envelope"></i>
                              <h4>Email:</h4>
                              <p><?= $row['email'] ?></p>
                           </div>

                            <div class="phone">
                              <i class="bi bi-phone"></i>
                              <h4>Telp:</h4>
                              <p><?= $row['telp'] ?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endwhile; ?>
              </div>
          <?php else : ?>
                <div class="text-center">
                    Data masih kosong
                </div>
          <?php endif; ?>
              <div class="col-lg-7 col-md-8 mt-5 mt-lg-0 justify-content-center align-items-center d-flex flex-column">
                  <div class="display-5 text-center fw-bold mb-5">
                    Hubungi Kami secara langsung !!!
                  </div>
                  <div class="row text-center">
                    <div class="col-6">
                      <a style="white-space: nowrap" href="mailto:farhan.muh5@gmail.com" class="btn btn-danger btn-large">
                        <i class="bi bi-envelope"></i><br />Kirim Surel</a>
                    </div>
                    <div class="col-6">
                      <a style="white-space: nowrap" href="https://wa.me/628989139960" class="btn btn-success btn-large">
                        <i class="bi bi-telephone"></i><br />Klik Disini</a>
                    </div>
                  </div>
              </div>
            </div>
            </div>
            <!-- disini -->
        </div>
    </section>
    <!-- End Contact Us Section -->
</main>
<?php include('./../component/footer.php') ?>