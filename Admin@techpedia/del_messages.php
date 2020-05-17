<?php

require_once __DIR__ . "/functions.php";
session_start();
if (!isset($_SESSION['key'])) {
    echo "<script>alert('Anda harus login dahulu')</script>";
    echo "<script>document.location='../login@admin_techpedia'</script>";
    exit;

}

if (isset($_GET['id_contact'])) {
    $id = abs(intval($_GET['id_contact']));

    if ($init->del_messages($id)) {
        echo "<script>document.location='../messages'</script>";
    }
}
