<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/app/database/config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/app/controllers/session.php');
include($_SERVER['DOCUMENT_ROOT'] . '/app/controllers/unit.php');

$found = false;
$data_table = "";

// Inisialisasi variabel
$no = 0; 
$approve_id = 0;
$shift = ""; 
$teknisi_array = array(); 
$peralatan_array = array(); 
$judul = ""; 
$tanggal_kegiatan = "";

$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = mysqli_query($conn, "SELECT * FROM `content_{$unit_id}` WHERE id = '$id'");

while ($row = mysqli_fetch_assoc($query)) {
    $no++;
    $found = true;

    $mulai = new DateTime($row['mulai']);
    $selesai = new DateTime($row['selesai']);
    $time_difference = $mulai->diff($selesai);
    $selisih_hari = $time_difference->days;

    $selisih_waktu = '';
    if ($time_difference->h > 0) {
        $selisih_waktu .= $time_difference->h . ' jam ';
    }
    if ($time_difference->i > 0) {
        $selisih_waktu .= $time_difference->i . ' menit ';
    }
    if ($time_difference->s > 0 || empty($selisih_waktu)) {
        $selisih_waktu .= $time_difference->s . ' detik';
    }

    $total_waktu = $selisih_hari > 0 ? "$selisih_hari hari, $selisih_waktu" : $selisih_waktu;

    // Query untuk mendapatkan nama teknisi
    $teknisi_id = mysqli_real_escape_string($conn, $row['teknisi']);
    $query_user = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$teknisi_id'");
    $nama_teknisi = ''; $paraf_teknisi = '';
    if ($row_user = mysqli_fetch_assoc($query_user)) {
        $nama_teknisi = $row_user['name'];
        $paraf_teknisi = $row_user['signature'];
    }

    $data_table .= "<tr>
        <td>$no</td>
        <td>{$row['mulai']}</td>
        <td>$total_waktu</td>
        <td>{$row['uraian']}</td>
        <td>$nama_teknisi</td>
        <td><img src='".$paraf_teknisi."' alt='Paraf Teknisi' style='width: 50%; height: 50%;'></img></td>
    </tr>";

    $peralatan_array[] = $row['peralatan'];
    $teknisi_array[] = $nama_teknisi;
}

if (!$found) {
    header("Location: ../../dashboard?errorMessage=Data tidak ditemukan");
    die();
}

$query_shift = mysqli_query($conn, "SELECT * FROM `{$unit_title}` WHERE id = '$id'");
if ($row_shift = mysqli_fetch_assoc($query_shift)) {
    $shift = $row_shift['shift'];
    $judul = $row_shift['judul'];
    $tanggal_kegiatan = $row_shift['tanggal_kegiatan'];
    $approve_id = $row_shift['approve_id'];
}

// Mengonversi bulan ke bahasa Indonesia menggunakan strftime()
setlocale(LC_TIME, 'id_ID');
$tanggal_kegiatan = strftime('%d %B %Y', strtotime($tanggal_kegiatan));
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title><?php echo TITLE ?> - View (<?php echo $judul ?>)</title>
<link rel="icon" type="image/png" href="../../../../assets/img/branding/logo-small.png">
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #fff;
  margin: 0;
}

header {
  background-color: #fff;
  padding: 10px 0;
  display: flex;
  align-items: center;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.logo {
  width: 70px;
  height: 70px;
  background-color: #ccc;
  border-radius: 50%;
  margin-left: 20px;
}

.title-container {
  flex-grow: 1;
  text-align: center;
}

h1 {
  margin: 0;
  font-size: 24px;
  font-weight: bold;
}

h4 {
  margin: 0;
  margin-top: 5px;
}

.section-container {
  display: flex;
  justify-content: space-between;
  width: 100%;
}

.left-column {
  flex: 7; /* Mengambil 70% dari lebar kontainer */
}

.right-column {
  flex: 3; /* Mengambil 30% dari lebar kontainer */
}

.info-section {
    margin: 0 auto;
    width: 95%;
}
.logbook-table {
  border-collapse: collapse; /* Menghilangkan jarak antara border sel */
  background-color: rgba(255, 255, 255, 0.8); /* Warna latar belakang putih transparan */
 }
.logbook-table td {
  padding: 8px;
  vertical-align: top;
  background-color: rgba(255, 255, 255, 0.8); /* Warna latar belakang sel putih transparan */
}
.logbook-table th {
  padding: 8px;
  vertical-align: top;
  background-color: rgba(255, 255, 255, 0.8); /* Warna latar belakang sel putih transparan */
}
.info-table {
  border-collapse: collapse; /* Menghilangkan jarak antara border sel */
  width: 100%; /* Mengatur lebar tabel agar sesuai dengan lebar perangkat */
  max-width: 100%; /* Menjamin tabel tidak melebihi lebar perangkat */
  background-color: rgba(255, 255, 255, 0.8); /* Warna latar belakang putih transparan */
 }
.info-table td {
  padding: 8px;
  border: none; /* Menghilangkan border tabel */
  vertical-align: top;
  background-color: rgba(255, 255, 255, 0.8); /* Warna latar belakang sel putih transparan */
}
.info-left, .info-center, .info-right {
    padding: 8px;
}
.info-left {
    text-align: left;
    width: 20%;
}
.info-center {
    text-align: left;
    width: 40%;
}
.info-right {
    text-align: right;
    width: 40%;
}

.teknisi-container {
  display: inline-block;
  text-align: left;
  margin-right: 50px;
  vertical-align: bottom;
}

.no-teknisi {
  display: inline-block;
  margin-right: 5px;
}

.underline {
  display: inline-block;
  border-bottom: 1px solid black;
  width: 100px;
  vertical-align: bottom;
}

table {
  width: 95%;
  margin: 20px auto;
  border-collapse: collapse;
}

th, td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

th {
  background-color: #f0f0f0;
}

tr:nth-child(even) {
  background-color: #f9f9f9;
}

.signature-section {
  width: 95%;
  margin: 20px;
  text-align: right;
}

.signature-container {
  display: inline-block;
  margin-top: 50px;
  text-align: center;
}

@media print {
  .print-button, .close-button, .navbar-header {
    display: none !important;
  }

  body {
    margin: 0 !important;
    font-size: 12px;
  }
  
  table {
    width: 100%;
  }

  td, th {
    page-break-inside: avoid;
  }

  @page {
    size: auto;
    margin: 10mm;
  }
}

.navbar {
  background-color: #333;
  color: #fff;
  padding: 10px 0;
}
</style>
</head>
<body>
<nav class="navbar">
  <div class="container">
    <div class="navbar-header">
      ㅤ<button class="close-button" onclick="closeWindow()">X</button>ㅤ<?php echo TITLE ?> - View (<?php echo $judul ?>)ㅤㅤ<button class="btn btn-primary print-button" onclick="window.print()">Print Logbook</button> <button class="btn btn-primary print-button" onclick="generatePDF()">Generate PDF</button>
    </div>
    <br>
  </div>
</nav>
<div id="view_pdf">
<header>
  <div class="logo"><img src="../../../../assets/img/branding/logo-small.png" style="width: 70px; height: 70px;"></img></div>
  <div class="title-container">
    <h1>BUKU CATATAN FASILITAS DAN KEGIATAN</h1>
    <h4>(FACILITY LOG BOOK)</h4>
  </div>
</header>

<div class="info-section">
<div class="section-container">
  <div class="left-column">
  <table class="info-table">
    <tr>
      <td class="info-left">PENYELENGGARA PELAYANAN:</td>
      <td class="info-center">PERUM LPPNPI CABANG JATSC</td>
    </tr>
    <tr>
      <td class="info-left">KELOMPOK FASILITAS:</td>
      <td class="info-center"><?php echo strtoupper($unit_title) ?></td>
    </tr>
    <tr>
      <td class="info-left">NAMA PERALATAN:</td>
      <td class="info-center">
        <?php
          $unique_peralatan_array = array_unique($peralatan_array);
          $count_peralatan = count($unique_peralatan_array);
          $font_size = 18 - ($count_peralatan * 1.2);
          foreach ($unique_peralatan_array as $index => $peralatan_item) {
            echo "<span style='font-size: {$font_size}px;'>{$peralatan_item}</span>";
            if ($index < $count_peralatan - 1) {
              echo " / ";
            }
          }
        ?>
      </td>
    </tr>
    <tr>
      <td class="info-left">TANGGAL:</td>
      <td class="info-center"><?php echo strtoupper($tanggal_kegiatan); ?></td>
    </tr>
    <tr>
      <td class="info-left">SHIFT:</td>
      <td class="info-center">
        <?php
        if ($shift == 0) {
            echo '<input type="checkbox" checked disabled> P <input type="checkbox" disabled> S <input type="checkbox" disabled> M';
        } else if ($shift == 1) {
            echo '<input type="checkbox" disabled> P <input type="checkbox" checked disabled> S <input type="checkbox" disabled> M';
        } else if ($shift == 2) {
            echo '<input type="checkbox" disabled> P <input type="checkbox" disabled> S <input type="checkbox" checked disabled> M';
        }
        ?>
      </td>
    </tr>
  </table>
  </div>
  <div class="right-column">
  <div class="info-right">
    <?php
        $teknisi = array();
        for ($i = 0; $i < 5; $i++) {
            if (isset($teknisi_array[$i]) && !in_array($teknisi_array[$i], $teknisi)) {
                $teknisi[] = $teknisi_array[$i];
            }
        }
        for ($i = 0; $i < 5; $i++) {
            echo '<p><span class="teknisi-container">';
            if (isset($teknisi[$i])) {
                echo '<span class="underline">'.($i + 1).'. '.$teknisi[$i].'</span>';
            } else {
                echo '<span class="underline">'.($i + 1).'.</span>';
            }
            echo '</span></p>';
        }
    ?>
  </div>
  </div>
  </div>
</div>


<table class="logbook-table">
  <tr>
    <th>NO.</th>
    <th style="text-align: center;">TANGGAL/JAM</th>
    <th style="text-align: center;">DURASI</th>
    <th style="text-align: center;">CATATAN/TINDAKAN</th>
    <th>NAMA TEKNISI</th>
    <th style="width: 95px;">PARAF</th>
  </tr>
  <?php echo $data_table ?>
</table>

<div class="signature-section">
  <?php 
  if ($approve_id > 0) {
    $query_approve = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$approve_id'");
    if ($row_approve = mysqli_fetch_assoc($query_approve)) {
        $gelar = $row_approve['gelar']; $gelar_auto = "";
        if (!empty($gelar)) { $gelar_auto = ', ' . $gelar; }
        echo '<div class="signature-container">
        Jakarta, '.$tanggal_kegiatan.'<br>
        '.$row_approve['position'].'<br>
        <img src="'.$row_approve['signature'].'" alt="Tanda Tangan" style="width: 200px; height: auto; margin-top: 10px;"><br>
        '.$row_approve['name'].$gelar_auto.'
        </div>';
    }
  }
  else {
    echo '<div class="signature-container" style="filter: blur(10px); transition: filter 0.3s ease-in-out; user-select: none; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; pointer-events: none;">
    Jakarta, '.$tanggal_kegiatan.'<br>
    (Jabatan)<br>
    <img src="(ttd)" alt="Tanda Tangan" style="width: 200px; height: auto; margin-top: 10px;"><br>
    (Nama TTD)
    </div>';
  }
  ?>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.2/html2pdf.bundle.min.js"></script>
<script>
  function generatePDF() {
    const element = document.getElementById('view_pdf');
    const opt = {
      margin: 10,
      filename: 'buku_catatan.pdf',
      image: { type: 'jpeg', quality: 0.98 },
      html2canvas: { scale: 2 },
      jsPDF: { format: 'letter', orientation: 'portrait' }
    };
    html2pdf().from(element).set(opt).save();
  }
  function closeWindow() {
     window.close();
  }
</script>
</body>
</html>