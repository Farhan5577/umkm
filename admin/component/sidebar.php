<?php
include($_SERVER['DOCUMENT_ROOT'] . '/umkm/koneksi.php');
function active($url)
{
    $uri = explode('/', $_SERVER['REQUEST_URI']);
    $result = false;

    if ($uri[2] == 'admin') {

        if ($uri[3] == $url) {
            $result = true;
        } else if ($uri[3] == "" && $url == 'root') {
            $result = true;
        }
    }

    if (isset($_GET['manage']) && $url == 'umkm') {
        $result = true;
    }


    return $result;
}



$sesiLogin  = $_SESSION['data']['username'];
$getUmkm = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM umkm WHERE pemilik_umkm = '$sesiLogin'"));
?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?= active('root') ? '' : 'collapsed' ?>" href="<?= baseUrl(); ?>admin">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li>

        <?php if ($_SESSION['data']['username'] == 'admin') : ?>
            <li class="nav-item">
                <a class="nav-link 
                    <?= active('profile') ? '' : 'collapsed' ?>" href="<?= baseUrl(); ?>admin/profile">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link 
                     <?= active('umkm') ? '' : 'collapsed' ?>" href="<?= baseUrl(); ?>admin/umkm">
                    <i class="bi bi-envelope"></i>
                    <span>UMKM </span>
                </a>
            </li>


            <!-- <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#" aria-expanded="false">
                    <i class="bi bi-menu-button-wide"></i><span>Lapak</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="components-alerts.html">
                            <i class="bi bi-circle"></i><span>Alerts</span>
                        </a>
                    </li>


                </ul>
            </li> -->

        <?php endif; ?>

        <?php if ($getUmkm) :  ?>
            <li class="nav-item">
                <a class="nav-link 
                <?= active('lapak_saya') ? '' : 'collapsed' ?>" href="<?= baseUrl(); ?>admin/lapak_saya/index.php">
                    <i class="bi bi-envelope"></i>
                    <span>Lapak Saya </span>
                </a>
            </li>
        <?php endif; ?>


    </ul>

</aside><!-- End Sidebar-->