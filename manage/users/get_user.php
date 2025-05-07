<?php
header('Content-Type: application/json');

include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/session.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/user_info.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/access.php');

$response = ['success' => false, 'message' => 'Request tidak valid'];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve and sanitize input values
    $userId = mysqli_real_escape_string($conn, $_GET['user_id']);

    if (empty($userId)) {
        $response['message'] = 'User ID tidak boleh kosong';
    } else {
        // Prepare SQL statement to retrieve user details
        $sql = "SELECT * FROM users WHERE id = '$userId' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            // Split the name into first name and last name
            $nameParts = explode(' ', $user['name'], 2);
            $user['first_name'] = $nameParts[0];
            $user['last_name'] = $nameParts[1] ?? '';

            // Split the address into address1 and address2
            $addressParts = explode(' ', $user['address'], 2);
            $user['address1'] = $addressParts[0];
            $user['address2'] = $addressParts[1] ?? '';

            $response = ['success' => true, 'user' => $user];
        } else {
            $response['message'] = 'User tidak ditemukan';
        }
    }
} else {
    $response['message'] = 'Request method tidak valid';
}

echo json_encode($response);
exit();
?>