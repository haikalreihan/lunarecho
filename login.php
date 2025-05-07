<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/app/database/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/controllers/recent_devices.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/encryption/argon2hash.php');

if (isset($_SESSION['username'])) {
    if (isset($_SESSION['timeout']) && $_SESSION['timeout'] + 3600 < time()) {
        // Session has timed out, destroy the session
        session_destroy();
        header("Location: ?errorMessage=Session has timed out");
        exit();
    }
    header("Location: ../");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $redirect_url = $_POST['redirect_url'];
        // Ambil hash password dari database berdasarkan username
        $sql = "SELECT password FROM users WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();
        $stmt->close();

        // Verifikasi password yang diinput dengan hash yang tersimpan
        if ($hashedPassword && argon2idHashVerify($password, 'airnavlogcat123', $hashedPassword)) {
            $_SESSION['username'] = $username;
            $_SESSION['timeout'] = time(); // Set session timeout

            $deviceInfo = getDeviceInfo();
            saveDeviceInfoToDatabase($conn, $deviceInfo);
            if (isset($redirect_url)) {
                header("Location: ".BASE_URL.$redirect_url);
                die();
            }
            else {
                header("Location: ../dashboard");
                die();
            }
        } else {
            header("Location: ?errorMessage=Username or password is incorrect");
        }
}
?>
<!doctype html>
<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template" data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Login - <?php echo TITLE ?> (CATATAN FASILITAS DAN KEGIATAN PERUM LPPNPI CABANG JATSC)</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/png" href="../assets/img/branding/logo-small.png">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/vendor/fonts/remixicon/remixicon.css" />
    <link rel="stylesheet" href="/assets/vendor/fonts/flag-icons.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/toastr/toastr.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/@form-validation/form-validation.css" />
    <link rel="stylesheet" href="/assets/vendor/css/pages/page-auth.css" />
    <script src="/assets/vendor/js/helpers.js"></script>
    <script src="/assets/vendor/js/template-customizer.js"></script>
    <script src="/assets/js/config.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body>
    <div class="position-relative">
      <div class="authentication-wrapper authentication-basic container-p-y p-4 p-sm-0">
        <div class="authentication-inner py-6">
          <!-- Login -->
          <div class="card p-md-7 p-1">
            <!-- Logo -->
            <div class="app-brand justify-content-center mt-5">
              <a href="." class="app-brand-link gap-2">
                <img src="/assets/img/branding/logo.png" style="width:40px; height:40px;"></img>
                <span class="app-brand-text demo text-heading fw-semibold"><?php echo TITLE ?></span>
              </a>
            </div>
            <!-- /Logo -->
            <div class="card-body mt-1">
              <p class="mb-5 text-center">For Optimal HR Competitiveness at AirNav Indonesia</p>
              <form id="formAuthentication" class="mb-5" action="login" method="POST">
                <input type="hidden" name="redirect_url" value="<?php echo $_GET["redirect_url"] ?>" />
                <div class="form-floating form-floating-outline mb-5">
                  <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autofocus />
                  <label for="username">Username</label>
                </div>
                <div class="mb-5">
                  <div class="form-password-toggle">
                    <div class="input-group input-group-merge">
                      <div class="form-floating form-floating-outline">
                        <input type="password" id="password" class="form-control" name="password" placeholder="••••••••••••" aria-describedby="password" />
                        <label for="password">Password</label>
                      </div>
                      <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line"></i></span>
                    </div>
                  </div>
                </div>
                <div class="mb-5">
                  <!-- Google reCAPTCHA -->
                  <div class="g-recaptcha" data-sitekey="6LfD1BMqAAAAAInw96zHKTd_nD-6My8P2pi0k1ce"></div>
                </div>
                <div class="mb-5">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /Login -->
          <img alt="mask" src="/assets/img/illustrations/auth-basic-login-mask-light.png" class="authentication-image d-none d-lg-block" data-app-light-img="illustrations/auth-basic-login-mask-light.png" data-app-dark-img="illustrations/auth-basic-login-mask-dark.png" />
        </div>
      </div>
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
    <script src="/assets/vendor/libs/@form-validation/popular.js"></script>
    <script src="/assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="/assets/vendor/libs/@form-validation/auto-focus.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/pages-auth.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="../../../assets/js/notyf.js"></script>
  </body>
</html>
