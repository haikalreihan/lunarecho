<?php
function argon2idHash($plaintext, $password) {
    $plaintextsecured = hash_hmac("sha256", $plaintext, $password);
    return password_hash($plaintextsecured, PASSWORD_ARGON2ID);
}

$hash = argon2idHash("goblok123", "airnavlogcat123");
echo "Hash: " . $hash;
?>
