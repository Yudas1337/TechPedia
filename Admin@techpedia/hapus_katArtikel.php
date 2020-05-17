<?php

require_once __DIR__ . "/functions.php";
session_start();
if (!isset($_SESSION['key'])) {
    echo "<script>alert('Anda harus login dahulu')</script>";
    echo "<script>document.location='../login@admin_techpedia'</script>";
}

if (isset($_GET['del_categoryArtikel'])) {
    $var = trim(htmlspecialchars($_GET['del_categoryArtikel']));

    if ($init->hapus_katArtikel($var)) {
        echo "<script>document.location='../kategoriArtikel'</script>";
    }
}
