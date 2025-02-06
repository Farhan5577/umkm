<?php
include('./../../koneksi.php');
if (count($_POST) > 0) {

    date_default_timezone_set('Asia/Jakarta');
    $extension =  explode('/', $_FILES['image']['type'])[1];
    $name = time() . '.' . $extension;

    $judul = $_POST['judul'];
    $slug = implode('-', explode(" ", strtolower($judul)));
    $isi = nl2br($_POST['isi']);
    $created_at = date('Y-m-d H:i:s', time());
    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $name);
    $query = mysqli_query($connect, "INSERT INTO berita values(NULL,'$judul','$slug','$isi','$name','$created_at')");
    if ($query) {
        echo "<script>alert('Data berhasil ditambah') ; window.location.href='http://localhost/umkm/admin/berita'</script>";
    } else {
        mysqli_error($connect);
        die;
    }
}
require('./../must_login.php');
include('./../component/header.php');
include('./../component/sidebar.php');

$data = mysqli_fetch_assoc(mysqli_query($connect, 'SELECT * FROM berita ORDER BY created_at DESC'));

?>
<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Tambah Berita</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin/berita/">Berita</a></li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </nav>
        </div>
        <!-- <a href="<?= baseUrl(); ?>admin/berita/tambah.php" class="btn btn-primary mb-4">Tambah Data</a> -->
    </div>

    <!-- End Page Title -->

    <section class="section dashboard">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-4">

                    <img src="" alt="" class="img-fluid target-preview d-none">
                    <div class="mb-4">

                        <label for="image" class="form-label">Upload Gambar</label>
                        <input accept="image/*" onchange="previewImage(this,'.target-preview')" required class="form-control" name="image" type="file" id="image">
                    </div>


                </div>
                <div class="col-lg-8">
                    <div class="mb-4">

                        <label for="judul" class="form-label">Judul</label>
                        <input required type="text" name="judul" class="form-control" id="judul">
                    </div>
                    <div class="mb-4">

                        <label for="isi" class="form-label">Isi</label>
                        <textarea class="form-control" name="isi" id="isi" rows="10" required></textarea>
                    </div>
                </div>

                <div class="col-12">
                    <a href="<?= baseUrl(); ?>admin/berita" class="btn btn-warning me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>

        </form>
    </section>

</main>

<?php include('./../component/footer.php') ?>