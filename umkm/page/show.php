<?php
include($_SERVER['DOCUMENT_ROOT'] . '/umkm/koneksi.php');
require($_SERVER['DOCUMENT_ROOT'] . '/umkm/admin/must_login.php');
include($_SERVER['DOCUMENT_ROOT'] . '/umkm/admin/component/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/umkm/admin/component/sidebar.php');

$pemilik_umkm = $_SESSION['data']['username'];
$query = mysqli_query($connect, 'SELECT * FROM umkm WHERE pemilik_umkm = "' . $pemilik_umkm . '"');
$data_umkm = mysqli_fetch_assoc($query);
$link_umkm = $data_umkm['link_umkm'];

if ($_GET['manage'] != $link_umkm) {
    echo "<script>alert('Anda tidak memiliki akses ke halaman ini'); window.location.href='http://localhost/umkm/umkm?manage=" . $link_umkm . "'</script>";
    exit();
}

$action = $_GET['action'] ?? 'tambah-data';

$umkm_id = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM umkm WHERE link_umkm = '" . $_GET['manage'] . "'"))['id_umkm'];



if (!isset($umkm_id)) {
    $username = $_SESSION['data']['username'];
    $umkm = mysqli_fetch_assoc(mysqli_query($connect, "SELECT link_umkm FROM umkm WHERE pemilik_umkm = '$username'"));
    $link_umkm = $umkm['link_umkm'];
    echo "<script>alert('Data tidak ditemukan'); window.location.href='http://localhost/umkm/umkm/produk?manage=" . $link_umkm . "'</script>";
}
$id_produk = $_GET['id'] ?? null;

if ($action == 'tambah-data' && count($_POST) > 0) {

    date_default_timezone_set('Asia/Jakarta');
    $extension = explode('/', $_FILES['image']['type'])[1];
    $name = time() . '.' . $extension;

    $umkm_id = $_POST['umkm_id'];
    $nama = $_POST['nama'];
    $deskripsi = nl2br($_POST['deskripsi']);

    move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/umkm/admin/umkm/uploads/' . $name);
    $query = mysqli_query($connect, "INSERT INTO produk (umkm_id, nama, foto, deskripsi) 
                                    VALUES ('$umkm_id', '$nama', '$name', '$deskripsi')");

    if ($query) {
        echo "<script>alert('Data berhasil ditambah');window.location.href='http://localhost/umkm/umkm?manage=" . $link_umkm . "'</script>";
    } else {
        mysqli_error($connect);
        die;
    }
} elseif ($action == 'edit-data' && $id_produk) {
    $data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM produk WHERE id = '$id_produk'"));

    if (count($_POST) > 0) {
        date_default_timezone_set('Asia/Jakarta');

        // Cek apakah ada file yang diupload
        if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
            $extension = explode('/', $_FILES['image']['type'])[1];
            $name = time() . '.' . $extension;

            // Hapus file lama jika ada
            if (!empty($data['foto'])) {
                unlink($_SERVER['DOCUMENT_ROOT'] . '/umkm/admin/umkm/uploads/' . $data['foto']);
            }

            // Upload file baru
            move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/umkm/admin/umkm/uploads/' . $name);
        } else {
            // Gunakan file lama jika tidak ada file baru
            $name = $data['foto'];
        }

        $umkm_id = $_POST['umkm_id'];
        $nama = $_POST['nama'];
        $deskripsi = nl2br($_POST['deskripsi']);

        $query = mysqli_query($connect, "UPDATE produk SET umkm_id = '$umkm_id', nama = '$nama', foto = '$name', deskripsi = '$deskripsi' WHERE id = '$id_produk'");

        if ($query) {
            echo "<script>alert('Data berhasil diupdate'); window.location.href='http://localhost/umkm/umkm?manage=" . $link_umkm . "'</script>";
        } else {
            echo mysqli_error($connect);
            die;
        }
    }
} elseif ($action == 'detail-data' && $id_produk) {
    $data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM produk WHERE id = '$id_produk'"));
}



$dataUmkm = mysqli_query($connect, "SELECT * FROM umkm");
?>

<main id="main" class="main">
    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1><?= $action == 'tambah-data' ? 'Tambah Produk' : ($action == 'edit-data' ? 'Edit Produk' : 'Detail Produk') ?></h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= baseUrl() . '/umkm?manage=' . $data_umkm['link_umkm'] ?>">Lapak saya</a></li>
                    <li class="breadcrumb-item active"><?= $action == 'tambah-data' ? 'Tambah Data' : ($action == 'edit-data' ? 'Edit Data' : 'Detail Data') ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="section dashboard">
        <?php if ($action == 'detail-data') : ?>
            <div class="row">
                <div class="col-lg-4">
                    <img src="<?= baseUrl(); ?>admin/umkm/uploads/<?= $data['foto'] ?>" alt="" class="img-fluid">
                </div>
                <div class="col-lg-8">
                    <div class="mb-4">
                        <label class="form-label">Nama Produk</label>
                        <p><?= $data['nama'] ?></p>
                    </div>
                
                    <div class="mb-4">
                        <label class="form-label">Deskripsi</label>
                        <p><?= $data['deskripsi'] ?></p>
                    </div>

                </div>
            </div>
        <?php else : ?>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden"
                    name="umkm_id" value="<?= $data_umkm['id_umkm']; ?>">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="<?= $action == 'edit-data' ? baseUrl() . 'admin/umkm/uploads/' . $data['foto'] : '' ?>" alt="" class="img-fluid target-preview <?= $action == 'tambah-data' ? 'd-none' : '' ?>">
                        <div class="mb-4">
                            <label for="foto" class="form-label">Upload Gambar</label>
                            <input accept="image/*" onchange="previewImage(this,'.target-preview')" <?= $action == 'tambah-data' ? 'required' : '' ?> class="form-control" name="image" type="file" id="image">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="mb-4">
                            <label for="nama" class="form-label">Nama Produk</label>
                            <input required type="text" name="nama" value="<?= $action == 'edit-data' ? $data['nama'] : '' ?>" onkeyup="getAndSetvalue(this,'.target-link-nama')" class="form-control" id="nama">
                        </div>
                        <div class="mb-4">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="10" required><?= $action == 'edit-data' ? $data['deskripsi'] : '' ?></textarea>
                        </div>

                    </div>
                    <div class="col-12">
                        <a href="<?= baseUrl(); ?>admin/produk" class="btn btn-warning me-2">Kembali</a>
                        <button type="submit" class="btn btn-primary"><?= $action == 'edit-data' ? 'Update' : 'Simpan' ?></button>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    </section>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/umkm/admin/component/footer.php'); ?>