<?php
require_once __DIR__ . "/functions.php";
session_start();
if (!isset($_SESSION['key'])) {
    echo "<script>alert('Anda harus login dahulu')</script>";
    echo "<script>document.location='../../login@admin_techpedia'</script>";
    exit;

    if ($_SESSION['id_role'] != '1') {

        echo "<script>alert('Anda tidak punya hak untuk mengakses ini')</script>";
        echo "<script>document.location='../../login@admin_techpedia'</script>";
        exit;
    }
}


if (isset($_GET['id_admin'])) {
    $id = abs(intval($_GET['id_admin']));
    if ($init->edit_admins($id)) {
        echo "<script>document.location='../admins'</script>";
    }
}
