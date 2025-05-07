<?php
include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/session.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/user_info.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/access.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/unit.php');

$logbook_id = $_GET["id"];
$approve_id = $_SESSION["user_id"];

// Correcting the SQL query syntax for the UPDATE statement
$query = "UPDATE `{$unit_title}` SET status = '1', approve_id = '$approve_id' WHERE id = '$logbook_id'";
$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: ../../dashboard?successMessage=Telah memperbarui status logbook menjadi disetujui");
    die();
} else {
    header("Location: ../../dashboard?errorMessage=Error approve the logbook: ". mysqli_error($conn));
    die();
}
?>