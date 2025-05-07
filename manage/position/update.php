<?php
header('Content-Type: application/json');

include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');

$response = ['success' => false, 'message' => 'Request tidak valid'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_jabatan = mysqli_real_escape_string($conn, $_POST['position_name']);
    $jabatan_id = intval($_POST['position_id']);

    if (empty($nama_jabatan)) {
        $response['message'] = 'Nama jabatan tidak boleh kosong';
    } else {
        if ($jabatan_id > 0) {
            // Proses update jabatan
            $stmt = $conn->prepare("UPDATE positions SET name = ? WHERE no = ?");
            $stmt->bind_param('si', $nama_jabatan, $jabatan_id);
            if ($stmt->execute()) {
                $response = ['success' => true, 'message' => 'Jabatan berhasil diperbarui'];
            } else {
                error_log('Gagal memperbarui jabatan: ' . $stmt->error);
                $response['message'] = 'Gagal memperbarui jabatan';
            }
            $stmt->close();
        } else {
            // Proses tambah jabatan baru
            $stmt = $conn->prepare("INSERT INTO positions (name) VALUES (?)");
            $stmt->bind_param('s', $nama_jabatan);
            if ($stmt->execute()) {
                $response = ['success' => true, 'message' => 'Jabatan berhasil ditambahkan'];
            } else {
                error_log('Gagal menambahkan jabatan: ' . $stmt->error);
                $response['message'] = 'Gagal menambahkan jabatan';
            }
            $stmt->close();
        }
    }
} else {
    $response['message'] = 'Request method tidak valid';
    error_log('Request Method tidak valid: ' . $_SERVER['REQUEST_METHOD']);
}

echo json_encode($response);
exit();
?>