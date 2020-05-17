<?php

require_once __DIR__ . "/functions.php";
session_start();
if (!isset($_SESSION['key'])) {
    echo "<script>alert('Anda harus login dahulu')</script>";
    echo "<script>document.location='../login@admin_techpedia'</script>";
    exit;
}

if (isset($_GET['id_appsdetail'])) {
    $var = trim(htmlspecialchars($_GET['id_appsdetail']));

    if ($init->hapus_appsdetail($var)) {
        echo "<script>document.location='../AppsDetail'</script>";
    }
}
