<?php

require_once __DIR__ . "/AndroidFunctions.php";

if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
    $init->kategoribab();
}
