<?php
include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/session.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/user_info.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/unit.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/security.php');
// Set timezone ke Indonesia (WIB)
date_default_timezone_set('Asia/Jakarta');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal_kegiatan = $_POST['tanggal_kegiatan'];
    $peralatan = $_POST['peralatan'];
    $uraian = $_POST['uraian'];
    $teknisi = $_POST['teknisi'];
    $mulai = $_POST['mulai'];
    $selesai = $_POST['selesai'];
    $id = $_GET['id'];
    $unit_id = $_GET['unit'];
    
    if (strlen($uraian) < 10 || strlen($uraian) > 255) {
        header("Location: ".BASE_URL."/logbook/".$unit_id."/dashboard/edit/".$id."?errorMessage=Catatan harus berisi minimal 10 karakter dan maksimal 255 karakter.");
        die();
    }
    else if ($teknisi == -1) {
        header("Location: ".BASE_URL."/logbook/".$unit_id."/dashboard/edit/".$id."?errorMessage=Tidak ada teknisi, mohon di-input terlebih dahulu.");
        die();
    }
    
    $query = "SELECT MAX(no_report) AS max_no_report FROM content_".$unit_id." WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $no_report = $row['max_no_report'] ? $row['max_no_report'] + 1 : 1; // Increment or start with 1
    } else {
        header("Location: index.php?errorMessage=Error fetching no_report: " . mysqli_error($conn));
        exit;
    }
    
    $sql = "INSERT INTO content_".$unit_id." (id, no_report, tanggal_kegiatan, peralatan, uraian, teknisi, mulai, selesai) VALUES ('$id', $no_report, '$tanggal_kegiatan', '$peralatan', '$uraian', '$teknisi', '$mulai', '$selesai')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ".BASE_URL."/logbook/".$unit_id."/dashboard/edit/".$id."?successMessage=Logbook entry added successfully");
        die();
    } else {
        header("Location: ".BASE_URL."/logbook/".$unit_id."/dashboard/edit/".$id."?errorMessage=Error adding logbook entry: " . mysqli_error($conn));
        die();
    }
    mysqli_close($conn);
}
?>