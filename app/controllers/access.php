<?php
if ($_SESSION['access_level'] < 2) {
    header("Location: ".BASE_URL."/dashboard?errorMessage=Anda tidak mempunyai akses pada halaman ini.");
    die();
}
?>