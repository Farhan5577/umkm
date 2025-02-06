<?php
include('./../../koneksi.php');
require('./../must_login.php');
include('./../component/header.php');
include('./../component/sidebar.php');
function br2nl($input)
{
    return preg_replace('/<br\s?\/?>/ius', "\n", str_replace("\n", "", str_replace("\r", "", htmlspecialchars_decode($input))));
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM galeri WHERE id = '$id'"));
    if (!$data) {
        return header('location:<?= baseUrl(); ?>admin/galeri');
    }
    $text = br2nl($data['deskripsi']);
} else {
    return header('location:<?= baseUrl(); ?>admin/galeri');
}

if (count($_POST) > 0) {
    $id = $_POST['id'];
    $data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM galeri WHERE id = '$id'"));
    if (!$data) {
        return header('location:<?= baseUrl(); ?>admin/galeri');
    }

    date_default_timezone_set('Asia/Jakarta');

    if (isset($_FILES['gambar']) && is_uploaded_file($_FILES['gambar']['tmp_name'])) {
        $extension =  explode('/', $_FILES['gambar']['type'])[1];

        $gambar = time() . '.' . $extension;

        unlink('uploads/' . $data['gambar']); //menghapus file lama

        move_uploaded_file($_FILES['gambar']['tmp_name'], 'uploads/' . $gambar); // mengupload file baru
    } else {
        $gambar = $_POST['old_gambar'];
    }


    $judul = $_POST['judul'];
    $deskripsi = nl2br($_POST['deskripsi']);
    $kategori = $_POST['kategori'];

    $query = mysqli_query($connect, "UPDATE galeri SET judul='$judul',kategori='$kategori',deskripsi='$deskripsi',gambar = '$gambar' WHERE id = $id");

    if ($query) {
        echo "<script>alert('Data berhasil diubah') ; window.location.href='http://localhost/umkm/admin/galeri'</script>";
    } else {
        mysqli_error($connect);
        die;
    }
}

$kategori = ['palestina', 'kunjungan', 'holiday', 'posko'];
?>

<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Edit galeri</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin/galeri/">galeri</a></li>
                    <li class="breadcrumb-item active">Edit Data</li>
                </ol>
            </nav>
        </div>
        <!-- <a href="admin/galeri/tambah.php" class="btn btn-primary mb-4">Tambah Data</a> -->
    </div>

    <!-- End Page Title -->

    <section class="section dashboard">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <div class="row">
                <div class="col-lg-4">

                    <img src="<?= baseUrl(); ?>admin/galeri/uploads/<?= $data['gambar'] ?>" alt="" class="img-fluid target-preview mb-4">
                    <div class="mb-4">

                        <label for="gambar" class="form-label">Upload Gambar</label>
                        <input accept="gambar/*" onchange="previewImage(this,'.target-preview')" class="form-control" name="gambar" type="file" id="gambar">
                        <input type="hidden" name="old_gambar" value="<?= $data['gambar'] ?>">
                    </div>


                </div>
                <div class="col-lg-8">
                    <div class="mb-4">
                        <label for="judul" class="form-label">Judul</label>
                        <input required type="text" name="judul" class="form-control" id="judul" value="<?= $data['judul'] ?>">
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi" class="form-label">deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="10" required><?= $text ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">

                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k ?>" <?= $k == $data['kategori'] ? "selected"  : '' ?>><?= $k ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-12">
                        <a href="<?= baseUrl(); ?>admin/galeri" class="btn btn-warning me-2">Kembali</a>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </div>

        </form>
    </section>

</main>
<?php include('./../component/footer.php') ?>