<?php
include('./../../koneksi.php');
require('./../must_login.php');
include('./../component/header.php');
include('./../component/sidebar.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM kontak WHERE id = '$id'"));
    if (!$data) {
        return header('location:<?= baseUrl(); ?>admin/kontak');
    }

} else {
    return header('location:<?= baseUrl(); ?>admin/kontak');
}

if (count($_POST) > 0) {
    $id = $_POST['id'];
    $data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM kontak WHERE id = $id"));
    if (!$data) {
        return header('location:<?= baseUrl(); ?>/admin/kontak');
    }

    $nama_lokasi = $_POST['nama_lokasi'];
    $lokasi = $_POST['lokasi'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];

    $query = mysqli_query($connect, "UPDATE kontak SET nama_lokasi = '$nama_lokasi',lokasi='$lokasi',email = '$email', telp = '$telp' WHERE id = $id");


    if ($query) {
        echo "<script>alert('Data berhasil diubah') ; window.location.href='http://localhost/umkm/admin/kontak'</script>";
    } else {
        mysqli_error($connect);
        die;
    }
}
?>

<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Edit kontak</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>/admin/kontak/">kontak</a></li>
                    <li class="breadcrumb-item active">Edit Data</li>
                </ol>
            </nav>
        </div>
        <!-- <a href="/admin/kontak/tambah.php" class="btn btn-primary mb-4">Tambah Data</a> -->
    </div>

    <!-- End Page Title -->

    <section class="section dashboard">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <div class="row">
                
                <div class="col-lg-8">
                    <div class="mb-4">

                        <label for="nama_lokasi" class="form-label">nama_lokasi</label>
                        <input required type="text" name="nama_lokasi" class="form-control" id="nama_lokasi" value="<?= $data['nama_lokasi'] ?>">
                    </div>
                    <div class="mb-4">

                        <label for="lokasi" class="form-label">lokasi</label>
                        <input type="text" class="form-control" name="lokasi" id="lokasi" required value="<?= $data['lokasi'] ?>">
                    </div>
                    <div class="mb-4">

                        <label for="email" class="form-label">email</label>
                        <input type="text" class="form-control" name="email" id="email" required value="<?= $data['email'] ?>">
                    </div>
                    <div class="mb-4">

                        <label for="telp" class="form-label">telepone</label>
                        <input type="text" class="form-control" name="telp" id="telp" required value="<?= $data['telp'] ?>">
                    </div>
                </div>

                <div class="col-12">
                    <a href="<?= baseUrl(); ?>admin/kontak" class="btn btn-warning me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </div>

        </form>
    </section>

</main>
<?php include('./../component/footer.php') ?>