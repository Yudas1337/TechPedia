<?php

require_once __DIR__ . "/functions.php";
session_start();
if (!isset($_SESSION['key'])) {
    echo "<script>alert('Anda harus login dahulu')</script>";
    echo "<script>document.location='../login@admin_techpedia'</script>";
    exit;

    if ($_SESSION['id_role'] != '1') {

        echo "<script>alert('Anda tidak punya hak untuk mengakses ini')</script>";
        echo "<script>document.location='../login@admin_techpedia'</script>";
        exit;
    }
}

if (isset($_GET['id_role'])) {
    $id = abs(intval($_GET['id_role']));

    if ($init->hapus_admin_role($id)) {
        echo "<script>document.location='../admin_role'</script>";
    }
}
