<?php
include('./../../koneksi.php');
if (count($_POST) > 0) {
    $id = $_POST['id'];

    $data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM user WHERE id = $id"));

    if (!$data) {
        return header('location:<?= baseUrl(); ?>/admin/user');
    }
    $name = $_POST['name'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    $query = mysqli_query($connect, "UPDATE user SET name='$name',username='$username',password='$password' WHERE id = $id");

    if ($query) {
        echo "<script>alert('Data berhasil diubah') ; window.location.href='http://localhost/umkm/admin/user'</script>";
    } else {
        mysqli_error($connect);
        die;
    }
}

require('./../must_login.php');
include('./../component/header.php');
include('./../component/sidebar.php');
function br2nl($input)
{
    return preg_replace('/<br\s?\/?>/ius', "\n", str_replace("\n", "", str_replace("\r", "", htmlspecialchars_decode($input))));
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM user WHERE id = '$id'"));
    if (!$data) {
        return header('location:<?= baseUrl(); ?>admin/user');
    }
} else {
    return header('location:<?= baseUrl(); ?>admin/user');
}


?>


<!-- batas -->

<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>tambah user</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= baseUrl(); ?>admin/user/">user</a></li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </nav>
        </div>
        <!-- <a href="admin/user/tambah.php" class="btn btn-primary mb-4">Tambah Data</a> -->
    </div>

    <!-- End Page Title -->

    <section class="section dashboard">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-8">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="mb-4">
                        <label for="name" class="form-label">name</label>
                        <input required type="text" name="name" class="form-control" id="name" value="<?= $data['name'] ?>">
                    </div>
                    <div class="mb-4">
                        <label for="username" class="form-label">username</label>
                        <input required type="text" name="username" class="form-control" id="username" value="<?= $data['username'] ?>">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">password</label>
                        <input required type="password" name="password" class="form-control" id="password" value="<?= $data['password'] ?>">
                    </div>
                </div>

                <div class="col-12">
                    <a href="<?= baseUrl(); ?>admin/user" class="btn btn-warning me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>

        </form>
    </section>

</main>
<?php include('./../component/footer.php') ?>