<?php
session_start();
require_once __DIR__ . "/authController.php";
require_once __DIR__ . "/../Admin@techpedia/functions.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
                    <img src="<?= $init->base_url("auth/images/register.png") ?>" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Register</h3>
                        <p>Already have an account ? <a href="<?= $init->base_url('auth') ?>">Login</a> </p>
                        <div class="page-links">
                        </div>
                        <form method="POST">
                            <input type="text" name="nama" autocomplete="off" class="form-control" required placeholder="Name" autofocus value="<?= $data = (isset($_POST['nama'])) ? $_POST['nama'] : ''  ?>">
                            <input class="form-control" type="email" name="email" placeholder="E-mail Address" required autocomplete="off" value="<?= $data = (isset($_POST['email'])) ? $_POST['email'] : ''  ?>">
                            <input class="form-control" type="number" name="telepon" placeholder="Phone Number" required autocomplete="off" value="<?= $data = (isset($_POST['telepon'])) ? $_POST['telepon'] : ''  ?>">
                            <input class="form-control" type="password" name="password" placeholder="Password" required autocomplete="off" value="<?= $data = (isset($_POST['password'])) ? $_POST['password'] : ''  ?>">
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn" name="submit">Register</button>
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


    echo $data = ($auth_init->register($_POST) > 0) ? '' : '';
}
?>