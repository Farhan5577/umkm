<?php
include('./../../koneksi.php');

if (count($_POST) > 0) {

    if (isset($_POST['delete']) && isset($_POST['id']) && is_numeric($_POST['id'])) {

        // cek dulu apakah ada file gambar di dalam folder

        $id = (int) $_POST['id']; // Pastikan ID adalah angka

        //  cek dulu apakah id umkm ini memilii prdouk apa tidak
        $query = mysqli_query($connect, "SELECT * FROM produk WHERE umkm_id = $id");
        if ($query->num_rows > 0) {
            echo "<script>alert('Data tidak bisa dihapus karena masih memiliki produk'); window.location.href='http://localhost/umkm/admin/umkm'</script>";
            exit();
        }

        // Ambil nama file gambar dari database
        $query_gambar = mysqli_query($connect, "SELECT foto_umkm FROM umkm WHERE id_umkm = $id");
        $data_gambar = mysqli_fetch_assoc($query_gambar);
        $namaImage = $data_gambar['foto_umkm'];


        unlink('uploads/' . $namaImage); //mengahapus image yang ada di dalam folder
        mysqli_query($connect, "DELETE FROM umkm WHERE id_umkm = $id"); //mengahpus data dari database
        echo "<script>alert('Data berhasil dihapus') ; window.location.href='http://localhost/umkm/admin/umkm'</script>";
    }
}

$data = mysqli_query($connect, 'SELECT * FROM umkm');

require('./../must_login.php');
include('./../component/header.php');
include('./../component/sidebar.php');

?>
<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Manage umkm</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin">Home</a></li>
                    <li class="breadcrumb-item active">umkm</li>
                </ol>
            </nav>
        </div>
        <a href="<?= baseUrl(); ?>admin/umkm/tambah_umkm.php" class="btn btn-primary mb-4">Tambah Data</a>
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
                                <th scope="col">Foto UMKM</th>
                                <th scope="col">Nama UMKM</th>
                                <th scope="col">Pemilik UMKM</th>
                                <th scope="col">Link UMKM</th>
                                <th scope="col" class="text-center">Aksi</th>
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
                                            <img style="object-fit: contain; aspect-ratio : 16 / 9;" width="150" src="<?= baseUrl(); ?>admin/umkm/uploads/<?= $row['foto_umkm'] ?>" alt="<?= $row['foto_umkm'] ?>" />
                                        </td>
                                        <td><?= $row['nama_umkm'] ?></td>
                                        <td>
                                            <?php
                                            $user = $row['pemilik_umkm'];
                                            // Pastikan untuk menggunakan tanda kutip tunggal (') dan bukan tanda sama dengan ganda (==) dalam kondisi WHERE
                                            $get = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM user WHERE username = '$user'"));


                                            echo $get['name'];

                                            ?>
                                        </td>


                                        <td>
                                            <a href="<?= baseUrl()  . '/umkm?view=show&umkm=' . $row['link_umkm'] ?>"><?= $row['link_umkm'] ?></a>
                                        </td>
                                        <td class="text-center">

                                            <a href="<?= baseUrl(); ?>admin/umkm/detail.php?id=<?= $row['id_umkm'] ?>" class="btn-sm m-1 btn btn-info">
                                                Detail
                                            </a>
                                            <!-- <a href="<?= baseUrl(); ?>admin/umkm/edit_umkm.php?id=<?= $row['id_umkm'] ?>" class="btn-sm m-1 btn btn-warning">
                                                Edit
                                            </a> -->
                                            <form action="" method="post" class="d-inline-block m-1" onsubmit="return confirm('Apakah anda yakin?')">
                                                <input type="hidden" name="delete" value="1">
                                                <input type="hidden" name="id" value="<?= $row['id_umkm'] ?>">
                                                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
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