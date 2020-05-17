<?php

require_once __DIR__ . "/functions.php";
session_start();
if (!isset($_SESSION['key'])) {
    echo "<script>alert('Anda harus login dahulu')</script>";
    echo "<script>document.location='../login@admin_techpedia'</script>";
    exit;
}

if (isset($_GET['hapusServices'])) {
    $var = trim(htmlspecialchars($_GET['hapusServices']));

    if ($init->hapus_services($var)) {
        echo "<script>document.location='../services'</script>";
    }
}
