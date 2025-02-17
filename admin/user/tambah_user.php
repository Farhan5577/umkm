<?php
include('./../../koneksi.php');
require('./../must_login.php');
include('./../component/header.php');
include('./../component/sidebar.php');
if (count($_POST) > 0) {

    // date_default_timezone_set('Asia/Jakarta');
    // $extension =  explode('/', $_FILES['image']['type'])[1];
    // $name = time() . '.' . $extension;


    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    // move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $name);
    $query = mysqli_query($connect, "INSERT INTO user (name, username, password) VALUES ('$name', '$username', '$password')");
    if ($query) {
        echo "<script>alert('Data berhasil ditambah') ; window.location.href='http://localhost/umkm/admin/user'</script>";
    } else {
        mysqli_error($connect);
        die;
    }
}

$data = mysqli_fetch_assoc(mysqli_query($connect, 'SELECT * FROM user'));

?>
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
                    <div class="mb-4">
                        <label for="name" class="form-label">nama</label>
                        <input required type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="mb-4">
                        <label for="username" class="form-label">username</label>
                        <input required type="text" name="username" class="form-control" id="username">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">password</label>
                        <input required type="password" name="password" class="form-control" id="password">
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