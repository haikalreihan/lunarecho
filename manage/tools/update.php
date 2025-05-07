<?php
header('Content-Type: application/json');

include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');

$response = ['success' => false, 'message' => 'Request tidak valid'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_peralatan = mysqli_real_escape_string($conn, $_POST['tools_name']);
    $peralatan_id = intval($_POST['peralatan_id']);

    if (empty($nama_peralatan)) {
        $response['message'] = 'Nama peralatan tidak boleh kosong';
    } else {
        if ($peralatan_id > 0) {
            // Proses update peralatan
            $stmt = $conn->prepare("UPDATE peralatan SET peralatan = ? WHERE no = ?");
            $stmt->bind_param('si', $nama_peralatan, $peralatan_id);
            if ($stmt->execute()) {
                $response = ['success' => true, 'message' => 'Peralatan berhasil diperbarui'];
            } else {
                error_log('Gagal memperbarui peralatan: ' . $stmt->error);
                $response['message'] = 'Gagal memperbarui peralatan';
            }
            $stmt->close();
        } else {
            // Proses tambah peralatan baru
            $stmt = $conn->prepare("INSERT INTO peralatan (peralatan) VALUES (?)");
            $stmt->bind_param('s', $nama_peralatan);
            if ($stmt->execute()) {
                $response = ['success' => true, 'message' => 'Peralatan berhasil ditambahkan'];
            } else {
                error_log('Gagal menambahkan peralatan: ' . $stmt->error);
                $response['message'] = 'Gagal menambahkan peralatan';
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