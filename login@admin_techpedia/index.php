<?php
session_start();
require_once __DIR__ . "/authController.php";
require_once __DIR__ . "/../Admin@techpedia/functions.php";
if (isset($_SESSION['key'])) {
    echo "<script>document.location='../Admin@techpedia/index'</script>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" type="text/css" href="<?= $init->base_url('login@admin_techpedia/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= $init->base_url('login@admin_techpedia/css/fontawesome-all.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= $init->base_url('login@admin_techpedia/css/iofrm-style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= $init->base_url('login@admin_techpedia/css/iofrm-theme4.css') ?>">
    <link rel="stylesheet" href="<?= $init->base_url('Admin@techpedia/assets/css/sweetalert.css') ?>" media="screen" title="no title">
</head>

<body>
    <div class="form-body">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="<?= $init->base_url('login@admin_techpedia/images/logo-light.svg') ?>" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="<?= $init->base_url("login@admin_techpedia/images/graphic1.svg") ?>" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Admin Area</h3>
                        <p>Login to Gain Backend Access</p>
                        <div class="page-links">
                        </div>
                        <form method="POST">
                            <input class="form-control" type="email" name="email" placeholder="E-mail Address" required autocomplete="off" autofocus>
                            <input class="form-control" type="password" name="password" placeholder="Password" required autocomplete="off">
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn" name="submit">Login</button> <a href="forget4.html">Forget password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= $init->base_url('login@admin_techpedia/js/jquery.min.js') ?>"></script>
    <script src="<?= $init->base_url('login@admin_techpedia/js/popper.min.js') ?>"></script>
    <script src="<?= $init->base_url('login@admin_techpedia/js/bootstrap.min.js') ?>"></script>
    <script src="<?= $init->base_url('login@admin_techpedia/js/main.js') ?>"></script>
    <script type="text/javascript" src="<?= $init->base_url('Admin@techpedia/assets/js/sweetalert.min.js') ?>"></script>

</body>

</html>

<?php
if (isset($_POST['submit'])) {


    echo $data = ($auth_init->login($_POST) > 0) ? '' : '';
}
?>