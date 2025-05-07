<?php
include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/session.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/user_info.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/encryption/argon2hash.php');
$disable_unit = 1;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['currentPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword'])) {
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Persyaratan password
    $passwordPattern = '/^(?=.*[a-z])(?=.*[\d\s!@#$%^&*()_+{}\[\]:;"\'<>,.?\/\\|~`-]).{8,}$/';

    if ($newPassword !== $confirmPassword) {
        header("Location: ?errorMessage=New passwords do not match!");
        die();
    } elseif (!preg_match($passwordPattern, $newPassword)) {
        header("Location: ?errorMessage=Password does not meet the requirements.");
        die();
    } else {
        $username = $_SESSION['username'];
        
        // Ambil hash password dari database
        $sql = "SELECT password FROM users WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();
        $stmt->close();
        
        // Verifikasi password saat ini
        if (argon2idHashVerify($currentPassword, 'airnavlogcat123', $hashedPassword)) {
            // Hash password baru
            $newHashedPassword = argon2idHash($newPassword, 'airnavlogcat123');
            
            // Simpan hash password baru ke database
            $update_sql = "UPDATE users SET password=? WHERE username=?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("ss", $newHashedPassword, $username);
            if ($update_stmt->execute()) {
                header("Location: ?successMessage=Password successfully updated!");
                die();
            } else {
                header("Location: ?errorMessage=Failed to update password. Please try again later.");
                die();
            }
            $update_stmt->close();
        } else {
            header("Location: ?errorMessage=Current password is incorrect!");
            die();
        }
    }
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

    <title>LOGCAT - ACCOUNT SETTINGS</title>

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
    <link rel="stylesheet" href="/assets/vendor/css/pages/cards-statistics.css" />
    <link rel="stylesheet" href="/assets/vendor/css/pages/cards-analytics.css" />

    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="/assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

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

          <!-- Sidebar -->
          <?php include($_SERVER['DOCUMENT_ROOT']."/app/layout/sidebar.php") ?>
        </aside>
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
                      <img src="/assets/img/profile/<?php echo $_SESSION["profile_picture"] ?>" alt class="rounded-circle" />
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

            <div class="container-xxl flex-grow-1 container-p-y" data-select2-id="13">
              <div class="row" data-select2-id="12">
                <div class="col-md-12" data-select2-id="11">
                  <div class="nav-align-top">
                    <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-2 gap-lg-0">
                      <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="settings"><i class="ri-group-line me-2"></i> Account</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active waves-effect waves-light" href="javascript:void(0);"><i class="ri-lock-line me-2"></i> Security</a>
                      </li>
                      <li class="nav-item">
                        
                      </li>
                      <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="notifications"><i class="ri-notification-4-line me-2"></i> Notifications</a>
                      </li>
                      <li class="nav-item">
                        
                      </li>
                    </ul>
                  </div>
                  <!-- Change Password -->
                  <div class="card mb-6">
                    <h5 class="card-header">Change Password</h5>
                    <div class="card-body pt-1">
                      <form id="formAccountSettings" method="POST" action="">
                        <div class="row">
                          <div class="mb-5 col-md-6 form-password-toggle fv-plugins-icon-container">
                            <div class="input-group input-group-merge">
                              <div class="form-floating form-floating-outline">
                                <input class="form-control" type="password" name="currentPassword" id="currentPassword" placeholder="············">
                                <label for="currentPassword">Current Password</label>
                              </div>
                              <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line"></i></span>
                            </div>
                          <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                        </div>
                        <div class="row g-5 mb-6">
                          <div class="col-md-6 form-password-toggle fv-plugins-icon-container">
                            <div class="input-group input-group-merge">
                              <div class="form-floating form-floating-outline">
                                <input class="form-control" type="password" id="newPassword" name="newPassword" placeholder="············">
                                <label for="newPassword">New Password</label>
                              </div>
                              <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line"></i></span>
                            </div>
                          <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                          <div class="col-md-6 form-password-toggle fv-plugins-icon-container">
                            <div class="input-group input-group-merge">
                              <div class="form-floating form-floating-outline">
                                <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="············">
                                <label for="confirmPassword">Confirm New Password</label>
                              </div>
                              <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line"></i></span>
                            </div>
                          <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                        </div>
                        <h6 class="text-body">Password Requirements:</h6>
                        <ul class="ps-4 mb-0">
                          <li class="mb-4">Minimum 8 characters long - the more, the better</li>
                          <li class="mb-4">At least one lowercase character</li>
                          <li>At least one number, symbol, or whitespace character</li>
                        </ul>
                        <div class="mt-6">
                          <button type="submit" class="btn btn-primary me-3 waves-effect waves-light">Save changes</button>
                          <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                        </div>
                      <input type="hidden"></form>
                    </div>
                  </div>
                  <!--/ Change Password -->

                  <!-- Two-steps verification -->
                  <div class="card mb-6">
                    <div class="card-body">
                      <h5 class="mb-6">Two-steps verification</h5>
                      <p class="mb-4">Two factor authentication is not enabled yet.</p>
                      <p class="w-75">
                        Two-factor authentication adds an additional layer of security to your account by requiring more
                        than just a password to log in.
                        <a href="javascript:void(0);">Learn more.</a>
                      </p>
                      <button class="btn btn-primary mt-2 waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#enableOTP">
                        Enable Two-Factor Authentication
                      </button>
                    </div>
                  </div>
                  <!-- Modal -->
                  <!-- Enable OTP Modal -->
                  <div class="modal fade" id="enableOTP" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
                      <div class="modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body p-0">
                          <div class="text-center mb-6">
                            <h4 class="mb-2">Enable One Time Password</h4>
                            <p>Verify Your Mobile Number for SMS</p>
                          </div>
                          <p class="mb-5">
                            Enter your mobile phone number with country code and we will send you a verification code.
                          </p>
                          <form id="enableOTPForm" class="row g-5 fv-plugins-bootstrap5 fv-plugins-framework" onsubmit="return false" novalidate="novalidate">
                            <div class="col-12 fv-plugins-icon-container">
                              <div class="input-group input-group-merge">
                                <span class="input-group-text">US (+1)</span>
                                <div class="form-floating form-floating-outline">
                                  <input type="text" id="modalEnableOTPPhone" name="modalEnableOTPPhone" class="form-control phone-number-otp-mask" placeholder="202 555 0111">
                                  <label for="modalEnableOTPPhone">Phone Number</label>
                                </div>
                              </div>
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                            <div class="col-12 d-flex flex-wrap justify-content-center gap-4 row-gap-4">
                              <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                              <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal" aria-label="Close">
                                Cancel
                              </button>
                            </div>
                          <input type="hidden"></form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <h6 class="card-header">Recent Devices</h6>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="text-truncate">Browser</th>
                            <th class="text-truncate">Device</th>
                            <th class="text-truncate">Location</th>
                            <th class="text-truncate">Recent Activities</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                              $no = 0;
                              $query = mysqli_query($conn, "SELECT device_name, device_type, os, browser, ip_address, country, last_login FROM recent_devices ORDER BY last_login DESC LIMIT 5");
                              while ($row = mysqli_fetch_assoc($query)) {
                                  $no++;
                          ?>
                          <tr>
                            <td class="text-truncate text-heading">
                              <?php
                                if ($row["os"] == "Windows") {
                                    echo '<i class="ri-computer-line ri-20px text-warning me-3"></i>'.$row["browser"].' on '.$row["os"];
                                }
                                else if ($row["os"] == "Linux") {
                                    echo '<i class="ri-android-line ri-20px text-success me-3"></i>'.$row["browser"].' on Android';
                                }
                                else if ($row["row"] == "iOS") {
                                    echo '<i class="ri-apple-fill ri-20px text-info me-3"></i>'.$row["browser"].' on '.$row["os"];
                                }
                                else if ($row["row"] == "Mac") {
                                    echo '<i class="ri-macbook-line ri-20px text-danger me-3"></i>'.$row["browser"].' on '.$row["os"];
                                }
                              ?>
                            </td>
                            <td class="text-truncate"><?php echo $row["device_name"] ?></td>
                            <td class="text-truncate"><?php echo $row["country"] ?></td>
                            <td class="text-truncate"><?php echo $row["last_login"] ?></td>
                          </tr>
                          <?php
                             }
                             if ($no == 0) {
                                 echo '<tr>
                            <td class="text-truncate text-heading">
                              <i class="ri-macbook-line ri-20px text-warning me-3"></i>No recent devices at now.
                            </td>
                            <td class="text-truncate"></td>
                            <td class="text-truncate"></td>
                            <td class="text-truncate"></td>
                          </tr>';
                             }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!--/ Recent Devices -->
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
