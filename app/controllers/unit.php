<?php
$unit_id = $_GET["unit"];

// Validasi input untuk memastikan bahwa $unit_id adalah angka yang valid
if (is_numeric($unit_id) && $unit_id > 0 && $unit_id <= 9) {
    $constant_unit = 'UNIT_' . $unit_id;
    $_SESSION["unit"] = $constant_unit;
    
    // Periksa apakah constant dengan nama tersebut ada
    if (defined($constant_unit)) {
        $unit_title = strtolower(constant($constant_unit));
    } else {
        header("Location: ".BASE_URL."/dashboard?errorMessage=Unit not found");
        die();
    }
} else {
    header("Location: ".BASE_URL."/dashboard?errorMessage=Invalid unit ID");
    die();
}
?>