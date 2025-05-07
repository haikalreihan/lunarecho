<?php
include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/session.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/user_info.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/unit.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/security.php');
$judul = "";
$query_count = mysqli_query($conn, 'SELECT COUNT(*) as total FROM `content_'.$unit_id.'` WHERE id = '.$_GET["id"]);
$count_result = mysqli_fetch_assoc($query_count);
$total_data = $count_result['total'];
?>
<!doctype html>
<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../../../assets/"
  data-template="vertical-menu-template"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name=" Viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?php echo TITLE ?> - EDIT LOGBOOK ()</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../../../../assets/img/branding/logo-small.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="../../../../assets/vendor/fonts/remixicon/remixicon.css" />
    <link rel="stylesheet" href="../../../../assets/vendor/fonts/flag-icons.css" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="../../../../assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="../../../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="../../../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="../../../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="../../../../assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
    <link rel="stylesheet" href="../../../../assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="../../../../assets/vendor/libs/@form-validation/form-validation.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="../../../../assets/vendor/css/pages/cards-statistics.css" />
    <link rel="stylesheet" href="../../../../assets/vendor/css/pages/cards-analytics.css" />

    <!-- Helpers -->
    <script src="../../../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../../../assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../../../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php include($_SERVER['DOCUMENT_ROOT']."/app/layout/header.php") ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                <i class="ri-menu-fill ri-22px"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item navbar-search-wrapper mb-0">
                  <a class="nav-item nav-link search-toggler fw-normal px-0" href="javascript:void(0);">
                    <i class="ri-search-line ri-22px scaleX-n1-rtl me-3"></i>
                    <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
                  </a>
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Style Switcher -->
                <li class="nav-item dropdown-style-switcher dropdown me-1 me-xl-0">
                  <a
                    class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <i class="ri-22px"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                    <li>
                      <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                        <span class="align-middle"><i class="ri-sun-line ri-22px me-3"></i>Light</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                        <span class="align-middle"><i class="ri-moon-clear-line ri-22px me-3"></i>Dark</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                        <span class="align-middle"><i class="ri-computer-line ri-22px me-3"></i>System</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!-- / Style Switcher-->

                <!-- Notification -->
                <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-4 me-xl-1">
                    <?php include($_SERVER['DOCUMENT_ROOT']."/app/layout/notification.php") ?>
                </li>
                <!--/ Notification -->

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../../../../assets/img/profile/<?php echo $_SESSION["profile_picture"] ?>" alt class="rounded-circle" />
                    </div>
                  </a>
                  <?php include $_SERVER['DOCUMENT_ROOT']."/app/layout/menu-dropdown.php" ?>
                </li>
                <!--/ User -->
              </ul>
            </div>

            <!-- Search Small Screens -->
            <div class="navbar-search-wrapper search-input-wrapper d-none">
              <input
                type="text"
                class="form-control search-input container-xxl border-0"
                placeholder="Search..."
                aria-label="Search..." />
              <i class="ri-close-fill search-toggler cursor-pointer"></i>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-0 container-p-y">
              <a href="../../dashboard" class="btn btn-icon btn-label-primary btn-fab demo waves-effect">
                <span class="tf-icons ri-arrow-drop-left-line"></span>
              </a>
              <button type="button" class="btn btn-label-primary btn-fab demo waves-effect" data-bs-toggle="modal" data-bs-target="#modalSettings">
                <span class="tf-icons ri-tools-line ri-16px me-2"></span>Settings
              </button>
              <!-- Add Modal -->
              <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <form action="../../../function/add_record?unit=<?php echo $unit_id ?>&id=<?php echo $_GET["id"] ?>" method="post">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modalCenterTitle">Tambah Isi Logbook</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-2">
                                    <div class="form-floating form-floating-outline">
                                        <input type="date" id="tanggal_kegiatan" name="tanggal_kegiatan" value="<?php echo date('Y-m-d'); ?>" class="form-control" required>
                                        <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4">
                                <div class="mb-2">
                                  <label for="defaultSelect" class="form-label">Peralatan</label>
                                  <select id="peralatanSelect" name="peralatan" class="form-select" required>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM peralatan");
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        echo '<option value="'.$row['peralatan'].'">'.$row['peralatan'].'</option>';
                                    }
                                    ?>
                                  </select>
                                </div>
                            </div>
                            <div class="row g-4">
                                <div class="mb-6">
                                  <label for="defaultSelect" class="form-label">Teknisi</label>
                                  <select id="teknisiSelect" name="teknisi" class="form-select" required>
                                    <?php
                                    $no = 0;
                                    $query = mysqli_query($conn, "SELECT * FROM users WHERE technician = 1");
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        $no++;
                                        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                    }
                                    if ($no == 0) {
                                        echo '<option value="-1">Tidak ada teknisi</option>';
                                    }
                                    ?>
                                  </select>
                                </div>
                            </div>
                            <div class="row g-4">
                                <div class="col mb-6 mt-2">
                                    <div class="input-group">
                                      <span class="input-group-text">Catatan</span>
                                      <textarea class="form-control" id="uraian" name="uraian" aria-label="With textarea" placeholder="Isi uraian" style="height: 124px;" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4">
                                <div class="col mb-6">
                                    <div class="form-floating form-floating-outline">
                                      <input class="form-control" type="datetime-local" id="mulai" name="mulai" value="<?php echo date('Y-m-d H:i:s'); ?>" required>
                                      <label for="mulai">Mulai</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4">
                                <div class="col mb-2">
                                    <div class="form-floating form-floating-outline">
                                        <input class="form-control" type="datetime-local" id="selesai" name="selesai" value="<?php echo date('Y-m-d H:i:s', strtotime('+10 minutes')); ?>" required>
                                        <label for="selesai">Selesai</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Edit Modal -->
              <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form id="editForm" action="../../../function/edit_record?unit=<?php echo $unit_id ?>&id=<?php echo $_GET["id"] ?>" method="POST">
                            <div class="modal-header">
                                <h4 class="modal-title" id="modalEditTitle">Edit Isi Logbook</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="edit_no_report" name="no_report">
                                <div class="mb-3">
                                    <label for="edit_tanggal_kegiatan" class="form-label">Tanggal Kegiatan</label>
                                    <input type="date" id="edit_tanggal_kegiatan" name="tanggal_kegiatan" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_peralatan" class="form-label">Peralatan</label>
                                    <select id="edit_peralatan" name="peralatan" class="form-select" required>
                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM peralatan");
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            echo '<option value="'.$row['peralatan'].'">'.$row['peralatan'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_uraian" class="form-label">Uraian</label>
                                    <textarea id="edit_uraian" name="uraian" class="form-control" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_teknisi" class="form-label">Teknisi</label>
                                    <select id="edit_teknisi" name="teknisi" class="form-select" required>
                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM users WHERE technician = 1");
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_mulai" class="form-label">Mulai</label>
                                    <input type="datetime-local" id="edit_mulai" name="mulai" class="form-control" step="any" required>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_selesai" class="form-label">Selesai</label>
                                    <input type="datetime-local" id="edit_selesai" name="selesai" class="form-control" step="any" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
              <!-- Setting Modal -->
              <div class="modal fade" id="modalSettings" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <?php 
                        $found = false;
                        $query = mysqli_query($conn, "SELECT * FROM `".$unit_title."` WHERE id = ".$_GET["id"]);
                        while ($row = mysqli_fetch_assoc($query)) {
                            $judul = $row["judul"];
                    ?>
                    <form action="../../../function/edit_report?id=<?php echo $_GET['id']; ?>&unit=<?php echo $unit_id ?>" method="post">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modalCenterTitle">Settings</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-6 mt-2">
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" id="nameWithTitle" name="nameWithTitle" class="form-control" value="<?php echo $row["judul"]; ?>" placeholder="Enter Judul" required>
                                        <label for="nameWithTitle">Judul</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col mb-6">
                                    <div class="form-floating form-floating-outline">
                                       <?php
                                        $shifts = [
                                            0 => ['icon' => 'ri-sun-line', 'title' => 'Pagi', 'description' => 'Saya bekerja saat pagi hari'],
                                            1 => ['icon' => 'ri-sun-cloudy-line', 'title' => 'Siang', 'description' => 'Saya bekerja saat siang hari'],
                                            2 => ['icon' => 'ri-moon-line', 'title' => 'Malam', 'description' => 'Saya bekerja saat malam hari']
                                        ];
                                        $currentShift = $row["shift"];
                                        ?>
                                        <div class="row">
                                            <?php foreach ($shifts as $value => $shift): ?>
                                                <div class="col-md mb-md-0 mb-5">
                                                    <div class="form-check custom-option custom-option-icon <?php echo $currentShift == $value ? 'checked' : ''; ?>">
                                                        <label class="form-check-label custom-option-content" for="radio_<?php echo strtolower($shift['title']); ?>">
                                                            <span class="custom-option-body">
                                                                <i class="<?php echo $shift['icon']; ?>"></i>
                                                                <span class="custom-option-title mb-2"><?php echo $shift['title']; ?></span>
                                                                <small><?php echo $shift['description']; ?></small>
                                                            </span>
                                                            <input name="radio_shift" class="form-check-input" type="radio" value="<?php echo $value; ?>" id="radio_<?php echo strtolower($shift['title']); ?>" <?php echo $currentShift == $value ? 'checked' : ''; ?>>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4">
                                <div class="col mb-2">
                                    <div class="form-floating form-floating-outline">
                                        <input type="date" id="dateWithTitle" name="dateWithTitle" value="<?php echo $row["tanggal_kegiatan"]; ?>" class="form-control" required>
                                        <label for="dateWithTitle">Tanggal Kegiatan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save Settings</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card">
                <?php
                    if ($row['judul'] != ""){
                      $found = true;
                    }
                ?>
                <div class="card-header border-bottom">
                  <h5 class="card-title mb-0"><?php echo $row['judul'] ?> - <?php echo '('.date("d F Y", strtotime($row["tanggal_kegiatan"])).')' ?></h5>
                </div>
                <?php
                   }
                   if ($found == false) {
                     echo 'Data logbook not found';
                     echo '<meta http-equiv="refresh" content="0; url=../../dashboard?errorMessage=Data logbook tidak ditemukan" />';
                     die();
                   }
                ?>
                <div class="card-datatable table-responsive">
                  <table id="logbook_list" class="datatables-users table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal Kegiatan</th>
                        <th>Peralatan</th>
                        <th>Catatan</th>
                        <th>Teknisi</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Durasi</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php
                      $no = 0;
                      $query = mysqli_query($conn, 'SELECT * FROM `content_'.$unit_id.'` WHERE id = '.$_GET["id"]);
                      while ($row = mysqli_fetch_assoc($query)) {
                        $no++;
                      ?>
                      <tr>
                        <td>
                          <span class="fw-medium"><?php echo $no ?></span>
                        </td>
                        <td>
                          <span class="fw-medium"><?php echo $row["tanggal_kegiatan"] ?></span>
                        </td>
                        <td>
                          <span class="fw-medium"><?php echo $row["peralatan"] ?></span>
                        </td>
                        <td>
                          <span class="fw-medium"><?php echo $row["uraian"] ?></span>
                        </td>
                        <td>
                          <span class="fw-medium"><?php
                            $query_user = mysqli_query($conn, 'SELECT * FROM `users` WHERE id = '.$row["teknisi"]);
                            while ($row_user = mysqli_fetch_assoc($query_user)) {
                                echo $row_user["name"];
                            }
                          ?></span>
                        </td>
                        <td>
                          <span class="fw-medium"><?php echo $row["mulai"] ?></span>
                        </td>
                        <td>
                          <span class="fw-medium"><?php echo $row["selesai"] ?></span>
                        </td>
                        <td><?php
                              $mulai = new DateTime($row['mulai']);
                              $selesai = new DateTime($row['selesai']);

                              //hitung selisih waktu
                              $time_difference = $mulai->diff($selesai);

                              // Ambil selisih dalam hari
                              $selisih_hari = $time_difference->days;

                              // Ambil selisih waktu dalam format jam, menit, dan detik
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
                              if ($selisih_hari > 0) {
                                  echo "$selisih_hari hari, $selisih_waktu";
                              }
                              else{
                                  echo $selisih_waktu;
                              }
                              ?> </td>
                              <td class="dtr-hidden" style="display: none;">
                                <?php if ($total_data > 1): ?>
                                    <div class="d-inline-block view-record">
                                            <a href="javascript:;" class="btn btn-sm btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="ri-more-2-line"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end m-0">
                                                <li>
                                                    <a href="javascript:;" class="dropdown-item edit-record" data-no_report="<?php echo $row['no_report']; ?>">Edit</a>
                                                </li>
                                                <div class="dropdown-divider"></div>
                                                <li>
                                                    <a href="javascript:;" class="dropdown-item text-danger delete-record" data-no_report="<?php echo $row['no_report'] ?>">Delete</a>
                                                </li>
                                            </ul>
                                    </div>
                                <?php else: ?>
                                    <a href="javascript:;" class="btn btn-sm btn-text-secondary rounded-pill btn-icon edit-record" data-no_report="<?php echo $row['no_report'] ?>"><i class="ri-edit-box-line"></i></a>
                                <?php endif; ?>
                              </td>
                      </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <?php include $_SERVER['DOCUMENT_ROOT'].'/app/layout/footer.php'; ?>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../../../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../../../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Main JS -->
    <script src="../../../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../../../assets/js/dashboards-analytics.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <!-- Vendors JS -->
    <script src="../../../../assets/vendor/libs/moment/moment.js"></script>
    <script src="../../../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="../../../../assets/vendor/libs/select2/select2.js"></script>
    <script src="../../../../assets/vendor/libs/@form-validation/popular.js"></script>
    <script src="../../../../assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="../../../../assets/vendor/libs/@form-validation/auto-focus.js"></script>
    <script src="../../../../assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="../../../../assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    
     <!-- Notyf Alert -->
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="../../../../assets/js/notyf.js"></script>
    <!-- Notification -->
    <script src="../../../../assets/js/notification.js"></script>
    <script>
        if (document.title != "<?php echo TITLE ?> - EDIT LOGBOOK (<?php echo $judul ?>)") {
            document.title = "<?php echo TITLE ?> - EDIT LOGBOOK (<?php echo $judul ?>)";
        }
        $(document).ready(function() {
            var dt_user_table = $('#logbook_list').DataTable({
                responsive: true,
                language: {
                    sLengthMenu: 'Show _MENU_',
                    search: '',
                    searchPlaceholder: 'Search Contents'
                },
                columnDefs: [
                    { targets: 0, orderable: false, searchable: true } // pastikan searchable: true
                ],
                dom:
                    '<"row"' +
                    '<"col-md-2 d-flex align-items-center justify-content-md-start justify-content-center"<"dt-action-buttons mt-5 mt-md-0"B>>' +
                    '<"col-md-10"<"d-flex align-items-center justify-content-md-end justify-content-center"<"me-4"f><"add-new">>>' +
                    '>t' +
                    '<"row"' +
                    '<"col-sm-12 col-md-6"i>' +
                    '<"col-sm-12 col-md-6"p>' +
                    '>',
                buttons: [
                    {
                        extend: 'collection',
                        className: 'btn btn-outline-secondary dropdown-toggle waves-effect waves-light',
                        text: '<span class="d-flex align-items-center"><i class="ri-upload-2-line ri-16px me-2"></i> <span class="d-none d-sm-inline-block">Export</span></span> ',
                        buttons: [
                            {
                                extend: 'print',
                                text: '<i class="ri-printer-line me-1"></i>Print',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: ':visible'
                                },
                                customize: function (win) {
                                    $(win.document.body)
                                        .css('color', '#000')
                                        .css('border-color', '#aaa')
                                        .css('background-color', '#fff');
                                    $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('color', 'inherit')
                                        .css('border-color', 'inherit')
                                        .css('background-color', 'inherit');
                                }
                            },
                            {
                                extend: 'csv',
                                text: '<i class="ri-file-text-line me-1"></i>Csv',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'excel',
                                text: '<i class="ri-file-excel-line me-1"></i>Excel',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'pdf',
                                text: '<i class="ri-file-pdf-line me-1"></i>Pdf',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'copy',
                                text: '<i class="ri-file-copy-line me-1"></i>Copy',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            }
                        ]
                    }
                ]
            });
        
            // Tambahkan tombol "Add New" ke dalam div "add-new"
            $('.add-new').html(
                "<button class='btn btn-primary waves-effect waves-light new-record' name='add_content_book' data-bs-toggle='modal' data-bs-target='#modalCenter'><i class='ri-add-line me-0 me-sm-1 d-inline-block d-sm-none'></i><span class= 'd-none d-sm-inline-block'> Add Logbook Contents </span ></button>"
            );
            $('#logbook_list tbody').on('click', '.edit-record', function() {
                var row = $(this).closest('tr');
                var no = $.trim(row.find('td:eq(0)').text());
                var tanggal_kegiatan = $.trim(row.find('td:eq(1)').text());
                var peralatan = $.trim(row.find('td:eq(2)').text());
                var uraian = $.trim(row.find('td:eq(3)').text());
                var teknisi = $.trim(row.find('td:eq(4)').text());
                var mulai = $.trim(row.find('td:eq(5)').text());
                var selesai = $.trim(row.find('td:eq(6)').text());
                var no_report = $(this).data('no_report'); // Ambil data-no_report
        
                mulai = formatDateTimeForInput(mulai);
                selesai = formatDateTimeForInput(selesai);
        
                $('#edit_no_report').val(no_report);
                $('#edit_tanggal_kegiatan').val(tanggal_kegiatan);
                $('#edit_peralatan').val(peralatan);
                $('#edit_uraian').val(uraian);
                $('#edit_teknisi option').filter(function() {
                    return $.trim($(this).text()) == teknisi;
                }).prop('selected', true);
                $('#edit_mulai').val(mulai.replace(' ', 'T'));
                $('#edit_selesai').val(selesai.replace(' ', 'T'));
        
                $('#modalEdit').modal('show');
            });
            $('#logbook_list').on('click', '.delete-record', function() {
                var $row = $(this).closest('tr');
                var no_report_id = $(this).data('no_report');
                var no_unit_id = <?php echo $unit_id; ?>;
                var table = $('#logbook_list').DataTable();
                var currentPage = table.page();
                var recordsOnPage = table.rows({ page: 'current' }).count();
            
                if (confirm('Apakah Anda yakin ingin menghapus isi logbook ini?')) {
                    $.ajax({
                        url: '../../../function/delete_record', // Pastikan URL benar
                        type: 'POST',
                        data: { report_id: no_report_id, unit_id: no_unit_id },
                        dataType: 'json',
                        success: function(data) {
                            if (data.success) {
                                table.row($row).remove().draw(false);
            
                                // Update nomor urut
                                table.rows().every(function (rowIdx, tableLoop, rowLoop) {
                                    this.cell(rowIdx, 0).data(rowIdx + 1); // Update nomor urut
                                }).draw(false);
            
                                // Pindah ke halaman sebelumnya jika halaman saat ini kosong setelah penghapusan
                                if (recordsOnPage === 1 && currentPage > 0) {
                                    table.page(currentPage - 1).draw('page');
                                }
            
                                // Jika data tersisa hanya satu, ubah tampilan tombol
                                var totalRecords = table.rows().count();
                                if (totalRecords === 1) {
                                    var $remainingRow = table.rows().nodes().to$().eq(0);
                                    $remainingRow.find('.delete-record').closest('.dropdown-menu').remove();
                                    var newEditButton = '<a href="javascript:;" class="btn btn-sm btn-text-secondary rounded-pill btn-icon edit-record" data-no_report="' + no_report_id + '"><i class="ri-edit-box-line"></i></a>';
                                    $remainingRow.find('.view-record').closest('.d-inline-block').replaceWith(newEditButton);
                                }
                            } else {
                                alert(data.message);
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log('AJAX error:', textStatus, errorThrown, jqXHR.responseText); // Tambahkan log kesalahan AJAX
                            alert('Error sending request. Please try again.');
                        }
                    });
                }
            });
            function formatDateTimeForInput(dateTimeString) {
                var dateTime = new Date(dateTimeString);
                var year = dateTime.getFullYear();
                var month = ('0' + (dateTime.getMonth() + 1)).slice(-2);
                var day = ('0' + dateTime.getDate()).slice(-2);
                var hours = ('0' + dateTime.getHours()).slice(-2);
                var minutes = ('0' + dateTime.getMinutes()).slice(-2);
                var seconds = ('0' + dateTime.getSeconds()).slice(-2);
                
                return year + '-' + month + '-' + day + 'T' + hours + ':' + minutes + ':' + seconds;
            }
        });
    </script>
  </body>
</html>