<?php
include('./../../koneksi.php');
require('./../must_login.php');
include('./../component/header.php');
include('./../component/sidebar.php');
function br2nl($input)
{
    return preg_replace('/<br\s?\/?>/ius', "\n", str_replace("\n", "", str_replace("\r", "", htmlspecialchars_decode($input))));
}
if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    $data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM berita WHERE slug = '$slug'"));
    if (!$data) {
        return header('location:<?= baseUrl(); ?>admin/berita');
    }
    $text = br2nl($data['isi']);
} else {
    return header('location:<?= baseUrl(); ?>admin/berita');
}

if (count($_POST) > 0) {
    $id = $_POST['id'];
    $data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM berita WHERE id = $id"));
    if (!$data) {
        return header('location:<?= baseUrl(); ?>admin/berita');
    }

    date_default_timezone_set('Asia/Jakarta');

    if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
        $extension =  explode('/', $_FILES['image']['type'])[1];

        $name_image = time() . '.' . $extension;

        unlink('uploads/' . $data['image']); //menghapus file lama

        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $name_image); // mengupload file baru
    } else {
        $name_image = $_POST['old_image'];
    }

    $judul = $_POST['judul'];
    $slug = implode('-', explode(" ", strtolower($judul)));
    $isi = nl2br($_POST['isi']);
    $created_at = date('Y-m-d H:i:s', time());

    $query = mysqli_query($connect, "UPDATE berita SET judul = '$judul',slug='$slug',isi='$isi',image = '$name_image' WHERE id = $id");

    if ($query) {
        echo "<script>alert('Data berhasil diubah') ; window.location.href='http://localhost/umkm/admin/berita'</script>";
    } else {
        mysqli_error($connect);
        die;
    }
}


?>

<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Edit Berita</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>/admin/berita/">Berita</a></li>
                    <li class="breadcrumb-item active">Edit Data</li>
                </ol>
            </nav>
        </div>
        <!-- <a href="<?= baseUrl(); ?>/admin/berita/tambah.php" class="btn btn-primary mb-4">Tambah Data</a> -->
    </div>

    <!-- End Page Title -->

    <section class="section dashboard">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <div class="row">
                <div class="col-lg-4">

                    <img src="<?= baseUrl(); ?>admin/berita/uploads/<?= $data['image'] ?>" alt="" class="img-fluid target-preview mb-4">
                    <div class="mb-4">

                        <label for="image" class="form-label">Upload Gambar</label>
                        <input accept="image/*" onchange="previewImage(this,'.target-preview')" class="form-control" name="image" type="file" id="image">
                        <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                    </div>


                </div>
                <div class="col-lg-8">
                    <div class="mb-4">

                        <label for="judul" class="form-label">Judul</label>
                        <input required type="text" name="judul" class="form-control" id="judul" value="<?= $data['judul'] ?>">
                    </div>
                    <div class="mb-4">

                        <label for="isi" class="form-label">Isi</label>
                        <textarea class="form-control" name="isi" id="isi" rows="10" required><?= $text ?></textarea>
                    </div>
                </div>

                <div class="col-12">
                    <a href="<?= baseUrl(); ?>/admin/berita" class="btn btn-warning me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </div>

        </form>
    </section>

</main>
<?php include('./../component/footer.php') ?>