<?php

require_once __DIR__ . "/functions.php";
session_start();
if (!isset($_SESSION['key'])) {
    echo "<script>alert('Anda harus login dahulu')</script>";
    echo "<script>document.location='../login@admin_techpedia'</script>";
    exit;
}

if (isset($_GET['id_portfolio'])) {
    $id = abs(intval($_GET['id_portfolio']));

    if ($init->hapus_portfolio($id)) {
        echo "<script>document.location='../portfolio'</script>";
    }
}
