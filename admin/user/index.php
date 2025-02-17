<?php
include('./../../koneksi.php');

if (count($_POST) > 0) {

    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        // $nameImage = mysqli_fetch_assoc(mysqli_query($connect, "SELECT user FROM user WHERE id = $id"))['user'];
        // unlink('uploads/' . $nameImage); //mengahapus image yang ada di dalam folder
        mysqli_query($connect, "DELETE FROM user WHERE id = $id"); //mengahpus data dari database
        echo "<script>alert('Data berhasil dihapus') ; window.location.href='http://localhost/umkm/admin/user'</script>";
    }
}

$data = mysqli_query($connect, 'SELECT * FROM user WHERE username != "admin"');
require('./../must_login.php');
include('./../component/header.php');
include('./../component/sidebar.php');

?>
<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Manage user</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin">Home</a></li>
                    <li class="breadcrumb-item active">user</li>
                </ol>
            </nav>
        </div>
        <a href="<?= baseUrl(); ?>admin/user/tambah_user.php" class="btn btn-primary mb-4">Tambah Data</a>
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
                                <!-- <th scope="col">Gambar</th> -->
                                <th scope="col">name</th>
                                <th scope="col">username</th>
                                <!-- <th scope="col">pasword</th> -->
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
                                        <!-- <td>
                                            <img class="img-thumbnail" width="150" src="<?= baseUrl(); ?>admin/user/uploads/<?= $row['gambar'] ?>" alt="<?= $row['judul'] ?>" />
                                        </td> -->
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['username'] ?></td>
                                        <!-- <td><?= $row['password'] ?></td> -->
                                        <td class="text-center">

                                            <a href="<?= baseUrl(); ?>admin/user/edit_user.php?id=<?= $row['id'] ?>" class="btn-sm m-1 btn btn-warning">
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