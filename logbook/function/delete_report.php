<?php
header('Content-Type: application/json');

include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');

$response = ['success' => false, 'message' => 'Request tidak valid'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $unit_title = $_POST['unit_title'];
    $unit_id = $_POST['unit_id'];
    $id = intval($_POST['id']);

    if ($id > 0) {
        // Start a transaction
        mysqli_begin_transaction($conn);

        try {
            // Proses hapus dari tabel unit
            $sql_delete = "DELETE FROM `".$unit_title."` WHERE id = $id";
            if (!mysqli_query($conn, $sql_delete)) {
                throw new Exception('Gagal menghapus dari tabel: ' . mysqli_error($conn));
            }

            // Proses hapus dari tabel content_1
            $sql_delete_1 = "DELETE FROM content_".$unit_id." WHERE id = $id";
            if (!mysqli_query($conn, $sql_delete_1)) {
                throw new Exception('Gagal menghapus dari tabel content: ' . mysqli_error($conn));
            }

            // Commit transaction
            mysqli_commit($conn);

            $response = ['success' => true, 'message' => 'Data berhasil dihapus'];
        } catch (Exception $e) {
            // Rollback transaction
            mysqli_rollback($conn);
            $response['message'] = $e->getMessage();
        }
    } else {
        $response['message'] = 'ID tidak valid';
    }
}

echo json_encode($response);
exit();
?>