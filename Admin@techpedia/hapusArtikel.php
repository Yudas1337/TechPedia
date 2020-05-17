<?php

require_once __DIR__ . "/functions.php";
session_start();
if (!isset($_SESSION['key'])) {
    echo "<script>alert('Anda harus login dahulu')</script>";
    echo "<script>document.location='../login@admin_techpedia'</script>";
    exit;
}

if (isset($_GET['artikel_uri'])) {
    $id = trim(htmlspecialchars($_GET['artikel_uri']));

    if ($init->hapusArtikel($id)) {
        echo "<script>document.location='../artikel'</script>";
    }
}
