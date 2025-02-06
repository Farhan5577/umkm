<?php
include('./../../koneksi.php');
require('./../must_login.php');
include('./../component/header.php');
include('./../component/sidebar.php');
if (count($_POST) > 0) {

  
    $nama_lokasi = $_POST['nama_lokasi'];
    $lokasi = $_POST['lokasi'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $query = mysqli_query($connect, "INSERT INTO kontak values(NULL,'$nama_lokasi','$lokasi','$email','$telp')");
    if ($query) {
        echo "<script>alert('Data berhasil ditambah') ; window.location.href='http://localhost/umkm/admin/kontak'</script>";
    } else {
        mysqli_error($connect);
        die;
    }
}


$data = mysqli_fetch_assoc(mysqli_query($connect, 'SELECT * FROM kontak'));

?>
<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Tambah kontak</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin/kontak/">kontak</a></li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </nav>
        </div>
        <!-- <a href="<?= baseUrl(); ?>admin/kontak/tambah.php" class="btn btn-primary mb-4">Tambah Data</a> -->
    </div>

    <!-- End Page Title -->

    <section class="section dashboard">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-8">

                    <img src="" alt="" class="img-fluid target-preview d-none">
                    <div class="mb-4">

                        <label for="nama_lokasi" class="form-label">nama lokasi</label>
                        <input required type="text" name="nama_lokasi" class="form-control" id="nama_lokasi">
                    </div>


                </div>
                <div class="col-lg-8">
                    <div class="mb-4">

                        <label for="lokasi" class="form-label">alamat</label>
                        <input required type="text" name="lokasi" class="form-control" id="lokasi">
                    </div>
                    <div class="mb-4">

                        <label for="email" class="form-label">email</label>
                        <input type="email" class="form-control" name="email" id="email"  required></input>
                    </div>
                    <div class="mb-4">

                        <label for="telp" class="form-label">telepone</label>
                        <input type="number" class="form-control" name="telp" id="telp"  required></input>
                    </div>
                </div>

                <div class="col-12">
                    <a href="<?= baseUrl(); ?>admin/kontak" class="btn btn-warning me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>

        </form>
    </section>

</main>

<?php include('./../component/footer.php') ?>