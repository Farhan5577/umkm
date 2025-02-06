
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin Desa Margourip</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= baseUrl(); ?>assets/img/logodesa.jpg" rel="icon">
    <link href="<?= baseUrl(); ?>assets/img/logodesa.jpg" rel="logo-web.png">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= baseUrl(); ?>admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= baseUrl(); ?>admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= baseUrl(); ?>admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= baseUrl(); ?>admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= baseUrl(); ?>admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= baseUrl(); ?>admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= baseUrl(); ?>admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= baseUrl(); ?>admin/assets/css/style.css" rel="stylesheet">

    <style>
        table th,
        table td {
            vertical-align: middle;
        }
    </style>

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="<?= baseUrl(); ?>" class="logo d-flex align-items-center">
                <!-- <img src="<?= baseUrl(); ?>assets/img/logodesa.png" alt=""> -->
                <span class="d-none d-lg-block">Margourip</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->



        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">


                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="<?= baseUrl(); ?>" data-bs-toggle="dropdown">
                        <img src="<?= baseUrl(); ?>assets/img/user.png" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">
                            <?= $_SESSION['data']['name'] ?>
                        </span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>
                                <?= $_SESSION['data']['name'] ?>
                            </h6>

                        </li>


                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?= baseUrl(); ?>functions/logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->