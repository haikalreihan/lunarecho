<?php
header('Content-Type: application/json');

include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');

$response = ['success' => false, 'message' => 'Request tidak valid'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $peralatan_id = intval($_POST['peralatan_id']);

    if ($peralatan_id > 0) {
        // Proses hapus peralatan
        $sql = "DELETE FROM peralatan WHERE no = $peralatan_id";
        if (mysqli_query($conn, $sql)) {
            $response = ['success' => true, 'message' => 'Peralatan berhasil dihapus'];
        } else {
            $response['message'] = 'Gagal menghapus peralatan: ' . mysqli_error($conn);
        }
    } else {
        $response['message'] = 'ID peralatan tidak valid';
    }
}

echo json_encode($response);
exit();
?>