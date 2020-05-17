<?php
session_start();
require_once __DIR__ . "/../functions.php";

    if (!isset($_SESSION['key'])) {
   
    exit;
}

$id_admin = $_SESSION['id_admin'];
$ambil = $init->tampil("SELECT * FROM admins WHERE id_admin = '$id_admin' ")[0];

$contact = $init->tampil("SELECT * FROM contact_us ORDER BY id_contact DESC LIMIT 10");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $init->base_url('Admin@techpedia/assets/images/favicon.png') ?> ">
    <title>TechPedia</title>
    <link href="<?= $init->base_url('Admin@techpedia/assets/dist/css/style.min.css') ?>" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="<?= $init->base_url('Admin@techpedia/assets/dist/css/pages/dashboard1.css') ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?= $init->base_url('Admin@techpedia/assets/node_modules/Magnific-Popup-master/dist/magnific-popup.css') ?>">
    <link rel="stylesheet" href="<?= $init->base_url('Admin@techpedia/assets/dist/css/pages/user-card.css') ?>">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<![endif]-->

    <link href='<?= $init->base_url('Admin@techpedia/assets/icons/font-awesome/webfonts/fa-solid-900.woff') ?>' rel='stylesheet' type='text/css'>

    <link href='<?= $init->base_url('Admin@techpedia/assets/icons/weather-icons/fonts/weathericons-regular-webfont.woff2') ?>' rel='stylesheet' type='text/css'>


    <link rel="stylesheet" type="text/css" href="<?= $init->base_url('Admin@techpedia/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= $init->base_url('Admin@techpedia/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') ?>">
    <link rel="stylesheet" href="<?= $init->base_url('Admin@techpedia/assets/css/sweetalert.css') ?>" media="screen" title="no title">

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
                    <a class="navbar-brand" href="<?= $init->base_url('Admin@techpedia') ?>">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- Light Logo icon -->
                            <h3>TechPedia</h3>
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
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-note"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right animated bounceInDown" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">Messages</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <?php foreach ($contact as $c) : ?>
                                                <a href="<?= $init->base_url('Admin@techpedia/detail_messages/' . $c['id_contact']); ?>">
                                                    <div class="user-img"> <img src="<?= $init->base_url('assets/images/foto_users/default.png'); ?>"> <span class="profile-status online pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5><?= $c['nama']; ?></h5> <span class="mail-desc"><?= $c['subject']; ?></span> <span class="time"><?= $c['time']; ?></span>
                                                    </div>
                                                </a>
                                            <?php endforeach; ?>

                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href="<?= $init->base_url('Admin@techpedia/messages') ?>"> <strong>See all Messages</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= $init->base_url('assets/images/foto_users/' . $ambil['foto_profil']); ?>" <span class="hidden-md-down"> <?= $ambil['username']; ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <!-- text-->
                                <a href="<?= $init->base_url("Admin@techpedia/profile") ?>" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                <!-- text-->
                                <a href="<?= $init->base_url('Admin@techpedia/messages') ?>" class="dropdown-item"><i class="ti-email"></i> Messages</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="<?= $init->base_url("Admin@techpedia/update_pass") ?>" class="dropdown-item"><i class="ti-settings"></i> Update Password</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="<?= $init->base_url('Admin@techpedia/is_logout') ?>" class="dropdown-item sweetalertNya"><i class="fa fa-power-off"></i> Logout</a>
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