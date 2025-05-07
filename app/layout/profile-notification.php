<?php
include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/session.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/user_info.php');
$author_id = 0; $disable_unit = 1;
$username_safe = htmlspecialchars($_GET["username"], ENT_QUOTES, 'UTF-8');
$stmt = $conn->prepare("SELECT * FROM `users` WHERE username = ?");
$stmt->bind_param("s", $username_safe);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    while ($row_user = $result->fetch_assoc()) {
        $author_id = $row_user["id"];
    }
} else {
    header("Location: ".BASE_URL."/dashboard?errorMessage=User tidak ditemukan.");
    exit();
}
?>
<!doctype html>
<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="/assets/"
  data-template="vertical-menu-template"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?php echo htmlspecialchars(TITLE, ENT_QUOTES, 'UTF-8'); ?> - PROFILE (NOTIFICATIONS)</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../../assets/img/branding/logo-small.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="/assets/vendor/fonts/remixicon/remixicon.css" />
    <link rel="stylesheet" href="/assets/vendor/fonts/flag-icons.css" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="/assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/flatpickr/flatpickr.css" />
    <!-- Row Group CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/pages/page-profile.css" />

    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="/assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/assets/js/config.js"></script>
     <style>
        /* Atur lebar modal */
        .modal-dialog {
            max-width: 300px; /* Atur lebar modal */
        }

        /* Menyelaraskan gambar QR code di tengah modal */
        .modal-body img {
            margin: auto; /* Margin otomatis untuk memusatkan gambar */
        }
        .dataTables_wrapper {
            padding-bottom: 20px; /* Sesuaikan nilai ini sesuai kebutuhan */
        }

        .dataTables_info {
            margin-left: 20px;
            margin-bottom: 20px; /* Sesuaikan nilai ini sesuai kebutuhan */
        }
        .dataTables_paginate {
            margin-right: 20px !important; /* Pastikan menggunakan !important untuk menimpa aturan lainnya */
            margin-bottom: 20px; /* Sesuaikan nilai ini sesuai kebutuhan */
        }
    </style>
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
                      <img src="/assets/img/profile/<?php echo htmlspecialchars($_SESSION["profile_picture"], ENT_QUOTES, 'UTF-8'); ?>" alt class="rounded-circle" />
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

            <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Header -->
            <div class="row">
              <div class="col-12">
                <div class="card mb-6">
                  <div class="user-profile-header-banner">
                    <img src="../../assets/img/pages/default-banner.png" alt="Banner image" class="rounded-top">
                  </div>
                  <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-5">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                      <img src="../../assets/img/profile/<?php echo htmlspecialchars($_SESSION['profile_picture'], ENT_QUOTES, 'UTF-8'); ?>" alt="user image" class="d-block h-auto ms-0 ms-sm-5 rounded-4 user-profile-img">
                    </div>
                    <div class="flex-grow-1 mt-4 mt-sm-12">
                      <?php 
                        // Ambil username dari GET request dan lakukan sanitasi
                        $username_safe = htmlspecialchars($_GET["username"], ENT_QUOTES, 'UTF-8');
                        
                        // Persiapkan pernyataan SQL yang aman
                        $stmt = $conn->prepare("SELECT * FROM `users` WHERE username = ?");
                        $stmt->bind_param("s", $username_safe);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        
                        while ($row_user = $result->fetch_assoc()) { ?>
                          <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-6">
                            <div class="user-profile-info">
                              <h4 class="mb-2"><?php echo htmlspecialchars($row_user["name"], ENT_QUOTES, 'UTF-8'); ?></h4>
                              <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4">
                                <li class="list-inline-item">
                                  <i class="ri-user-2-line me-2 ri-24px"></i>
                                  <span class="fw-medium"><?php echo htmlspecialchars($row_user["position"], ENT_QUOTES, 'UTF-8'); ?></span>
                                </li>
                                <li class="list-inline-item">
                                  <i class="ri-map-pin-line me-2 ri-24px"></i>
                                  <span class="fw-medium"><?php echo htmlspecialchars($row_user["city"], ENT_QUOTES, 'UTF-8'); ?></span>
                                </li>
                                <li class="list-inline-item">
                                  <i class="ri-calendar-line me-2 ri-24px"></i>
                                  <span class="fw-medium">Joined <?php echo DateTime::createFromFormat('Y-m-d', $row_user["joined"])->format('F Y'); ?> </span>
                                </li>
                              </ul>
                            </div>
                            <a href="javascript:void(0)" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modal_barcode">
                              <i class="ri-barcode-fill ri-16px me-2"></i>Show QR Code
                            </a>
                          </div>
                          <div class="modal fade" id="modal_barcode" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="modalCenterTitle">QR Code</h4>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <img src="<?php echo BASE_URL ?>/app/layout/generate_qr.php?username=<?php echo $username_safe ?>" alt="QR Code" style="width: 80%; height: auto;" />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <?php }
                        $stmt->close();
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <!--/ Header -->
            
            <!-- Navbar pills -->
            <div class="row">
              <div class="col-md-12">
                <div class="nav-align-top">
                  <ul class="nav nav-pills flex-column flex-sm-row mb-6 row-gap-2">
                    <li class="nav-item"><a class="nav-link waves-effect waves-light" href="../profile/<?php echo $_GET["username"] ?>"><i class="ri-user-3-line me-2"></i>Profile</a></li>
                    <li class="nav-item"><a class="nav-link active waves-effect waves-light" href="javascript:void(0);"><i class="ri-notification-line me-2"></i>Notifications</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <!--/ Navbar pills -->
            
            <!-- User Profile Content -->
            <div class="row">
              <div class="card">
                    <div class="card-datatable table-responsive pt-0">
                      <div class="dataTables_wrapper dt-bootstrap5 no-footer" style="height:90px; overflow: hidden;">
                          <div class="card-header flex-column flex-md-row">
                              <div class="head-label text-center"><h5 class="card-title mb-0">Notifications</h5>
                              </div>
                              <div class="dt-action-buttons text-end pt-3 pt-md-0">
                                  <div class="dt-buttons btn-group flex-wrap" name="search_list" id="search_list">
                                   </div>
                               </div>
                            </div>
                      </div>
                    </div>
                    <table id="logbook_list" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>MESSAGE</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $query = "SELECT * FROM notifications WHERE author_id = '$author_id' ORDER BY date DESC LIMIT 5";
                          $result = mysqli_query($conn, $query);
                          while ($row = mysqli_fetch_assoc($result)) {
                              $now = time();
                              $notification_time = strtotime($row['date']);
                              $diff = $now - $notification_time;

                              if ($diff < 60) {
                                  $date_ago = $diff . "s";
                              } elseif ($diff < 3600) {
                                  $date_ago = floor($diff / 60) . "m";
                              } elseif ($diff < 86400) {
                                  $date_ago = floor($diff / 3600) . "h";
                              } elseif ($diff < 2592000) {
                                  $date_ago = floor($diff / 86400) . "d";
                              } elseif ($diff < 31536000) {
                                  $date_ago = floor($diff / (30 * 86400)) . "m"; // Approximation of 30 days per month
                              } else {
                                  $date_ago = floor($diff / (365 * 86400)) . "y"; // Approximation of 365 days per year
                              }
                          ?>
                        <tr>
                          <td>
                            <li class="list-group-item list-group-item-action dropdown-notifications-item waves-effect waves-light" data-id=<?php echo $row["id"] ?>>
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <img src="/assets/img/profile/<?php echo $row['profile'] ?>" alt="" class="rounded-circle">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="small mb-1"><?php echo $row['title'] ?></h6>
                                        <small class="mb-1 d-block text-body"><?php echo $row['body'] ?></small>
                                        <small class="text-muted"><?php echo $date_ago ?> ago</small>
                                    </div>
                                </div>
                            </li>
                          </td>
                        </tr>
                        <?php
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
            </div>
            <!--/ User Profile Content -->
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
    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="/assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="/assets/vendor/js/menu.js"></script>
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="/assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="/assets/vendor/libs/swiper/swiper.js"></script>

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="/assets/js/dashboards-analytics.js"></script>
    
    <!-- Notification -->
    <script src="/assets/js/notification.js"></script>
    
    <!-- Notyf Alert -->
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="/assets/js/notyf.js"></script>
    <script>
        $(document).ready(function() {
            var dt_user_table = $('#logbook_list').DataTable({
                responsive: true,
                language: {
                    emptyTable: 'Notifications of this user will appear here',
                    sLengthMenu: 'Show _MENU_',
                    search: '',
                    searchPlaceholder: 'Search Notifications'
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
    
            // Pindahkan elemen pencarian ke dalam div "search_list"
            $('#logbook_list_filter').appendTo('#search_list');
        });
    </script>
  </body>
</html>