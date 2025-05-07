<?php
include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/session.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/unit.php');
// Set timezone ke Indonesia (WIB)
date_default_timezone_set('Asia/Jakarta');
// Periksa apakah form telah di-submit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $nameWithTitle = $_POST['nameWithTitle'];
    $dateWithTitle = $_POST['dateWithTitle'];
    $shift = $_POST['radio_shift'];

    // Validasi shift
    if ($shift < 0 || $shift > 3) {
        header("Location: ".BASE_URL."/logbook/".$unit_id."/dashboard/edit/$id&errorMessage=Terjadi kesalahan dalam shift, mohon ulang lagi.");
        die();
    }
    
    if (strlen($nameWithTitle) < 5 || strlen($nameWithTitle) > 64) {
        header("Location: ".BASE_URL."/logbook/".$unit_id."/dashboard/edit/$id?errorMessage=Judul harus lebih dari 5 karakter atau kurang dari 64 karakter");
        die();
    }

    $updateQuery = "UPDATE `$unit_title` SET tanggal_kegiatan='$dateWithTitle', judul='$nameWithTitle', shift='$shift' WHERE id='$id'";
    
    // Eksekusi query
    if (mysqli_query($conn, $updateQuery)) {
        header("Location: ".BASE_URL."/logbook/".$unit_id."/dashboard/edit/$id?&successMessage=Data berhasil diperbarui");
        die();
    } else {
        header("Location: ".BASE_URL."/logbook/".$unit_id."/dashboard/edit/$id&errorMessage=" . mysqli_error($conn));
        die();
    }
}