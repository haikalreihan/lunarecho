<?php
include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/session.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/user_info.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/access.php');
// Set timezone ke Indonesia (WIB)
date_default_timezone_set('Asia/Jakarta');
$disable_unit = 1; $is_manage_position = 1;
?>
<!doctype html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template" data-style="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title><?php echo TITLE ?> - MANAGE POSITIONS</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/png" href="../../assets/img/branding/logo-small.png">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/remixicon/remixicon.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/@form-validation/form-validation.css" />
    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <script src="../../assets/js/config.js"></script>
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php include($_SERVER['DOCUMENT_ROOT']."/app/layout/header.php") ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
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
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card">
                <div class="card-header border-bottom">
                  <h5 class="card-title mb-0">Manage Positions</h5>
                </div>
                <div class="card-datatable table-responsive">
                  <table id="position_list" class="datatables-users table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Positions</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 0;
                      $query = mysqli_query($conn, "SELECT * FROM positions");
                      while ($row = mysqli_fetch_assoc($query)) {
                          $no++;
                          echo "<tr>";
                          echo "<td>" . $no . "</td>";
                          echo "<td id='position_name_" . $row['no'] . "'>" . $row['name'] . "</td>";
                          echo "<td>
                            <div class='dropdown'>
                              <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                                <i class='ri-more-2-line'></i>
                              </button>
                              <div class='dropdown-menu'>
                                <a class='dropdown-item waves-effect edit-position' href='#' data-id='" . $row['no'] . "'><i class='ri-pencil-line'></i> Edit</a>
                                <a class='dropdown-item waves-effect delete-position' href='#' data-id='" . $row['no'] . "'><i class='ri-delete-bin-7-line me-1'></i>Delete</a>
                              </div>
                            </div>
                          </td>";
                          echo "</tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                <!-- Modal to add or edit position -->
                <div class="modal fade" id="new-position" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form id="position_form">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modalCenterTitle">Tambah Jabatan Baru</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="input-group input-group-merge mb-6">
                                            <span id="basic-icon-default-positionname" class="input-group-text"><i class="ri-tools-line"></i></span>
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" class="form-control" id="position_name" name="position_name" placeholder="Nama Jabatan" aria-label="Nama Jabatan" aria-describedby="basic-icon-default-positionname">
                                                <label for="basic-icon-default-positionname">Nama Jabatan</label>
                                                <input type="hidden" name="position_id" id="position_id" value="0">
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
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>
    <script src="../../assets/vendor/libs/moment/moment.js"></script>
    <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/select2/select2.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/popular.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/auto-focus.js"></script>
    <script src="../../assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="../../assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="../../assets/js/main.js"></script>
    <!-- Notyf Alert -->
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="../../assets/js/notyf.js"></script
    <!-- Core JS -->
    <!-- Script untuk menangani form submit untuk tambah/edit -->
    <script>
        $(document).ready(function() {
            var dt_user_table = $('#position_list').DataTable({
                responsive: true,
                language: {
                    sLengthMenu: 'Show _MENU_',
                    search: '',
                    searchPlaceholder: 'Search Positions'
                },
                columnDefs: [
                    { targets: 0, orderable: false, searchable: true }
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
            // Add New Button
            $('.add-new').html(
                "<button class='btn btn-primary waves-effect waves-light add-new-position' data-bs-toggle='modal' data-bs-target='#new-position'><i class='ri-add-line me-0 me-sm-1 d-inline-block d-sm-none'></i><span class= 'd-none d-sm-inline-block'> Add New Positions </span ></button>"
            );
            // Menyimpan nomor halaman saat ini sebelum reload
            function saveCurrentPage() {
                //var currentPage = dt_user_table.page();
                //sessionStorage.setItem('currentPage', currentPage);
                var info = dt_user_table.page.info();
                var currentPage = info.page;
                var lastPage = info.pages - 1;
        
                if (currentPage === lastPage) {
                    sessionStorage.setItem('currentPage', currentPage);
                } else {
                    sessionStorage.setItem('currentPage', lastPage);
                }
            }
        
            // Mengatur DataTable ke halaman yang disimpan
            function setCurrentPage() {
                var currentPage = sessionStorage.getItem('currentPage');
                if (currentPage) {
                    dt_user_table.page(parseInt(currentPage)).draw(false);
                    sessionStorage.removeItem('currentPage'); // Hapus data dari storage setelah digunakan
                }
            }
            //Edit
            $('#position_list tbody').on('click', '.edit-position', function () {
                var id = $(this).data('id');
                var positionName = $('#position_name_' + id).text();
                $('#position_name').val(positionName);
                $('#position_id').val(id);
                $('#modalCenterTitle').text('Edit Jabatan');
                $('#new-position').modal('show');
            });
            $('.add-new-position').on('click', function () {
                $('#position_name').val("");
                $('#position_id').val(0);
                $('#modalCenterTitle').text('Tambah Jabatan Baru');
                $('#new-position').modal('show');
            });
            // Panggil setCurrentPage saat dokumen siap
            setCurrentPage();
            // Form submission for adding/editing tool
            $('#position_form').on('submit', function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: 'position/update', // Pastikan URL benar
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data); // Debug: periksa isi data
                        if (data.success) {
                            saveCurrentPage(); // Simpan halaman saat ini
                            window.location.replace("?successMessage=Berhasil memperbarui Jabatan");
                        } else {
                            window.location.replace("?errorMessage=" + encodeURIComponent(data.message));
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('AJAX Error:', textStatus, errorThrown);
                        console.error('Response Text:', jqXHR.responseText);
                        alert('An error occurred. Please try again.');
                    }
                });
            });
        
            $('#position_list').on('click', '.delete-position', function () {
                var $row = $(this).closest('tr');
                var id = $(this).data('id');
                var table = $('#position_list').DataTable();
                var currentPage = table.page();
                var recordsOnPage = table.rows({ page: 'current' }).count(); // Menggunakan .count()
        
                if (confirm('Apakah Anda yakin ingin menghapus jabatan ini?')) {
                    $.ajax({
                        url: 'position/delete', // Pastikan URL benar
                        type: 'POST',
                        data: { position_id: id },
                        dataType: 'json',
                        success: function(data) {
                            if (data.success) {
                                table.row($row).remove().draw(false);
                                // Perbarui nomor urut
                                table.rows().every(function (rowIdx, tableLoop, rowLoop) {
                                    this.cell(rowIdx, 0).data(rowIdx + 1); // Update nomor urut
                                }).draw(false);
        
                                // Pindah ke halaman sebelumnya jika halaman saat ini kosong setelah penghapusan
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
  </body>
</html>