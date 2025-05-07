<?php
header('Content-Type: application/json');

include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');

$response = ['success' => false, 'message' => 'Request tidak valid'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jabatan_id = intval($_POST['position_id']);

    if ($jabatan_id > 0) {
        // Proses hapus jabatan
        $sql = "DELETE FROM positions WHERE no = $jabatan_id";
        if (mysqli_query($conn, $sql)) {
            $response = ['success' => true, 'message' => 'Jabatan berhasil dihapus'];
        } else {
            $response['message'] = 'Gagal menghapus jabatan: ' . mysqli_error($conn);
        }
    } else {
        $response['message'] = 'ID jabatan tidak valid';
    }
}

echo json_encode($response);
exit();
?>