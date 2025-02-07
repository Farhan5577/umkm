<?php
include('./../../koneksi.php');
require('./../must_login.php');
include('./../component/header.php');
include('./../component/sidebar.php');
if (count($_POST) > 0) {

    date_default_timezone_set('Asia/Jakarta');
    $extension =  explode('/', $_FILES['image']['type'])[1];
    $name = time() . '.' . $extension;


    $nama_umkm = $_POST['nama_umkm'];
    $deskripsi = nl2br($_POST['deskripsi']);
    $link_umkm = $_POST['link_umkm'];
    $pemilik_umkm = $_POST['pemilik_umkm'];

    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $name);
    $query = mysqli_query($connect, "INSERT INTO umkm (nama_umkm, foto_umkm, deskripsi, link_umkm, pemilik_umkm) 
 VALUES ('$nama_umkm', '$name', '$deskripsi', '$link_umkm', '$pemilik_umkm')");

    if ($query) {
        echo "<script>alert('Data berhasil ditambah') ; window.location.href='http://localhost/umkm/admin/umkm'</script>";
    } else {
        mysqli_error($connect);
        die;
    }
}


$dataUserUmkm  = mysqli_query($connect, " SELECT * 
    FROM user 
    WHERE username != 'admin' 
    AND username NOT IN (SELECT pemilik_umkm FROM umkm)");



// $link_umkm = ['palestina', 'kunjungan', 'holiday', 'posko'];
$data = mysqli_fetch_assoc(mysqli_query($connect, 'SELECT * FROM umkm'));

?>
<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Tambah UMKM</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin/umkm/">UMKM</a></li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </nav>
        </div>
        <!-- <a href="admin/umkm/tambah.php" class="btn btn-primary mb-4">Tambah Data</a> -->
    </div>

    <!-- End Page Title -->

    <section class="section dashboard">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-4">

                    <img src="<?= baseUrl(); ?>" alt="" class="img-fluid target-preview d-none">
                    <div class="mb-4">

                        <label for="foto_umkm" class="form-label">
                            <ul></ul>upload gambar
                        </label>
                        <input accept="image/*" onchange="previewImage(this,'.target-preview')" required class="form-control" name="image" type="file" id="image">
                    </div>


                </div>
                <div class="col-lg-8">
                    <div class="mb-4">

                        <label for="nama_umkm" class="form-label">nama umkm</label>
                        <input required type="text" name="nama_umkm"
                            onkeyup="getAndSetvalue(this,'.target-link-umkm')"
                            class="form-control" id="nama_umkm">
                    </div>
                    <div class="mb-4">

                        <label for="deskripsi" class="form-label">deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="10" required></textarea>
                    </div>
                    <div class="mb-4">

                        <label for="link_umkm" class="form-label">link umkm</label>
                        <input required type="text" name="link_umkm" class="form-control target-link-umkm" id="link_umkm" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="pemilik_umkm" class="form-label">Pemilik UMKM</label>
                        <select name="pemilik_umkm" id="pemilik_umkm" class="form-control">
                            <option value="" selected disabled>Pilih Salah Satu</option>
                            <?php while ($user = mysqli_fetch_array($dataUserUmkm)) : ?>
                                <option value="<?= $user['username'] ?>"><?= $user['name'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                </div>

                <div class="col-12">
                    <a href="<?= baseUrl(); ?>admin/umkm" class="btn btn-warning me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>

        </form>
    </section>

</main>

<?php include('./../component/footer.php') ?>