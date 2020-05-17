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
    <title>Login</title>
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
                    <img src="<?= $init->base_url("auth/images/login.png") ?>" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Login</h3>
                        <p>Don't have an account ? <a href="<?= $init->base_url('auth/register') ?>">Register</a> </p>
                        <?php
                        if (isset($_POST['submit'])) {
                            $email = trim(htmlspecialchars($_POST['email']));
                            $hitung = $init->hitung("SELECT * FROM users WHERE email = '$email' ");
                            if ($hitung > 0) {

                                $sql = $init->tampil("SELECT * FROM users WHERE email = '$email'")[0];

                                $is_active = $sql['is_active'];
                                if ($is_active == 0) {
                                    echo "<form method = 'post'>  
                                    <input class='form-control' type='email' name='email' placeholder='E-mail Address' required autocomplete='off' value = '$email' style = 'display:none;'>
                                    <div class='form-button'><button id='submit' type='submit' class='btn btn-success' name='submitActive'>Kirim ulang Aktivasi</button></div></form> ";
                                }
                            }
                        }

                        ?>
                        <form method="POST">
                            <input class="form-control" type="email" name="email" placeholder="E-mail Address" required autocomplete="off" autofocus>
                            <input class="form-control" type="password" name="password" placeholder="Password" required autocomplete="off">
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn" name="submit">Login</button> <a href="<?= $init->base_url('auth/forgotpass'); ?>">Forget password?</a>
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

if (isset($_GET['activate'])) {
    $var = trim(htmlspecialchars($_GET['activate']));

    $cek = $init->hitung("SELECT * FROM activate WHERE token = '$var'  ");

    if ($cek < 1) {

        echo "<script>
                    
                                swal('Whoopz!','Token tidak Valid ','error')
                            .then((result) => {
                                document.location = '../index'
                            });
                                </script>";
        exit;
    } else {
        echo $data = ($auth_init->verifyActivate($var)) ? '' : '';
    }
}

if (isset($_POST['submitActive'])) {
    $email = trim(htmlspecialchars($_POST['email']));
    echo $data = ($auth_init->activate($_POST) > 0) ? '' : '';
}


if (isset($_POST['submit'])) {


    echo $data = ($auth_init->login($_POST) > 0) ? '' : '';
}
?>