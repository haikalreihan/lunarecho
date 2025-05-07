<?php
header('Content-Type: application/json');

include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');

$response = ['success' => false, 'message' => 'Request tidak valid'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no_report = intval($_POST['report_id']);
    $unit_id = intval($_POST['unit_id']);

    if ($no_report > 0) {
        // Proses hapus peralatan
        $sql = "DELETE FROM `content_".$unit_id."` WHERE no_report = $no_report";
        if (mysqli_query($conn, $sql)) {
            // Proses update nomor urut
            $sql_update = "SET @row_number = 0;";
            $sql_update .= "UPDATE `content_".$unit_id."` SET no_report = (@row_number:=@row_number + 1) ORDER BY no_report ASC;";

            // Jalankan kedua query secara terpisah menggunakan mysqli_multi_query
            if (mysqli_multi_query($conn, $sql_update)) {
                do {
                    // Store first result set
                    if ($result = mysqli_store_result($conn)) {
                        mysqli_free_result($result);
                    }
                } while (mysqli_next_result($conn));

                $response = ['success' => true, 'message' => 'Isi logbook berhasil dihapus dan nomor urut diperbarui'];
            } else {
                $response['message'] = 'Gagal memperbarui nomor urut: ' . mysqli_error($conn);
            }
        } else {
            $response['message'] = 'Gagal menghapus isi logbook: ' . mysqli_error($conn);
        }
    } else {
        $response['message'] = 'ID isi logbook tidak valid';
    }
}

echo json_encode($response);
exit();
?>