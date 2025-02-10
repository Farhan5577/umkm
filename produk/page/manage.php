<?php
// var_dump(explode('/', $_SERVER['REQUEST_URI'])[2]);
// die;
// Mulai sesi jika belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include($_SERVER['DOCUMENT_ROOT'] . '/umkm/koneksi.php');
$pemilik_umkm = $_SESSION['data']['username'];
$query = mysqli_query($connect, 'SELECT * FROM umkm WHERE pemilik_umkm = "' . $pemilik_umkm . '"');
$data_umkm = mysqli_fetch_assoc($query);
$link_umkm = $data_umkm['link_umkm'];

// if ($_GET['manage'] != $link_umkm) {
//     echo "<script>alert('Anda tidak memiliki akses ke halaman ini'); window.location.href='http://localhost/umkm/produk?manage=" . $link_umkm . "'</script>";
//     exit();
// }

if (count($_POST) > 0) {
    if (isset($_POST['delete']) && isset($_POST['id']) && is_numeric($_POST['id'])) {
        $id = (int) $_POST['id']; // Pastikan ID adalah angka

        // Ambil nama file gambar dari database
        $query_gambar = mysqli_query($connect, "SELECT foto FROM produk WHERE id = $id");
        $data_gambar = mysqli_fetch_assoc($query_gambar);
        $namaImage = $data_gambar['foto'];


        // Hapus gambar dari folder
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/umkm/admin/umkm/uploads/' . $namaImage)) {
            unlink($_SERVER['DOCUMENT_ROOT'] . '/umkm/admin/umkm/uploads/' . $namaImage);
        }

        // Hapus data dari database
        mysqli_query($connect, "DELETE FROM produk WHERE id = $id");
        echo "<script>alert('Data berhasil dihapus'); window.location.href='http://localhost/umkm/produk'</script>";
        exit();
    }
}

$query2 = mysqli_query($connect, 'SELECT * FROM produk WHERE umkm_id = "' . $data_umkm['id_umkm'] . '"');

require($_SERVER['DOCUMENT_ROOT'] . '/umkm/admin/must_login.php');
include($_SERVER['DOCUMENT_ROOT'] . '/umkm/admin/component/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/umkm/admin/component/sidebar.php');
?>

<main id="main" class="main">
    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Manage Produk</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin">Home</a></li>
                    <li class="breadcrumb-item active">Produk</li>
                </ol>
            </nav>
        </div>
        <a href="<?= baseUrl() . '/produk?manage=' . $data_umkm['link_umkm'] . '&action=tambah-data' ?>" class="btn btn-primary mb-4">Tambah Data</a>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Foto Produk</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($query2)) :
                            ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td>
                                        <img style="object-fit: contain; aspect-ratio: 16 / 9;" width="150" src="<?= baseUrl(); ?>admin/umkm/uploads/<?= $row['foto'] ?>" alt="<?= $row['foto'] ?>" />
                                    </td>
                                    <td><?= $row['nama'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= baseUrl() . '/produk?manage=' . $data_umkm['link_umkm'] . '&action=detail-data&id=' . $row['id'] ?>" class="btn-sm m-1 btn btn-info">Detail</a>
                                        <a href="<?= baseUrl() . '/produk?manage=' . $data_umkm['link_umkm'] . '&action=edit-data&id=' . $row['id'] ?>" class="btn-sm m-1 btn btn-warning">Edit</a>
                                        <form action="" method="post" class="d-inline-block m-1" onsubmit="return confirm('Apakah Anda yakin?')">
                                            <input type="hidden" name="delete" value="1">
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                            <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/umkm/admin/component/footer.php') ?>