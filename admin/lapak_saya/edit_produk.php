<?php
include('./../../koneksi.php');
require('./../must_login.php');
include('./../component/header.php');
include('./../component/sidebar.php');

function br2nl($input)
{
    return preg_replace('/<br\s?\/?>/ius', "\n", str_replace("\n", "", str_replace("\r", "", htmlspecialchars_decode($input))));
}

// Pastikan parameter id tersedia
if (!isset($_GET['id_umkm'])) {
    header('Location: ' . baseUrl() . 'admin/produk');
    exit;
}

$id = $_GET['id_umkm'];
$data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM umkm WHERE id_umkm = '$id'"));

// Jika data tidak ditemukan, redirect ke halaman produk
if (!$data) {
    header('Location: ' . baseUrl() . 'admin/produk');
    exit;
}

$text = br2nl($data['deskripsi']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_umkm'];
    var_dump($id); // Cek apakah ID valid
    exit;

    $nama_umkm = $_POST['nama_umkm'];
    $deskripsi = nl2br($_POST['deskripsi']);
    $link_umkm = $_POST['link_umkm'];

    date_default_timezone_set('Asia/Jakarta');

    if (isset($_FILES['foto_umkm']) && is_uploaded_file($_FILES['foto_umkm']['tmp_name'])) {
        $extension = pathinfo($_FILES['foto_umkm']['name'], PATHINFO_EXTENSION);
        $foto_umkm = time() . '.' . $extension;

        if (!empty($data['foto_umkm']) && file_exists('uploads/' . $data['foto_umkm'])) {
            unlink('uploads/' . $data['foto_umkm']);
        }

        move_uploaded_file($_FILES['foto_umkm']['tmp_name'], 'admin/umkm/uploads/' . $foto_umkm);
    } else {
        $foto_umkm = $_POST['old_foto_umkm'];
    }

    // Cek apakah $id benar-benar ada di database sebelum update
    $check = mysqli_query($connect, "SELECT id_umkm FROM umkm WHERE id_umkm = '$id'");
    if (mysqli_num_rows($check) == 0) {
        die("Error: ID tidak ditemukan di database.");
    }

    $query = mysqli_query($connect, "UPDATE umkm SET nama_umkm='$nama_umkm', link_umkm='$link_umkm', deskripsi='$deskripsi', foto_umkm='$foto_umkm' WHERE id_umkm = '$id'");


    if ($query) {
        echo "<script>alert('Data berhasil diubah'); window.location.href='" . baseUrl() . "admin/produk';</script>";
    } else {
        die("Query Error: " . mysqli_error($connect));
    }
}


?>

<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Edit UMKM</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin/produk/">Produk</a></li>
                    <li class="breadcrumb-item active">Edit Data</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="section dashboard">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_umkm" value="<?= $data['id_umkm'] ?>">
            <input type="hidden" name="old_gambar" value="<?= $data['foto_umkm'] ?>">

            <div class="row">
                <div class="col-lg-4">
                    <img src="<?= baseUrl(); ?>admin/produk/uploads/<?= $data['foto_umkm'] ?>" alt="" class="img-fluid target-preview mb-4">
                    <div class="mb-4">
                        <label for="gambar" class="form-label">Upload Gambar</label>
                        <input accept="image/*" onchange="previewImage(this,'.target-preview')" class="form-control" name="gambar" type="file" id="foto_umkm">
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="mb-4">
                        <label for="nama_umkm" class="form-label">Nama UMKM</label>
                        <input required type="text" name="nama_umkm" class="form-control" id="nama_umkm" value="<?= $data['nama_umkm'] ?>">
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="10" required><?= $text ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="link_umkm" class="form-label">Link UMKM</label>
                        <input required type="text" name="link_umkm" class="form-control" id="link_umkm" value="<?= $data['link_umkm'] ?>">
                    </div>

                    <div class="col-12">
                        <a href="<?= baseUrl(); ?>admin/produk" class="btn btn-warning me-2">Kembali</a>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </div>
            </div>
        </form>
    </section>

</main>

<?php include('./../component/footer.php') ?>
