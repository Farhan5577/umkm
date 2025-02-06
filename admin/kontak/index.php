<?php
include('./../../koneksi.php');

if (count($_POST) > 0) {

    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        mysqli_query($connect, "DELETE FROM kontak WHERE id = $id"); //mengahpus data dari database
        echo "<script>alert('Data berhasil dihapus') ; window.location.href=http://localhost/umkm/admin/kontak'</script>";
    }
}

$data = mysqli_query($connect, 'SELECT * FROM kontak');
require('./../must_login.php');
include('./../component/header.php');
include('./../component/sidebar.php');

?>
<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Manage kontak</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>/admin">Home</a></li>
                    <li class="breadcrumb-item active">kontak</li>
                </ol>
            </nav>
        </div>
        <a href="<?= baseUrl(); ?>/admin/kontak/tambah.php" class="btn btn-primary mb-4">Tambah Data</a>
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
                                <th scope="col">nama_lokasi</th>
                                <th scope="col">lokasi</th>
                                <th scope="col">email</th>
                                <th scope="col" class="text-center">telepone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($data->num_rows > 0) : ?>
                                <?php
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($data)) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>

                                        <td class="text-center"><?= $row['nama_lokasi'] ?>
                                        <td><?= $row['lokasi'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td width="150px" class="text-center"><?= $row['telp'] ?></td>
                                        <td class="text-center">
                                            
                                            <a href="<?= baseUrl(); ?>/admin/kontak/edit.php?id=<?= $row['id'] ?>" class="btn-sm m-1 btn btn-warning">
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
                                    <td colspan="5" class="text-center">Data masih kosong</td>
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