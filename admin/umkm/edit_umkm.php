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
    $data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM umkm WHERE id_umkm = '$id'"));
    if (!$data) {
        return header('location:<?= baseUrl(); ?>admin/umkm');
    }
    $text = br2nl($data['deskripsi']);
} else {
    return header('location:<?= baseUrl(); ?>admin/umkm');
}


if (count($_POST) > 0) {
    $id = $_POST['id_umkm'];
    $data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM umkm WHERE id_umkm = '$id'"));
    if (!$data) {
        return header('location:<?= baseUrl(); ?>admin/umkm');
    }

    date_default_timezone_set('Asia/Jakarta');

    if (isset($_FILES['foto_umkm']) && is_uploaded_file($_FILES['foto_umkm']['tmp_name'])) {
        $extension =  explode('/', $_FILES['foto_umkm']['type'])[1];

        $foto_umkm = time() . '.' . $extension;

        unlink('uploads/' . $data['foto_umkm']); //menghapus file lama

        move_uploaded_file($_FILES['foto_umkm']['tmp_name'], 'uploads/' . $foto_umkm); // mengupload file baru
    } else {
        $foto_umkm = $_POST['old_foto_umkm'];
    }


    $nama_umkm = $_POST['nama_umkm'];
    $deskripsi = nl2br($_POST['deskripsi']);
    $link_umkm = $_POST['link_umkm'];

    $query = mysqli_query($connect, "UPDATE umkm SET nama_umkm='$nama_umkm',link_umkm='$link_umkm',deskripsi='$deskripsi',foto_umkm = '$foto_umkm' WHERE id = $id");

    if ($query) {
        echo "<script>alert('Data berhasil diubah') ; window.location.href='http://localhost/umkm/admin/umkm'</script>";
    } else {
        mysqli_error($connect);
        die;
    }
}

// $link_umkm = ['palestina', 'kunjungan', 'holiday', 'posko'];
?>

<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Edit umkm</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin/umkm/">umkm</a></li>
                    <li class="breadcrumb-item active">Edit Data</li>
                </ol>
            </nav>
        </div>
        <!-- <a href="admin/umkm/tambah.php" class="btn btn-primary mb-4">Tambah Data</a> -->
    </div>

    <!-- End Page Title -->

    <section class="section dashboard">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_umkm" value="<?= $data['id_umkm'] ?>">
            <div class="row">
                <div class="col-lg-4">

                    <img src="<?= baseUrl(); ?>admin/umkm/uploads/<?= $data['foto_umkm'] ?>" alt="" class="img-fluid target-preview mb-4">
                    <div class="mb-4">

                        <label for="foto_umkm" class="form-label">Upload foto umkm</label>
                        <input accept="foto_umkm/*" onchange="previewImage(this,'.target-preview')" class="form-control" name="foto_umkm" type="file" id="foto_umkm">
                        <input type="hidden" name="old_foto_umkm" value="<?= $data['foto_umkm'] ?>">
                    </div>


                </div>
                <div class="col-lg-8">
                    <div class="mb-4">
                        <label for="nama_umkm" class="form-label">nama umkm</label>
                        <input required type="text" name="nama_umkm" class="form-control" id="nama_umkm" value="<?= $data['nama_umkm'] ?>">
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi" class="form-label">deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="10" required><?= $text ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="link_umkm" class="form-label">link umkm</label>
                        <input required type="text" name="link_umkm" class="form-control" id="link_umkm" value="<?= $data['link_umkm'] ?>">
                    </div>

                    <div class="col-12">
                        <a href="<?= baseUrl(); ?>admin/umkm" class="btn btn-warning me-2">Kembali</a>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </div>

        </form>
    </section>

</main>
<?php include('./../component/footer.php') ?>