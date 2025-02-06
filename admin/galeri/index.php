<?php
include('./../../koneksi.php');

if (count($_POST) > 0) {

    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $namaImage = mysqli_fetch_assoc(mysqli_query($connect, "SELECT gambar FROM galeri WHERE id = $id"))['gambar'];
        unlink('uploads/' . $namaImage); //mengahapus image yang ada di dalam folder
        mysqli_query($connect, "DELETE FROM galeri WHERE id = $id"); //mengahpus data dari database
        echo "<script>alert('Data berhasil dihapus') ; window.location.href='http://localhost/umkm/admin/galeri'</script>";
    }
}

$data = mysqli_query($connect, 'SELECT * FROM galeri');
require('./../must_login.php');
include('./../component/header.php');
include('./../component/sidebar.php');

?>
<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Manage Galeri</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin">Home</a></li>
                    <li class="breadcrumb-item active">Galeri</li>
                </ol>
            </nav>
        </div>
        <a href="<?= baseUrl(); ?>admin/galeri/tambah_galeri.php" class="btn btn-primary mb-4">Tambah Data</a>
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
                                <th scope="col">Gambar</th>
                                <th scope="col">Judul</th>
                                <th scope="col">deskripsi</th>
                                <th scope="col">kategori</th>
                                <th scope="col" class="text-center">aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($data->num_rows > 0) : ?>
                                <?php
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($data)) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td>
                                            <img class="img-thumbnail" width="150" src="<?= baseUrl(); ?>admin/galeri/uploads/<?= $row['gambar'] ?>" alt="<?= $row['judul'] ?>" />
                                        </td>
                                        <td><?= $row['judul'] ?></td>
                                        <td><?= $row['deskripsi'] ?></td>
                                        <td><?= $row['kategori'] ?></td>
                                        <td class="text-center">

                                            <a href="<?= baseUrl(); ?>admin/galeri/detail.php?id=<?= $row['id'] ?>" class="btn-sm m-1 btn btn-info">
                                                Detail
                                            </a>
                                            <a href="<?= baseUrl(); ?>admin/galeri/edit_galeri.php?id=<?= $row['id'] ?>" class="btn-sm m-1 btn btn-warning">
                                                Edit
                                            </a>
                                            <form action="" method="post" onclick="return confirm('Apakah anda yakin?') ? this.submit() : false" class="d-inline-block m-1">
                                                <input type="hidden" name="delete">
                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                <button class="btn btn-danger btn-sm" type="button">Hapus</button>
                                            </form>

                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6" class="text-center">Data masih kosong</td>
                                </tr>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</main>

<?php include('./../component/footer.php') ?>