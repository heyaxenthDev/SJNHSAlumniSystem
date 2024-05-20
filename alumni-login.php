<?php
session_start();
include 'includes/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Log in - SJNHS Alumni Website</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style-login.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <?php
    include 'alert.php';
    ?>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <a href="\SJNHSAlumniSystem/index.php" class="text-dark m-3 position-absolute top-0 end-0"><i class="bi bi-x-circle-fill"></i></a>

                            <div class="d-flex justify-content-center py-2">
                                <a href="index.php" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/SJNHS-logo.png" alt="">
                                </a>
                            </div><!-- End Logo -->

                            <div class="pt-2 pb-2">
                                <h5 class="card-title text-center pb-3 fs-4 fw-medium" style="color: #013220;">SJNHS -
                                    Alumni
                                    Yearbook
                                    &
                                    Directory Website
                                </h5>
                                <p class="text-center small">Enter your email & password to login</p>
                            </div>

                            <form class="row g-3" method="POST" action="login-code.php">

                                <input type="hidden" name="typeGrad" id="typeGrad" value="<?php echo $_GET['Type']; ?>">

                                <div class="col-12">
                                    <label for="yourEmail" class="form-label">Email Address</label>
                                    <input type="text" name="email" class="form-control" id="yourEmail" value="<?php if (isset($_SESSION['entered_email'])) {
                                                                                                                    echo $_SESSION['entered_email'];
                                                                                                                }
                                                                                                                unset($_SESSION['entered_email']); ?>" required>
                                </div>

                                <div class="col-12 mb-3">
                                    <div style="position: relative;">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                                        <span hidden="hidden" class="field-icon toggle-password bi bi-eye-fill" id="icon" style="position: absolute; right: 12px; transform: translate(0, -50%); top: 72%; cursor: pointer;"></span>
                                    </div>
                                </div>
                                <script src="js/show-password.js"></script>


                                <!-- <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" value="true"
                                            id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                </div> -->
                                <div class="col-12">
                                    <button class="btn rounded-5 w-100 text-white btn-lg" type="submit" style="background-color: #013220;" name="alumniLogin">Login</button>
                                </div>
                                <div class="col-12 mt-5 mb-5 text-center">
                                    <p class="small mb-0">Don't have account? <a href="#" class="text-success">Click
                                            here</a></p>
                                </div>
                            </form>

                            <div class="credits mt-5">
                                Designed by <a href="https://bootstrapmade.com/" class="text-dark">BootstrapMade</a>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main-login.js"></script>

</body>

</html>