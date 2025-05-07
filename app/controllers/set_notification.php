<?php
include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/session.php');

$notification_id = $_GET["notification_id"];
$user_id = $_SESSION["user_id"]; // Mengasumsikan user_id disimpan di sesi

if (isset($notification_id) && $notification_id != 0){
    // Menghubungkan ke database
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Memulai transaksi
    $conn->begin_transaction();

    try {
        // Menyiapkan pernyataan SQL untuk memperbarui status
        $stmt = $conn->prepare("UPDATE user_notifications SET status = 1 WHERE notification_id = ? AND user_id = ?");
        $stmt->bind_param("ii", $notification_id, $user_id);

        // Menjalankan pernyataan
        if (!$stmt->execute()) {
            throw new Exception("Kesalahan memperbarui status notifikasi: " . $stmt->error);
        }

        // Menutup pernyataan
        $stmt->close();

        // Menyiapkan pernyataan SQL untuk mengambil link
        $stmt = $conn->prepare("SELECT link FROM notifications WHERE id = ?");
        $stmt->bind_param("i", $notification_id);

        // Menjalankan pernyataan
        if (!$stmt->execute()) {
            throw new Exception("Kesalahan mengambil link notifikasi: " . $stmt->error);
        }

        // Mengikat hasil
        $stmt->bind_result($link);
        $stmt->fetch();

        // Menutup pernyataan
        $stmt->close();

        // Komit transaksi
        $conn->commit();

        // Menutup koneksi
        $conn->close();

        // Mengarahkan ke link
        header("Location: " . $link);
        die();

    } catch (Exception $e) {
        // Membatalkan transaksi
        $conn->rollback();

        // Menutup pernyataan dan koneksi
        if ($stmt) {
            $stmt->close();
        }
        $conn->close();

        // Mengarahkan dengan pesan kesalahan
        header("Location: " . BASE_URL . "?errorMessage=" . $e->getMessage());
        die();
    }

} else {
    header("Location: ".BASE_URL."?errorMessage=Terjadi sebuah error saat mengambil notifikasi id.");
    die();
}
?>