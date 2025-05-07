<?php
header('Content-Type: application/json');

include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/session.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/user_info.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/access.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/encryption/argon2hash.php');

$response = ['success' => false, 'message' => 'Request tidak valid'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize input values
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
    $access_level = $_POST['customRadioIcon-01'];
    $signature = mysqli_real_escape_string($conn, $_POST['signature']);
    $password = argon2idHash("defaultpassword", 'airnavlogcat123');

    if (empty($firstName) || empty($lastName) || empty($email) || empty($username)) {
        $response['message'] = 'Nama, username, email, dan detail lainnya tidak boleh kosong';
    } else if (!preg_match('/^[a-zA-Z0-9.]+$/', $username)) {
        $response['message'] = 'Username hanya boleh mengandung huruf, angka, dan titik (.)';
    } else if (empty($signature)) {
        $response['message'] = 'Tanda tangan belum diinputkan';
    } else {
        // Check if username already exists
        $check_query = "SELECT id FROM users WHERE username = '".strtolower($username)."'";
        $result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($result) > 0) {
            $response['message'] = 'Username sudah digunakan, silakan pilih username lain';
        } else {
            // Prepare SQL statement to insert the new user
            $sql = "INSERT INTO users (name, gelar, username, email, password, access_level, profile_picture, position, technician, signature, country, phone_number, address, city, state, zip_code, joined)
                    VALUES ('$firstName $lastName', '$gelar' , '".strtolower($username)."', '$email', '$password', '$access_level', 'default.png', '$position', '$technician', '$signature', '$country', '$phoneNumber', '$address1 $address2', '$city', '$state', '$zipCode', NOW())";

            if (mysqli_query($conn, $sql)) {
                $response = ['success' => true, 'message' => 'User berhasil ditambahkan. Default password: "defaultpassword"'];
            } else {
                error_log('Gagal menambahkan user: ' . mysqli_error($conn));
                $response['message'] = 'Gagal menambahkan user';
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