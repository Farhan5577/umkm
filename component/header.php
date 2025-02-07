<?php

function active($url)
{
    $uri = explode('/', $_SERVER['REQUEST_URI']);
    $result = false;

    if ($uri[2] == $url) {
        $result = true;
    } else if ($uri[2] == "" && $url == 'root') {
        $result = true;
    }

    return $result;
}

function baseUrl()
{
    $root = getenv('HTTP_HOST');
    $namaFolder = 'umkm';
    return 'http://' . $root . '/' . $namaFolder . '/';
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />

    <title>Desa Margourip</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Lembaga Penanggulangan Bencana" name="description" />
    <meta content="" name="keywords" />
    <meta property="og:image" content="https://uts-pbw.netlify.app/assets/img/og.png" />

    <!-- Favicons -->
    <link href="<?= baseUrl(); ?>assets/img/logodesa.jpg" rel="icon" />
    <link href="<?= baseUrl(); ?>assets/img/logodesa.jpg" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="<?= baseUrl(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= baseUrl(); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="<?= baseUrl(); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="<?= baseUrl(); ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="<?= baseUrl(); ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="<?= baseUrl(); ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="<?= baseUrl(); ?>assets/css/style.css" rel="stylesheet" />

    <style scoped>
        .loading {
            position: fixed;
            z-index: 99999;
            inset: 0;
            background: var(--primaryColor);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            opacity: 1;
        }

        .loading img {
            width: calc(200px + 20vw);
        }

        .loading.close {
            transition: all 0.5s ease;
            opacity: 0;
            z-index: -9999;
        }

        .donation {
            position: fixed;
            bottom: 15px;
            left: 10px;
            z-index: 99;
            display: flex;
            width: 56px;
            height: 56px;

            transition: width 0.2s ease-in-out;

            overflow: hidden;
            align-items: center;
        }

        .donation i {
            font-size: 30px;
        }

        .donation span {
            font-size: 14px;
            /* width: 0px; */
            text-wrap: nowrap;
            margin-left: 5px;

            overflow: hidden;
        }

        .donation:hover {
            width: 160px;
        }

        @media (max-width: 569px) {

            .donation,
            .donation:hover {
                width: fit-content;
                height: fit-content;
            }

            .donation i {
                font-size: 16px;
            }

            .donation span {
                font-size: 10px;
            }
        }

        footer {
            margin-top: -5px;
        }

        .login-mobile {
            display: block !important;
            width: 100px;
            margin-left: 10px;
            color: white;
        }

        .over_flow {

            line-height: 30px;
            overflow: hidden;


            /*The problematic part is below*/
            text-overflow: ellipsis;
            white-space: normal;
            text-align: justify;
            display: -webkit-box;
            -webkit-line-clamp: 5;
            -webkit-box-orient: vertical;
        }

        .cursor-pointer {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="loading">
        <img src="<?= baseUrl(); ?>./assets/img/logodesa.png" alt="" />
    </div>

    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <h1 class="logo">
                <a href="<?= baseUrl(); ?>">
                    <img src="<?= baseUrl(); ?>assets/img/logodesa.png" alt="" class="img-fluid" />
                </a>
            </h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li>
                        <a class="<?= active('root') ? 'active' : '' ?>" href="<?= baseUrl(); ?>">Home</a>
                    </li>
                    <li>
                        <a class="<?= active('profil') ? 'active' : '' ?>" href="<?= baseUrl(); ?>profil">Profil</a>
                    </li>
                    <li>
                        <a class="<?= active('umkm')  ? 'active' : '' ?>" href="<?= baseUrl(); ?>umkm?view=main">UMKM</a>
                    </li>
                    <!-- <li>
                        <a class="<?= active('berita') ? 'active' : '' ?>" href="<?= baseUrl(); ?>berita">Berita</a>
                    </li>
                    <li>
                        <a class="<?= active('galeri') ? 'active' : '' ?>" href="<?= baseUrl(); ?>galeri">Galeri</a>
                    </li> -->

                    <li>
                        <a class="<?= active('kontak-kami')  ? 'active' : '' ?>" href="<?= baseUrl(); ?>kontak-kami">Kontak</a>
                    </li>

                    <?php if (isset($_SESSION['status'])) : ?>

                        <li class="d-lg-none d-flex">
                            <a href="<?= baseUrl(); ?>functions/logout.php" class="btn btn-danger login-mobile text-light">Logout</a>
                        </li>
                        <li class="d-lg-none d-block">
                            <a href="<?= baseUrl(); ?>admin" class="d-flex justify-content-start align-items-center">
                                <img style="width:50px;" class="img-fluid rounded-circle  me-3" src="/assets/img/user.png" />
                                <span> <?= $_SESSION['data']['name'] ?>'</span>
                            </a>
                        </li>

                    <?php else : ?>
                        <li class="d-lg-none d-block">
                            <a href="<?= baseUrl(); ?>login.php" class="btn btn-success login-mobile text-light">Login</a>
                        </li>
                    <?php endif; ?>



                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

            <?php if (isset($_SESSION['status'])) : ?>
                <div class="flex-item-row d-lg-flex d-none">
                    <a href="<?= baseUrl(); ?>functions/logout.php" class="btn btn-danger align-items-center d-lg-flex me-3 d-none">Logout</a>
                    <a href="<?= baseUrl(); ?>admin" class="bg-light rounded-circle border">
                        <img class="img-fluid  d-lg-flex" style="width:50px;" src="<?= baseUrl(); ?>assets/img/user.png" />
                    </a>
                </div>
            <?php else : ?>
                <a href="<?= baseUrl(); ?>login.php" class="btn btn-success d-lg-block d-none">Login</a>
            <?php endif; ?>

            <!-- .navbar -->
        </div>
    </header>