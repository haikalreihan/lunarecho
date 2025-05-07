<?php
include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/session.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/user_info.php');

// Set timezone ke Indonesia (WIB)
date_default_timezone_set('Asia/Jakarta');
$disable_unit = 1;
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
    <title>LOGCAT - ACCOUNT NOTIFICATIONS</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/png" href="../../assets/img/branding/logo-small.png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/remixicon/remixicon.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/flatpickr/flatpickr.css" />
    <!-- Row Group CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="/assets/vendor/js/helpers.js"></script>
    <script src="/assets/vendor/js/template-customizer.js"></script>
    <script src="/assets/js/config.js"></script>
    <!-- Metadata dan link CSS lainnya -->
    <style>
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
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <img src="/assets/img/branding/logo.png" style="width:40px; height:40px;"></img>
              <span class="app-brand-text demo menu-text fw-semibold ms-2">‎ LOGCAT</span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M8.47365 11.7183C8.11707 12.0749 8.11707 12.6531 8.47365 13.0097L12.071 16.607C12.4615 16.9975 12.4615 17.6305 12.071 18.021C11.6805 18.4115 11.0475 18.4115 10.657 18.021L5.83009 13.1941C5.37164 12.7356 5.37164 11.9924 5.83009 11.5339L10.657 6.707C11.0475 6.31653 11.6805 6.31653 12.071 6.707C12.4615 7.09747 12.4615 7.73053 12.071 8.121L8.47365 11.7183Z"
                  fill-opacity="0.9" />
                <path
                  d="M14.3584 11.8336C14.0654 12.1266 14.0654 12.6014 14.3584 12.8944L18.071 16.607C18.4615 16.9975 18.4615 17.6305 18.071 18.021C17.6805 18.4115 17.0475 18.4115 16.657 18.021L11.6819 13.0459C11.3053 12.6693 11.3053 12.0587 11.6819 11.6821L16.657 6.707C17.0475 6.31653 17.6805 6.31653 18.071 6.707C18.4615 7.09747 18.4615 7.73053 18.071 8.121L14.3584 11.8336Z"
                  fill-opacity="0.4" />
              </svg>
            </a>
          </div>
          <div class="menu-inner-shadow"></div>
          <?php include($_SERVER['DOCUMENT_ROOT']."/app/layout/sidebar.php") ?>
        </aside>
        <div class="layout-page">
          <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                <i class="ri-menu-fill ri-22px"></i>
              </a>
            </div>
            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <div class="navbar-nav align-items-center">
                <div class="nav-item navbar-search-wrapper mb-0">
                  <a class="nav-item nav-link search-toggler fw-normal px-0" href="javascript:void(0);">
                    <i class="ri-search-line ri-22px scaleX-n1-rtl me-3"></i>
                    <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
                  </a>
                </div>
              </div>
              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <li class="nav-item dropdown-style-switcher dropdown me-1 me-xl-0">
                  <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
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
                <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-4 me-xl-1">
                    <?php include($_SERVER['DOCUMENT_ROOT']."/app/layout/notification.php") ?>
                </li>
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="/assets/img/profile/<?php echo $_SESSION["profile_picture"] ?>" alt class="rounded-circle" />
                    </div>
                  </a>
                  <?php include $_SERVER['DOCUMENT_ROOT']."/app/layout/menu-dropdown.php" ?>
                </li>
              </ul>
            </div>
            <div class="navbar-search-wrapper search-input-wrapper d-none">
              <input
                type="text"
                class="form-control search-input container-xxl border-0"
                placeholder="Search..."
                aria-label="Search..." />
              <i class="ri-close-fill search-toggler cursor-pointer"></i>
            </div>
          </nav>
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-md-12">
                  <div class="nav-align-top">
                    <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-2 gap-lg-0">
                      <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="settings"><i class="ri-group-line me-2"></i> Account</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="security"><i class="ri-lock-line me-2"></i> Security</a>
                      </li>
                      <li class="nav-item">
                        
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active waves-effect waves-light" href="javascript:void(0);"><i class="ri-notification-4-line me-2"></i> Notifications</a>
                      </li>
                      <li class="nav-item">
                        
                      </li>
                    </ul>
                  </div>
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
                          $query = "SELECT * FROM notifications";
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
              </div>
            </div>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/app/layout/footer.php'; ?>
            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>
      <div class="layout-overlay layout-menu-toggle"></div>
      <div class="drag-target"></div>
    </div>

    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="/assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="/assets/vendor/js/menu.js"></script>
    <script src="/assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="/assets/vendor/libs/swiper/swiper.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/dashboards-analytics.js"></script>
    <script src="../../assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="/assets/js/notyf.js"></script>

    <script>
        $(document).ready(function() {
            var dt_user_table = $('#logbook_list').DataTable({
                responsive: true,
                language: {
                    emptyTable: 'Notifications of user will appear here',
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
