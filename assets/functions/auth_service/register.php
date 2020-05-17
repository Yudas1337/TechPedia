<?php

require_once __DIR__ . "/../AndroidFunctions.php";


if (isset($_POST['nama']) && isset($_POST['email']) && isset($_POST['telepon']) && isset($_POST['password'])) {

    $init->register();
}
