<?php
// Ambil URL yang ingin diubah menjadi barcode
$url = "https://haikal.engineer/public/profile/" . $_GET["username"]; // Ganti dengan URL yang sesuai

// Encode URL untuk digunakan dalam permintaan API
$encodedUrl = urlencode($url);

// URL QR code API untuk menghasilkan QR Code
$qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data={$encodedUrl}"; // Ukuran diperbesar

// Path gambar custom (misalnya logo) yang memiliki background transparan
$customImage = $_SERVER['DOCUMENT_ROOT'].'/assets/img/qrcode/logo.png'; // Ganti dengan path gambar Anda

// Ambil gambar QR code dari URL API
$qrCodeImage = imagecreatefrompng($qrCodeUrl);
if ($qrCodeImage === false) {
    die("Gagal memuat gambar QR Code dari URL");
}

// Load gambar custom
$customLogo = imagecreatefrompng($customImage);
if ($customLogo === false) {
    die("Gagal memuat gambar custom. Pastikan path dan format gambar benar.");
}

// Mendapatkan lebar dan tinggi dari QR code dan gambar custom
$qrWidth = imagesx($qrCodeImage);
$qrHeight = imagesy($qrCodeImage);
$logoWidth = imagesx($customLogo);
$logoHeight = imagesy($customLogo);

// Menentukan ukuran baru untuk gambar custom agar tidak terlalu besar
$newLogoWidth = $qrWidth * 0.2; // 20% dari lebar QR code
$newLogoHeight = $logoHeight * ($newLogoWidth / $logoWidth); // mempertahankan rasio aspek

// Membuat gambar baru dengan ukuran yang diubah
$resizedLogo = imagecreatetruecolor($newLogoWidth, $newLogoHeight);

// Menjaga transparansi
imagealphablending($resizedLogo, false);
imagesavealpha($resizedLogo, true);
$transparent = imagecolorallocatealpha($resizedLogo, 0, 0, 0, 127);
imagefill($resizedLogo, 0, 0, $transparent);

// Menyalin dan mengubah ukuran gambar custom ke gambar baru yang telah diubah ukurannya
imagecopyresampled($resizedLogo, $customLogo, 0, 0, 0, 0, $newLogoWidth, $newLogoHeight, $logoWidth, $logoHeight);

// Menentukan posisi untuk gambar custom di tengah QR code
$logoX = ($qrWidth - $newLogoWidth) / 2;
$logoY = ($qrHeight - $newLogoHeight) / 2;

// Menggabungkan gambar custom ke dalam QR code
imagecopy($qrCodeImage, $resizedLogo, $logoX, $logoY, 0, 0, $newLogoWidth, $newLogoHeight);

// Mengatur header untuk output gambar
header('Content-Type: image/png');

// Output gambar ke browser
imagepng($qrCodeImage);

// Membersihkan memori
imagedestroy($qrCodeImage);
imagedestroy($customLogo);
imagedestroy($resizedLogo);

exit;
?>