<?php

function active($url)
{
    $uri = explode('/', $_SERVER['REQUEST_URI']);
    $result = false;
    if (count($uri) > 3) {
        if ($uri[2] == $url) {
            $result = true;
        }
    } else {
        if ($uri[1] == $url) {
            $result = true;
        }
    }
    return $result;
}
?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?= active('admin') ? '' : 'collapsed' ?>" href="<?= baseUrl(); ?>admin">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li>
        <?php if ($_SESSION['data']['username'] == 'danda') : ?>
            <li class="nav-item">
                <a class="nav-link 
                    <?= active('profile') ? '' : 'collapsed' ?>" href="<?= baseUrl(); ?>admin/profile">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li>

        <?php endif; ?>
        <?php if ($_SESSION['data']['username'] == 'putra') : ?>
            <li class="nav-item">
                <a class="nav-link <?= active('berita') ? '' : 'collapsed' ?>" href="<?= baseUrl(); ?>admin/berita">
                    <i class="bi bi-card-list"></i>
                    <span>Berita</span>
                </a>
            </li>
        <?php endif; ?>
        <?php if ($_SESSION['data']['username'] == 'danil') : ?>
            <li class="nav-item">

                <a class="nav-link 
                    <?=
                    $_SERVER['REQUEST_URI'] == '/admin/galeri/' ||
                        $_SERVER['REQUEST_URI'] == '/admin/galeri/*' ? '' : 'collapsed' ?>" href="<?= baseUrl(); ?>admin/galeri/">
                    <i class="bi bi-layout-text-window-reverse"></i>
                    <span>Galeri</span>
                </a>
            </li>
        <?php endif; ?>
        <?php if ($_SESSION['data']['username'] == 'farhan') : ?>
            <li class="nav-item">
                <a class="nav-link 
                    <?=
                    $_SERVER['REQUEST_URI'] == '/admin/kontak/' ||
                        $_SERVER['REQUEST_URI'] == '/admin/kontak/*' ? '' : 'collapsed' ?>" href="<?= baseUrl(); ?>admin/kontak">
                    <i class="bi bi-envelope"></i>
                    <span>Kontak</span>
                </a>
            </li>
        <?php endif; ?>
        <?php if ($_SESSION['data']['username'] == 'zakki') : ?>
            <li class="nav-item">
                <a class="nav-link 
                    <?=
                    $_SERVER['REQUEST_URI'] == '/admin/umkm/' ||
                        $_SERVER['REQUEST_URI'] == '/admin/umkm/*' ? '' : 'collapsed' ?>" href="<?= baseUrl(); ?>admin/umkm">
                    <i class="bi bi-envelope"></i>
                    <span>umkm</span>
                </a>
            </li>
        <?php endif; ?>


    </ul>

</aside><!-- End Sidebar-->