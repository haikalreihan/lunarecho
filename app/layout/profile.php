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
}1;
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

    <title><?php echo htmlspecialchars(TITLE, ENT_QUOTES, 'UTF-8'); ?> - PROFILE</title>

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
    <link rel="stylesheet" href="/assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/swiper/swiper.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/pages/page-profile.css" />

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
                    <li class="nav-item"><a class="nav-link active waves-effect waves-light" href="javascript:void(0);"><i class="ri-user-3-line me-2"></i>Profile</a></li>
                    <li class="nav-item"><a class="nav-link waves-effect waves-light" href="../notifications/<?php echo $_GET["username"] ?>"><i class="ri-notification-line me-2"></i>Notifications</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <!--/ Navbar pills -->
            
            <!-- User Profile Content -->
            <div class="row">
              <div class="col-xl-4 col-lg-5 col-md-5">
                <!-- About User -->
                <div class="card mb-6">
                  <div class="card-body">
                    <small class="card-text text-uppercase text-muted small">About</small>
                    <ul class="list-unstyled my-3 py-1">
                      <li class="d-flex align-items-center mb-4"><i class="ri-user-3-line ri-24px"></i><span class="fw-medium mx-2">Full Name:</span> <span><?php echo htmlspecialchars($row_user["name"], ENT_QUOTES, 'UTF-8'); ?></span></li>
                      <li class="d-flex align-items-center mb-4"><i class="ri-tools-line ri-24px"></i><span class="fw-medium mx-2">Technician:</span> <span><?php echo $row_user["technician"] == 1 ? 'True' : 'False'; ?></span></li>
                      <li class="d-flex align-items-center mb-4"><i class="ri-star-smile-line ri-24px"></i><span class="fw-medium mx-2">Role:</span> <span><?php 
                          echo $row_user["access_level"] == 1 ? 'Support' : 
                               ($row_user["access_level"] == 2 ? 'Admin' : 'User'); 
                        ?></span></li>
                      <li class="d-flex align-items-center mb-4"><i class="ri-flag-2-line ri-24px"></i><span class="fw-medium mx-2">Country:</span> <span>Indonesia</span></li>
                      
                    </ul>
                    <small class="card-text text-uppercase text-muted small">Contacts</small>
                    <ul class="list-unstyled my-3 py-1">
                      <li class="d-flex align-items-center mb-4"><i class="ri-phone-line ri-24px"></i><span class="fw-medium mx-2">Contact:</span> <span><?php echo htmlspecialchars($row_user["phone_number"], ENT_QUOTES, 'UTF-8'); ?></span></li>
                      
                      <li class="d-flex align-items-center mb-2"><i class="ri-mail-open-line ri-24px"></i><span class="fw-medium mx-2">Email:</span> <span><?php echo htmlspecialchars($row_user["email"], ENT_QUOTES, 'UTF-8'); ?></span></li>
                    </ul>
                  </div>
                </div>
                <?php }
                    $stmt->close();
                ?>
                <!--/ About User -->
                <!-- Profile Overview -->
                <?php
                    $notify_count = 0;
                    $query_notify = mysqli_query($conn, "SELECT * FROM `notifications` WHERE author_id = '$author_id'");
                    while ($row_notify = mysqli_fetch_assoc($query_notify)) {
                        $notify_count++;
                    }
                ?>
                <div class="card mb-6">
                  <div class="card-body">
                    <small class="card-text text-uppercase text-muted small">Overview</small>
                    <ul class="list-unstyled mb-0 mt-3 pt-1">
                      <li class="d-flex align-items-center mb-4"><i class="ri-git-repository-line ri-24px"></i><span class="fw-medium mx-2">Logbook Created:</span> <span><?php echo $notify_count ?></span></li>
                    </ul>
                  </div>
                </div>
                <!--/ Profile Overview -->
              </div>
              <div class="col-xl-8 col-lg-7 col-md-7">
                <!-- Activity Timeline -->
                <div class="card card-action mb-6">
                  <div class="card-header align-items-center">
                    <h5 class="card-action-title mb-0"><i class="ri-bar-chart-2-line ri-24px text-body me-4"></i>Activity Timeline</h5>
                  </div>
                  <div class="card-body pt-5">
                    <ul class="timeline mb-0">
                      <?php
                        $query_notify = mysqli_query($conn, "SELECT * FROM notifications WHERE author_id = '$author_id' ORDER BY date DESC LIMIT 5");
                        if (mysqli_num_rows($query_notify) > 0) {
                          while ($row_notify = mysqli_fetch_assoc($query_notify)) {
                      ?>
                      <li class="timeline-item timeline-item-transparent">
                        <span class="timeline-point timeline-point-<?php
                        $randomNumbers = [];
                        for ($i = 0; $i < 3; $i++) {
                            $randomNumbers[] = rand(1, 3);
                        }
                        
                        // Menampilkan pesan untuk setiap angka yang dihasilkan menggunakan operator ternary
                        foreach ($randomNumbers as $number) {
                            $message = $number == 1 ? "primary" : ($number == 2 ? "success" : "info");
                        }
                        echo $message;
                        ?>"></span>
                        <div class="timeline-event">
                          <div class="timeline-header mb-3">
                            <h6 class="mb-0"><?php echo htmlspecialchars($row_notify['title'], ENT_QUOTES, 'UTF-8'); ?></h6>
                            <small class="text-muted"><?php 
                            $now = time();
                            $notification_time = strtotime($row_notify['date']);
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
                            echo htmlspecialchars($date_ago, ENT_QUOTES, 'UTF-8').' ago';
                            ?></small>
                          </div>
                          <p class="mb-2"><?php echo htmlspecialchars($row_notify['body'], ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                      </li>
                      <?php
                          }
                        } else {
                      ?>
                      <span class="timeline-point timeline-point-primary"></span>
                        <div class="timeline-event">
                          <div class="timeline-header mb-3">
                            <h6 class="mb-0">No timeline yet on this user</h6>
                          </div>
                        </div>
                      <?php
                        }
                      ?>
                    </ul>
                  </div>
                </div>
                <!--/ Activity Timeline -->
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
  </body>
</html>