<?php
include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/session.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/unit.php');
// Set timezone ke Indonesia (WIB)
date_default_timezone_set('Asia/Jakarta');
// Masukkan ke dalam database jika form di-submit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nameWithTitle'])) {
    $nameWithTitle = $_POST['nameWithTitle'];
    $dateWithTitle = $_POST['dateWithTitle'];
    $user_id = $_SESSION['user_id'];
    $namePerson = $_SESSION['name'];
    $profile_picture = $_SESSION['profile_picture'];
    $shift = $_POST['radio_shift'];
    
    if ($shift < 0 || $shift > 3) {
        header("Location: ".BASE_URL."/logbook/".$unit_id."/dashboard?errorMessage=Terjadi kesalahan dalam shift, mohon ulang lagi.");
        die();
    }
    
    if (strlen($nameWithTitle) < 5 || strlen($nameWithTitle) > 64) {
        header("Location: ".BASE_URL."/logbook/".$unit_id."/dashboard?errorMessage=Judul harus lebih dari 5 karakter atau kurang dari 64 karakter");
        die();
    }
    
    // Hitung jumlah baris dalam tabel
    $countQuery = "SELECT COUNT(*) as total FROM `content_".$unit_id."`";
    $result = mysqli_query($conn, $countQuery);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $totalRows = $row['total'] + 1; // Tambahkan 1 ke jumlah baris
    } else {
        header("Location: ".BASE_URL."/logbook/".$unit_id."/dashboard?errorMessage=Gagal menghitung jumlah baris: " . mysqli_error($conn));
        die();
    }

    // Ambil nilai terbesar dari kolom `no`
    $maxNoQuery = "SELECT MAX(no) as max_no FROM `content_".$unit_id."`";
    $result = mysqli_query($conn, $maxNoQuery);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $noReport = $row['max_no'] + 1; // Tambahkan 1 ke nilai terbesar
    } else {
        header("Location: ".BASE_URL."/logbook/".$unit_id."/dashboard?errorMessage=Gagal mengambil nilai no terbesar: " . mysqli_error($conn));
        die();
    }

    $insertQuery = "INSERT INTO `$unit_title` (id, tanggal_kegiatan, judul, shift, status, author_id) VALUES ('$totalRows', '$dateWithTitle', '$nameWithTitle', '$shift', '0', '$user_id')";
    $insertQuery2 = "INSERT INTO `content_".$unit_id."` (id, no_report, tanggal_kegiatan, peralatan, uraian, teknisi, mulai, selesai) VALUES ($totalRows, $noReport, null, '', 'Edit me to start', '', null, null)";

    if (mysqli_query($conn, $insertQuery) && mysqli_query($conn, $insertQuery2)) {
        // Masukkan data ke tabel notification
        $currentDateTime = date('Y-m-d H:i:s');
        $notificationBody = $namePerson.' has added new logbook on '.strtoupper($unit_title).' with title "'. $nameWithTitle.'"';
        $notificationLink = '../../logbook/'.$unit_id.'/dashboard';
        $notificationQuery = "INSERT INTO notifications (author_id, title, date, body, profile, link) VALUES ('$user_id','New Logbook', '$currentDateTime', '$notificationBody', '$profile_picture', '$notificationLink')";
        
        if (mysqli_query($conn, $notificationQuery)) {
            $notificationId = mysqli_insert_id($conn);

            // Dapatkan semua user_id
            $userQuery = "SELECT id FROM users";
            $userResult = mysqli_query($conn, $userQuery);

            while ($userRow = mysqli_fetch_assoc($userResult)) {
                $userId = $userRow['id'];
                $userNotificationQuery = "INSERT INTO user_notifications (user_id, notification_id, status) VALUES ($userId, $notificationId, 0)";
                mysqli_query($conn, $userNotificationQuery);
            }
            
            header("Location: ".BASE_URL."/logbook/".$unit_id."/dashboard?successMessage=Data berhasil ditambahkan");
            die();
        } else {
            header("Location: ".BASE_URL."/logbook/".$unit_id."/dashboard?errorMessage=Data berhasil ditambahkan tetapi gagal menambahkan notifikasi: " . mysqli_error($conn));
            die();
        }
    } else {
        header("Location: ".BASE_URL."/logbook/".$unit_id."/dashboard?errorMessage=" . mysqli_error($conn));
        die();
    }
}
?>