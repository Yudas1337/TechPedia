<?php

require_once __DIR__ . "/functions.php";
session_start();
if (!isset($_SESSION['key'])) {
    echo "<script>alert('Anda harus login dahulu')</script>";
    echo "<script>document.location='../login@admin_techpedia'</script>";
    exit;
}

if (isset($_GET['del_modules'])) {
    $var = trim(htmlspecialchars($_GET['del_modules']));

    if ($init->hapus_modules($var)) {
        echo "<script>document.location='../modules'</script>";
    }
}
