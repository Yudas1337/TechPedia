<?php

require_once __DIR__ . "/../AndroidFunctions.php";


if (isset($_POST['ulasan']) && isset($_POST['id']) && isset($_POST['id_user'])) {

    $init->tambahulasan();
}
