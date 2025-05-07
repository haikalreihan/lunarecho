<?php
$total_fr = 0; $total_aa = 0; $total_sv = 0; $total_nv = 0; $total_rk = 0; $total_sj = 0; $total_lk = 0; $total_bg = 0;

// Query for FDPS-RDPS
$query_report_fr = mysqli_query($conn, "SELECT * FROM `fdps-rdps`");
while ($row_report_fr = mysqli_fetch_assoc($query_report_fr)) {
    $total_fr++;
}

// Query for AMSS-ADPS
$query_report_aa = mysqli_query($conn, "SELECT * FROM `amss-adps`");
while ($row_report_aa = mysqli_fetch_assoc($query_report_aa)) {
    $total_aa++;
}

// Query for SURVEILLANCE
$query_report_sv = mysqli_query($conn, "SELECT * FROM `surveillance`");
while ($row_report_sv = mysqli_fetch_assoc($query_report_sv)) {
    $total_sv++;
}

// Query for NAVIGATION
$query_report_nv = mysqli_query($conn, "SELECT * FROM `navigation`");
while ($row_report_nv = mysqli_fetch_assoc($query_report_nv)) {
    $total_nv++;
}

// Query for RADIO-KOMUNIKASI
$query_report_rk = mysqli_query($conn, "SELECT * FROM `radio_komunikasi`");
while ($row_report_rk = mysqli_fetch_assoc($query_report_rk)) {
    $total_rk++;
}

// Query for SSJJ
$query_report_sj = mysqli_query($conn, "SELECT * FROM `srjj`");
while ($row_report_sj = mysqli_fetch_assoc($query_report_sj)) {
    $total_sj++;
}

// Query for LISTRIK
$query_report_lk = mysqli_query($conn, "SELECT * FROM `listrik`");
while ($row_report_lk = mysqli_fetch_assoc($query_report_lk)) {
    $total_lk++;
}

// Query for BANGUNAN
$query_report_bg = mysqli_query($conn, "SELECT * FROM `bangunan`");
while ($row_report_bg = mysqli_fetch_assoc($query_report_bg)) {
    $total_bg++;
}

// Total report for all units
$total_report = $total_fr + $total_aa + $total_sv + $total_nv + $total_rk + $total_sj + $total_lk + $total_bg;
?>