<?php
session_start();
require_once __DIR__ . "/authController.php";
require_once __DIR__ . "/../Admin@techpedia/functions.php";
if (isset($_SESSION['keyUsers'])) {
    echo "<script>document.location='../UserDashboard/index'</script>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="<?= $init->base_url('auth/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= $init->base_url('auth/css/fontawesome-all.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= $init->base_url('auth/css/iofrm-style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= $init->base_url('auth/css/iofrm-theme4.css') ?>">
    <link rel="stylesheet" href="<?= $init->base_url('Admin@techpedia/assets/css/sweetalert.css') ?>" media="screen" title="no title">
</head>

<body>
    <div class="form-body">
        <div class="website-logo">
            <div class="logo">
                <img class="logo-size" src="<?= $init->base_url('auth/images/logo-light.svg') ?>" alt="">
            </div>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="info-holder">
                    <img src="<?= $init->base_url("auth/images/forgotpass.png") ?>" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Forgot Password</h3>
                        <p>Enter your email address to reset password</p>
                        <div class="page-links">
                        </div>
                        <form method="POST">
                            <input class="form-control" type="email" name="email" placeholder="E-mail Address" required autocomplete="off" autofocus>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn" name="submit">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= $init->base_url('auth/js/jquery.min.js') ?>"></script>
    <script src="<?= $init->base_url('auth/js/popper.min.js') ?>"></script>
    <script src="<?= $init->base_url('auth/js/bootstrap.min.js') ?>"></script>
    <script src="<?= $init->base_url('auth/js/main.js') ?>"></script>
    <script type="text/javascript" src="<?= $init->base_url('Admin@techpedia/assets/js/sweetalert.min.js') ?>"></script>

</body>

</html>

<?php
if (isset($_POST['submit'])) {


    echo $data = ($auth_init->forgotpass($_POST) > 0) ? '' : '';
}
?>