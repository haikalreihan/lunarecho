<?php
$is_author = false;
$query = mysqli_query($conn, "SELECT * FROM `".$unit_title."` WHERE id = ".$_GET["id"]);
while ($row = mysqli_fetch_assoc($query)) {
    if ($_SESSION["user_id"] == $row["author_id"] || $_SESSION["access_level"] > 0){ $is_author = true; }
}
if (!$is_author) {
    header("Location: ../../dashboard?errorMessage=Anda tidak mempunyai akses untuk mengedit logbook tersebut!");
    die();
}
?>