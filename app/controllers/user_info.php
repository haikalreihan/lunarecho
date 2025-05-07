<?php
$_SESSION['name'] = "Default";
$_SESSION['user_id'] = -1;
$_SESSION['profile_picture'] = "1.png";
$_SESSION["access_level"] = 0;

$username = mysqli_real_escape_string($conn, $_SESSION['username']);

// Buat query dengan menggunakan variabel yang sudah aman
$query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
while ($row = mysqli_fetch_assoc($query)) {
  $_SESSION['name'] = $row['name'];
  $_SESSION['user_id'] = $row['id'];
  $_SESSION["access_level"] = intval($row["access_level"]);
  $_SESSION['profile_picture'] = $row["profile_picture"];
}
?>