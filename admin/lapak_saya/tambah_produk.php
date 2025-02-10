<?php
include('./../../koneksi.php');
require('./../must_login.php');
include('./../component/header.php');
include('./../component/sidebar.php');
if (count($_POST) > 0) {

    date_default_timezone_set('Asia/Jakarta');
    $extension =  explode('/', $_FILES['image']['type'])[1];
    $name = time() . '.' . $extension;


    $judul = $_POST['judul'];
    $deskripsi = nl2br($_POST['deskripsi']);
    $kategori = $_POST['kategori'];
    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $name);
    $query = mysqli_query($connect, "INSERT INTO  galeri values(NULL,'$name','$judul','$deskripsi','$kategori')");
    if ($query) {
        echo "<script>alert('Data berhasil ditambah') ; window.location.href='http://localhost/umkm/admin/galeri'</script>";
    } else {
        mysqli_error($connect);
        die;
    }
}

$kategori = ['palestina', 'kunjungan', 'holiday', 'posko'];
$data = mysqli_fetch_assoc(mysqli_query($connect, 'SELECT * FROM galeri'));

?>
<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>tambah galeri</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin/galeri/">galeri</a></li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </nav>
        </div>
        <!-- <a href="admin/galeri/tambah.php" class="btn btn-primary mb-4">Tambah Data</a> -->
    </div>

    <!-- End Page Title -->

    <section class="section dashboard">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-4">

                    <img src="<?= baseUrl(); ?>" alt="" class="img-fluid target-preview d-none">
                    <div class="mb-4">

                        <label for="image" class="form-label">
                            <ul></ul>upload gambar
                        </label>
                        <input accept="image/*" onchange="previewImage(this,'.target-preview')" required class="form-control" name="image" type="file" id="image">
                    </div>


                </div>
                <div class="col-lg-8">
                    <div class="mb-4">

                        <label for="judul" class="form-label">judul</label>
                        <input required type="text" name="judul" class="form-control" id="judul">
                    </div>
                    <div class="mb-4">

                        <label for="deskripsi" class="form-label">deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="10" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="" disabled selected>pilih salah satu</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k ?>"><?= $k ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>

                <div class="col-12">
                    <a href="<?= baseUrl(); ?>admin/galeri" class="btn btn-warning me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>

        </form>
    </section>

</main>

<?php include('./../component/footer.php') ?>