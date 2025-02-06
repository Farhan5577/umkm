<?php
include('./../../koneksi.php');
require('./../must_login.php');
include('./../component/header.php');
include('./../component/sidebar.php');

function br2nl($input)
{
    return preg_replace('/<br\s?\/?>/ius', "\n", str_replace("\n", "", str_replace("\r", "", htmlspecialchars_decode($input))));
}

$id = 1;
$data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM profil WHERE id = '$id'"));
if (!$data) {
    return header('location:<?= baseUrl(); ?>admin/profile');
}


if (count($_POST) > 0) {
    $id = $_POST['id'];
    $data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM profil WHERE id = $id"));
    if (!$data) {
        return header('location:<?= baseUrl(); ?>admin/profile');
    }

    date_default_timezone_set('Asia/Jakarta');

    if (isset($_FILES['foto_sambutan']) && is_uploaded_file($_FILES['foto_sambutan']['tmp_name'])) {
        $extension =  explode('/', $_FILES['foto_sambutan']['type'])[1];

        $name_foto_sambutan = time() . '.' . $extension;

        unlink('uploads/' . $data['foto_sambutan']); //menghapus file lama

        move_uploaded_file($_FILES['foto_sambutan']['tmp_name'], 'uploads/' . $name_foto_sambutan); // mengupload file baru
    } else {
        $name_foto_sambutan = $_POST['old_image'];
    }

    $judul = $_POST['judul_sambutan'];

    $isi_sambutan = nl2br($_POST['isi_sambutan']);
    $isi_sejarah = nl2br($_POST['isi_sejarah']);
    $visi = nl2br($_POST['visi']);
    $misi = nl2br($_POST['misi']);
    $program_kerja = nl2br($_POST['program_kerja']);

    $query = mysqli_query($connect, "UPDATE profil SET 
    judul_sambutan = '$judul',
    isi_sambutan='$isi_sambutan',
    foto_sambutan = '$name_foto_sambutan',
    isi_sejarah='$isi_sejarah',
    visi='$visi',
    misi='$misi',
    program_kerja='$program_kerja'
     WHERE id = $id");

    if ($query) {
        echo "<script>alert('Data berhasil diubah') ; window.location.href='http://localhost/umkm/admin/profile/'</script>";
    } else {
        mysqli_error($connect);
        die;
    }
}

?>

<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Edit profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= baseUrl() ?>admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= baseUrl() ?>admin/profile/">profile</a></li>
                    <li class="breadcrumb-item active">Edit Data</li>
                </ol>
            </nav>
        </div>
        <!-- <a href="/admin/berita/tambah.php" class="btn btn-primary mb-4">Tambah Data</a> -->
    </div>

    <!-- End Page Title -->

    <section class="section dashboard">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <div class="row">
                <div class="col-12">

                    <img src="<?= baseUrl(); ?>admin/profile/uploads/<?= $data['foto_sambutan'] ?>" alt="" class="img-fluid target-preview mb-4">
                    <div class="mb-4">

                        <label for="image" class="form-label">Upload Gambar</label>
                        <input accept="image/*" onchange="previewImage(this,'.target-preview')" class="form-control" name="foto_sambutan" type="file" id="image">
                        <input type="hidden" name="old_image" value="<?= $data['foto_sambutan'] ?>">
                    </div>


                </div>
                <div class="col-">
                    <div class="mb-4">

                        <label for="judul_sambutan" class="form-label">Judul_sambutan</label>
                        <input required type="text" name="judul_sambutan" class="form-control" id="judul_sambutan" value="<?= $data['judul_sambutan'] ?>">
                    </div>
                    <div class="mb-4">

                        <label for="isi_sambutan" class="form-label">isi_sambutan</label>
                        <textarea class="form-control" name="isi_sambutan" id="isi_sambutan" rows="10" required><?= br2nl($data['isi_sambutan']) ?></textarea>
                    </div>
                    <div class="mb-4">

                        <label for="isi_sejarah" class="form-label">isi_sejarah</label>
                        <textarea class="form-control" name="isi_sejarah" id="isi_sejarah" rows="10" required><?= br2nl($data['isi_sejarah']) ?></textarea>
                    </div>
                    <div class="mb-4">

                        <label for="visi" class="form-label">visi</label>
                        <textarea class="form-control" name="visi" id="visi" rows="10" required><?= br2nl($data['visi']) ?></textarea>
                    </div>
                    <div class="mb-4">

                        <label for="misi" class="form-label">misi</label>
                        <textarea class="form-control" name="misi" id="misi" rows="10" required><?= br2nl($data['misi']) ?></textarea>
                    </div>
                    <div class="mb-4">

                        <label for="program_kerja" class="form-label">program_kerja</label>
                        <textarea class="form-control" name="program_kerja" id="program_kerja" rows="10" required><?= br2nl($data['program_kerja']) ?></textarea>
                    </div>
                </div>

                <div class="col-12">
                    <a href="<?= baseUrl() ?>admin/profile" class="btn btn-warning me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </div>

        </form>
    </section>

</main>
<?php include('./../component/footer.php') ?>