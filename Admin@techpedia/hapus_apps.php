<?php

require_once __DIR__ . "/functions.php";
session_start();
if (!isset($_SESSION['key'])) {
    echo "<script>alert('Anda harus login dahulu')</script>";
    echo "<script>document.location='../login@admin_techpedia'</script>";
    exit;
}

if (isset($_GET['apps_uri'])) {
    $var = trim(htmlspecialchars($_GET['apps_uri']));

    if ($init->hapus_apps($var)) {
        echo "<script>document.location='../apps'</script>";
    }
}
