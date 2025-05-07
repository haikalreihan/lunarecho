<?php
include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/session.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/user_info.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/unit.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/security.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $report_id = intval($_GET['id']);
    $unit_id = intval($_GET['unit']);
    $no_report = $_POST['no_report'];
    $tanggal_kegiatan = $_POST['tanggal_kegiatan'];
    $peralatan = $_POST['peralatan'];
    $uraian = $_POST['uraian'];
    $teknisi = $_POST['teknisi'];
    $mulai = $_POST['mulai'];
    $selesai = $_POST['selesai'];
    
    // Format datetime ke format yang benar jika perlu
    $mulai = date('Y-m-d H:i:s', strtotime($mulai));
    $selesai = date('Y-m-d H:i:s', strtotime($selesai));

    $query = "UPDATE `content_".$unit_id."` SET 
                `tanggal_kegiatan`='$tanggal_kegiatan', 
                `peralatan`='$peralatan', 
                `uraian`='$uraian', 
                `teknisi`='$teknisi', 
                `mulai`='$mulai', 
                `selesai`='$selesai'
              WHERE `no_report`='$no_report'";

    if (mysqli_query($conn, $query)) {
        header("Location: ../$unit_id/dashboard/edit/$report_id?successMessage=Content updated successfully");
    } else {
        header("Location: ../$unit_id/dashboard/edit/$report_id?errorMessage=Error updating content: ".mysqli_error($conn));
    }

    mysqli_close($conn);
}
?>