<?php
header('Content-Type: application/json');

include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/session.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/user_info.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/access.php');

$response = ['success' => false, 'message' => 'Request tidak valid'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize input values
    $userId = mysqli_real_escape_string($conn, $_POST['user_id']);
    $firstName = mysqli_real_escape_string($conn, $_POST['modalAddressFirstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['modalAddressLastName']);
    $username = mysqli_real_escape_string($conn, $_POST['modalUsername']);
    $gelar = mysqli_real_escape_string($conn, $_POST['modalGelar']);
    $email = mysqli_real_escape_string($conn, $_POST['modalAddressEmail']);
    $country = mysqli_real_escape_string($conn, $_POST['modalAddressCountry']);
    $position = mysqli_real_escape_string($conn, $_POST['inputGroupSelect01']);
    $address1 = mysqli_real_escape_string($conn, $_POST['modalAddressAddress1']);
    $address2 = mysqli_real_escape_string($conn, $_POST['modalAddressAddress2']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['modalPhoneNumber']);
    $city = mysqli_real_escape_string($conn, $_POST['modalAddressCity']);
    $state = mysqli_real_escape_string($conn, $_POST['modalAddressState']);
    $zipCode = mysqli_real_escape_string($conn, $_POST['modalAddressZipCode']);
    $technician = isset($_POST['technician']) ? 1 : 0;
    $access_level = mysqli_real_escape_string($conn, $_POST['editRadioIcon-01']);
    $signature = mysqli_real_escape_string($conn, $_POST['signature']);
    $username = strtolower($username);

    if (empty($userId) || empty($firstName) || empty($lastName) || empty($email) || empty($username)) {
        $response['message'] = 'ID, nama, username, email, dan detail lainnya tidak boleh kosong';
    } else if (empty($signature)) {
        $response['message'] = 'Tanda tangan belum diinputkan';
    } else if (!preg_match('/^[a-zA-Z0-9.]+$/', $username)) {
        $response['message'] = 'Username hanya boleh mengandung huruf, angka, dan titik (.)';
    } else {
        // Check if username already exists for a different user
        $checkUsernameSql = "SELECT id FROM users WHERE username = '$username' AND id != '$userId'";
        $result = mysqli_query($conn, $checkUsernameSql);

        if (mysqli_num_rows($result) > 0) {
            $response['message'] = 'Username sudah ada, silakan gunakan nama yang berbeda';
        } else {
            // Prepare SQL statement to update the user
            $sql = "UPDATE users 
                    SET name = '$firstName $lastName', 
                        username = '$username', 
                        gelar = '$gelar', 
                        email = '$email', 
                        access_level = '$access_level', 
                        position = '$position', 
                        technician = '$technician', 
                        signature = '$signature', 
                        country = '$country', 
                        phone_number = '$phoneNumber', 
                        address = '$address1 $address2', 
                        city = '$city', 
                        state = '$state', 
                        zip_code = '$zipCode'
                    WHERE id = '$userId'";

            if (mysqli_query($conn, $sql)) {
                $response = ['success' => true, 'message' => 'User berhasil diperbarui.'];
            } else {
                error_log('Gagal memperbarui user: ' . mysqli_error($conn));
                $response['message'] = 'Gagal memperbarui user';
            }
        }
    }
} else {
    $response['message'] = 'Request method tidak valid';
    error_log('Request Method tidak valid: ' . $_SERVER['REQUEST_METHOD']);
}

echo json_encode($response);
exit();
?>