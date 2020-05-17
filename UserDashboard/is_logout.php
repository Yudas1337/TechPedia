<?php
require_once __DIR__ . "/UserController.php";

$user->user_logout();
echo "<script>document.location='../index'</script>";
