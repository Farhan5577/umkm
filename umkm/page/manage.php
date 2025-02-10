<?php
include($_SERVER['DOCUMENT_ROOT'] . '/umkm/koneksi.php');
require($_SERVER['DOCUMENT_ROOT'] . '/umkm/admin/must_login.php');
include($_SERVER['DOCUMENT_ROOT'] . '/umkm/admin/component/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/umkm/admin/component/sidebar.php');

// Ambil data UMKM berdasarkan user yang login
$pemilik_umkm = $_SESSION['data']['username'];
$query = mysqli_query($connect, "SELECT * FROM umkm WHERE pemilik_umkm = '$pemilik_umkm'");
$data_umkm = mysqli_fetch_assoc($query);

if (!$data_umkm) {
    echo "<script>alert('Data UMKM tidak ditemukan'); window.location.href='http://localhost/umkm/admin/dashboard'</script>";
    exit();
}

// Proses update data UMKM
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_umkm = $_POST['nama_umkm'];
    $deskripsi = $_POST['deskripsi'];
    $link_umkm = $_POST['link_umkm'];

    // Jika ada file gambar yang diupload
    if (!empty($_FILES['foto_umkm']['name'])) {
        $foto_umkm_name = time() . '_' . $_FILES['foto_umkm']['name'];
        $foto_umkm_path = $_SERVER['DOCUMENT_ROOT'] . '/umkm/admin/umkm/uploads/' . $foto_umkm_name;

        // Hapus foto_umkm lama jika ada
        if (!empty($data_umkm['foto_umkm']) && file_exists($_SERVER['DOCUMENT_ROOT'] . '/umkm/admin/umkm/uploads/' . $data_umkm['foto_umkm'])) {
            unlink($_SERVER['DOCUMENT_ROOT'] . '/umkm/admin/umkm/uploads/' . $data_umkm['foto_umkm']);
        }

        move_uploaded_file($_FILES['foto_umkm']['tmp_name'], $foto_umkm_path);
    } else {
        $foto_umkm_name = $data_umkm['foto_umkm'];
    }

    $update_query = "UPDATE umkm SET nama_umkm = '$nama_umkm', deskripsi = '$deskripsi', link_umkm = '$link_umkm', foto_umkm = '$foto_umkm_name' WHERE pemilik_umkm = '$pemilik_umkm'";
    mysqli_query($connect, $update_query);

    echo "<script>alert('Data UMKM berhasil diperbarui'); 
    window.location.href='http://localhost/umkm/umkm?manage=" . $data_umkm['id_umkm'] . "'</script>";
    exit();
}
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit UMKM</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin">Home</a></li>
                <li class="breadcrumb-item active">Edit UMKM</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Nama UMKM</label>
                        <input onkeyup="getAndSetvalue(this,'.target-link-umkm')" type="text" name="nama_umkm" class="form-control" value="<?= $data_umkm['nama_umkm'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" required><?= $data_umkm['deskripsi'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link UMKM</label>
                        <input type="text" name="link_umkm" class="form-control target-link-umkm" value="<?= $data_umkm['link_umkm'] ?>" required readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto UMKM</label>
                        <input onchange="previewImage(this,'.target-preview')" type="file" name="foto_umkm" class="form-control">

                        <?php if (!empty($data_umkm['foto_umkm'])): ?>
                            <img style="aspect-ratio: 16 / 9;object-fit: contain;" class="target-preview  mt-2 w-50" src="<?= baseUrl(); ?>admin/umkm/uploads/<?= $data_umkm['foto_umkm'] ?>" width="100" class="mt-2">
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/umkm/admin/component/footer.php'); ?>