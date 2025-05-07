<?php
include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/session.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/user_info.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/unit.php');
?>
<!doctype html>
<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name=" Viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?php echo TITLE ?> - LOGBOOK (<?php echo strtoupper($unit_title) ?>)</title>

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
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/@form-validation/form-validation.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/pages/cards-statistics.css" />
    <link rel="stylesheet" href="../../assets/vendor/css/pages/cards-analytics.css" />

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
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
                      <img src="../../assets/img/profile/<?php echo $_SESSION["profile_picture"] ?>" alt class="rounded-circle" />
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
              <!-- Modal -->
              <div class="modal fade" id="new-user" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <form action="../function/add_report?unit=<?php echo $unit_id ?>" method="post">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modalCenterTitle">Tambah Logbook Judul</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-6 mt-2">
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" id="nameWithTitle" name="nameWithTitle" class="form-control" placeholder="Enter Judul" required>
                                        <label for="nameWithTitle">Judul</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col mb-6">
                                    <div class="form-floating form-floating-outline">
                                       <div class="row">
                                          <div class="col-md mb-md-0 mb-5">
                                            <div class="form-check custom-option custom-option-icon">
                                              <label class="form-check-label custom-option-content" for="radio_pagi">
                                                <span class="custom-option-body">
                                                  <i class="ri-sun-line"></i>
                                                  <span class="custom-option-title mb-2">Pagi</span>
                                                  <small> Saya bekerja saat pagi hari</small>
                                                </span>
                                                <input name="radio_shift" class="form-check-input" type="radio" value="0" id="radio_shift" checked="">
                                              </label>
                                            </div>
                                          </div>
                                          <div class="col-md mb-md-0 mb-5">
                                            <div class="form-check custom-option custom-option-icon checked">
                                              <label class="form-check-label custom-option-content" for="radio_siang">
                                                <span class="custom-option-body">
                                                  <i class="ri-sun-cloudy-line"></i>
                                                  <span class="custom-option-title mb-2"> Siang </span>
                                                  <small> Saya bekerja saat siang hari </small>
                                                </span>
                                                <input name="radio_shift" class="form-check-input" type="radio" value="1" id="radio_siang">
                                              </label>
                                            </div>
                                          </div>
                                          <div class="col-md">
                                            <div class="form-check custom-option custom-option-icon">
                                              <label class="form-check-label custom-option-content" for="radio_malam">
                                                <span class="custom-option-body">
                                                  <i class="ri-moon-line"></i>
                                                  <span class="custom-option-title mb-2"> Malam </span>
                                                  <small>Saya bekerja saat malam hari</small>
                                                </span>
                                                <input name="radio_shift" class="form-check-input" type="radio" value="2" id="radio_malam">
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4">
                                <div class="col mb-2">
                                    <div class="form-floating form-floating-outline">
                                        <input type="date" id="dateWithTitle" name="dateWithTitle" value="<?php echo date('Y-m-d'); ?>" class="form-control" required>
                                        <label for="dateWithTitle">Tanggal Kegiatan</label>
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
                </div>
                <div class="container-xxl flex-grow-1 container-p-y">
                  <div class="card">
                    <div class="card-header border-bottom">
                      <h5 class="card-title mb-0">LOGBOOK (<?php echo strtoupper($unit_title) ?>)</h5>
                    </div>
                    <div class="card-datatable table-responsive">
                    <table id="logbook_list" class="datatables-users table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Tanggal Kegiatan</th>
                                    <th>Shift</th>
                                    <th>Judul</th>
                                    <th>Author</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php
                                $no = 0;
                                $query = mysqli_query($conn, "SELECT * FROM `".$unit_title."`");
                                while ($row = mysqli_fetch_assoc($query)) {
                                    $no++;
                                ?>
                                <tr>
                                    <td><span class="fw-medium"><?php echo $no ?></span></td>
                                    <td><span class="fw-medium"><?php echo $row['id'] ?></span></td>
                                    <td><?php echo $row['tanggal_kegiatan'] ?></td>
                                    <td><?php 
                                        if ($row['shift'] == "0") {
                                            echo "Pagi";
                                        } else if ($row['shift'] == "1") {
                                            echo "Siang";
                                        } else if ($row['shift'] == "2") {
                                            echo "Malam";
                                        } else {
                                            echo "Terdapat error.";
                                        }
                                    ?></td>
                                    <td><?php echo $row['judul'] ?></td>
                                    <td><?php
                                        $found = false;
                                        $query_user = mysqli_query($conn, 'SELECT * FROM `users` WHERE id = '.$row["author_id"]);
                                        while ($row_user = mysqli_fetch_assoc($query_user)) {
                                            $found = true;
                                            echo $row_user["name"];
                                        }
                                        if ($found == false) {
                                            echo 'Deleted User';
                                        }?></td>
                                    <td><?php 
                                        if ($row['status'] == 0) {
                                            echo '<span class="badge rounded-pill bg-label-warning" text-capitalized="">Pending</span>';
                                        }
                                        else {
                                            echo '<span class="badge rounded-pill bg-label-success" text-capitalized="">Approved</span>';
                                        }
                                    ?></td>
                                    <td class="dtr-hidden" style="display: none;">
                                        <?php if ($_SESSION["access_level"] > 0 || $_SESSION["user_id"] == $row["author_id"]) { ?>
                                        <a href="dashboard/edit/<?php echo $row['id'] ?>" class="btn btn-sm btn-text-secondary rounded-pill btn-icon item-edit"><i class="ri-edit-box-line"></i></a>
                                            <div class="d-inline-block">
                                                <a href="javascript:;" class="btn btn-sm btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="ri-more-2-line"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end m-0">
                                                    <li>
                                                        <?php if ($_SESSION["access_level"] > 0) { 
                                                                if ($row['status'] == 0) {?>
                                                            <a href="dashboard/approve/<?php echo $row['id']; ?>" class="dropdown-item">Approve</a>
                                                        <?php }
                                                        } ?>
                                                    </li>
                                                    <li>
                                                        <a href="dashboard/view/<?php echo $row['id']; ?>" target="_blank" class="dropdown-item">View</a>
                                                    </li>
                                                    <div class="dropdown-divider"></div>
                                                    <li>
                                                        <a href="javascript:;" data-id="<?php echo $row['id']; ?>" data-unit-id="<?php echo $unit_id; ?>" class="dropdown-item text-danger delete-record">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        <?php } else { ?>
                                            <a href="dashboard/view/<?php echo $row['id'] ?>" target="_blank" class="btn btn-sm btn-text-secondary rounded-pill btn-icon item-edit"><i class="ri-eye-line"></i></a>
                                        <?php } ?>
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
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/moment/moment.js"></script>
    <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/select2/select2.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/popular.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/auto-focus.js"></script>
    <script src="../../assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="../../assets/vendor/libs/cleavejs/cleave-phone.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/dashboards-analytics.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <!-- DataTable -->
    <script>
        $(document).ready(function() {
            var dt_user_table = $('#logbook_list').DataTable({
                responsive: true,
                language: {
                    sLengthMenu: 'Show _MENU_',
                    search: '',
                    searchPlaceholder: 'Search Title',
                    emptyTable: 'No data available in logbook'
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
                "<button class='btn btn-primary waves-effect waves-light' data-bs-toggle='modal' data-bs-target='#new-user'><i class='ri-add-line me-0 me-sm-1 d-inline-block d-sm-none'></i><span class= 'd-none d-sm-inline-block'> Add New Title </span ></button>"
            );
            $('#logbook_list').on('click', '.delete-record', function () {
            var $row = $(this).closest('tr');
            var unit_title = <?php echo json_encode($unit_title); ?>;
            var unit_id = $(this).data('unit-id'); // Getting unit_id
            var logbook_id = $(this).data('id'); // Getting logbook id
            var table = $('#logbook_list').DataTable();
            var currentPage = table.page();
            var recordsOnPage = table.rows({ page: 'current' }).count(); // Using .count()
            console.log(unit_title);
            console.log(unit_id);
            console.log(logbook_id);
            if (confirm('Apakah Anda yakin ingin menghapus logbook ini?')) {
                $.ajax({
                    url: '../function/delete_report', // Make sure URL is correct
                    type: 'POST',
                    data: { unit_title: unit_title, unit_id: unit_id, id: logbook_id }, // Posting both unit_id and logbook_id
                    dataType: 'json',
                    success: function(data) {
                        if (data.success) {
                            table.row($row).remove().draw(false);
                            // Update row numbers
                            table.rows().every(function (rowIdx, tableLoop, rowLoop) {
                                this.cell(rowIdx, 0).data(rowIdx + 1); // Update row numbers
                            }).draw(false);
        
                            // Move to the previous page if the current page is empty after deletion
                            if (recordsOnPage === 1 && currentPage > 0) {
                                table.page(currentPage - 1).draw('page');
                            }
                        } else {
                            alert(data.message);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error sending request. Please try again.');
                    }
                });
            }
        });

        });
    </script>
    <!-- Notyf Alert -->
    <script src="../../../assets/js/notyf.js"></script>
    <!-- Notification -->
    <script src="../../../assets/js/notification.js"></script>
  </body>
</html>
