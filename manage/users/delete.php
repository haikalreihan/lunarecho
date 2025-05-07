<?php
header('Content-Type: application/json');

include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');

$response = ['success' => false, 'message' => 'Request tidak valid'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = intval($_POST['user_id']);

    if ($user_id > 0) {
        // Start transaction
        mysqli_begin_transaction($conn);

        try {
            // 1. Drop the foreign key constraint
            $sql = "ALTER TABLE user_notifications DROP FOREIGN KEY user_notifications_ibfk_1";
            if (!mysqli_query($conn, $sql)) {
                throw new Exception('Gagal menghapus constraint: ' . mysqli_error($conn));
            }

            // 2. Delete the desired user from user_notifications
            $sql = "DELETE FROM user_notifications WHERE user_id = $user_id";
            if (!mysqli_query($conn, $sql)) {
                throw new Exception('Gagal menghapus dari user_notifications: ' . mysqli_error($conn));
            }

            // 3. Delete the user from users table
            $sql = "DELETE FROM users WHERE id = $user_id";
            if (!mysqli_query($conn, $sql)) {
                throw new Exception('Gagal menghapus user: ' . mysqli_error($conn));
            }

            // 4. Recreate the foreign key constraint
            $sql = "
                ALTER TABLE user_notifications
                ADD CONSTRAINT user_notifications_ibfk_1
                FOREIGN KEY (user_id) REFERENCES users(id)";
            if (!mysqli_query($conn, $sql)) {
                throw new Exception('Gagal menambahkan kembali constraint: ' . mysqli_error($conn));
            }

            // Commit transaction
            mysqli_commit($conn);

            $response = ['success' => true, 'message' => 'User berhasil dihapus'];
        } catch (Exception $e) {
            // Rollback transaction
            mysqli_rollback($conn);
            $response['message'] = $e->getMessage();
        }
    } else {
        $response['message'] = 'ID user tidak valid';
    }
}

echo json_encode($response);
exit();
?>