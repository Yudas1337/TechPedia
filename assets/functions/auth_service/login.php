<?php


require_once __DIR__ . "/../AndroidFunctions.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
  

  $init->login();

}
