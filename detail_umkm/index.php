<?php
session_start();
include("./../koneksi.php");

if (!isset($_GET['id_umkm']) || empty($_GET['id_umkm'])) {
    die("ID UMKM tidak ditemukan.");
}

$id_umkm = intval($_GET['id_umkm']);

$data = mysqli_query($connect, "SELECT * FROM umkm WHERE id_umkm = $id_umkm");
$row = mysqli_fetch_assoc($data);

if (!$row) {
    die("Data UMKM tidak ditemukan.");
}

include('./../component/header.php');
?>

<main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <h2>Detail UMKM</h2>
        </div>
    </section>

    <div class="container">
        <div class="card">
            <img src="<?= baseUrl(); ?>admin/umkm/uploads/<?= $row['foto_umkm'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($row['nama_umkm']); ?></h5>
                <p class="card-text"><?= htmlspecialchars($row['deskripsi']); ?></p>
                <p class="card-text"><strong>Kontak:</strong> <?= htmlspecialchars($row['link_umkm']); ?></p>
                <a href="umkm/index.php" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</main>

<?php include('./../component/footer.php'); ?>