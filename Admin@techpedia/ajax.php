<?php
require_once __DIR__ . "/functions.php";

if(isset($_POST['apps_uri']))
{
    $var = trim(htmlspecialchars($_POST['apps_uri']));
    $init->getAjax($var);
}
