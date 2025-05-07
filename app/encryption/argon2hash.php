<?php
function argon2idHash($plaintext, $password, $encoding = null) {
    // Mengamankan plaintext dengan HMAC menggunakan SHA-256 dan password sebagai kunci
    $plaintextsecured = hash_hmac("sha256", $plaintext, $password);

    // Menghasilkan hash menggunakan Argon2id
    $hashed = password_hash($plaintextsecured, PASSWORD_ARGON2ID);

    // Mengembalikan hash dalam format yang diminta (hex, base64, atau raw)
    switch ($encoding) {
        case 'hex':
            return bin2hex($hashed);
        case 'base64':
            return base64_encode($hashed);
        default:
            return $hashed;
    }
}

function argon2idHashVerify($plaintext, $password, $hash, $encoding = null) {
    // Mengamankan plaintext dengan HMAC menggunakan SHA-256 dan password sebagai kunci
    $plaintextsecured = hash_hmac("sha256", $plaintext, $password);

    // Konversi hash kembali ke format asli jika diencode (hex atau base64)
    switch ($encoding) {
        case 'hex':
            $hash = hex2bin($hash);
            break;
        case 'base64':
            $hash = base64_decode($hash);
            break;
    }

    // Verifikasi hash dengan plaintextsecured
    return password_verify($plaintextsecured, $hash);
}
?>
