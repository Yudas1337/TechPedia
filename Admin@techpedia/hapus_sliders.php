<?php

require_once __DIR__ . "/functions.php";
session_start();
if (!isset($_SESSION['key'])) {
    echo "<script>alert('Anda harus login dahulu')</script>";
    echo "<script>document.location='../login@admin_techpedia'</script>";
    exit;
}

if (isset($_GET['id_sliders'])) {
    $id = abs(intval($_GET['id_sliders']));

    if ($init->hapus_sliders($id)) {
        echo "<script>document.location='../sliders'</script>";
    }
}
