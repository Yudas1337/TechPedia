<?php
session_start();
require_once __DIR__ . "/../../Admin@techpedia/functions.php";

require_once __DIR__ . "/../UserController.php";

if (!isset($_SESSION['keyUsers'])) {

    exit;
}

$id_user = $_SESSION['idUsers'];
$ambil = $init->tampil("SELECT * FROM users WHERE id_user = '$id_user' ")[0];

$contact = $init->tampil("SELECT * FROM contact_us ORDER BY id_contact DESC LIMIT 10");
?>

<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $init->base_url('UserDashboard/assets/images/favicon.png') ?> ">
    <title>Dashboard</title>
    <link href="<?= $init->base_url('UserDashboard/assets/dist/css/style.min.css') ?>" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="<?= $init->base_url('UserDashboard/assets/dist/css/pages/dashboard1.css') ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?= $init->base_url('UserDashboard/assets/node_modules/Magnific-Popup-master/dist/magnific-popup.css') ?>">
    <link rel="stylesheet" href="<?= $init->base_url('UserDashboard/assets/dist/css/pages/user-card.css') ?>">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<![endif]-->

    <link href='<?= $init->base_url('UserDashboard/assets/icons/font-awesome/webfonts/fa-solid-900.woff') ?>' rel='stylesheet' type='text/css'>

    <link href='<?= $init->base_url('UserDashboard/assets/icons/weather-icons/fonts/weathericons-regular-webfont.woff2') ?>' rel='stylesheet' type='text/css'>


    <link rel="stylesheet" type="text/css" href="<?= $init->base_url('UserDashboard/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= $init->base_url('UserDashboard/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') ?>">
    <link rel="stylesheet" href="<?= $init->base_url('UserDashboard/assets/css/sweetalert.css') ?>" media="screen" title="no title">

</head>

<body class="skin-blue fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">TechPedia</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?= $init->base_url('UserDashboard') ?>">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- Light Logo icon -->
                            <h3>Dashboard</h3>
                        </b>

                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">

                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= $init->base_url('assets/images/foto_users/' . $ambil['foto_profil']); ?>" <span class="hidden-md-down"> <?= $ambil['nama']; ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <!-- text-->
                                <a href="<?= $init->base_url("UserDashboard/profile") ?>" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="<?= $init->base_url("UserDashboard/update_pass") ?>" class="dropdown-item"><i class="ti-settings"></i> Update Password</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="<?= $init->base_url('UserDashboard/is_logout') ?>" class="dropdown-item sweetalertNya"><i class="fa fa-power-off"></i> Logout</a>
                                <!-- text-->
                            </div>
                            </<a>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->