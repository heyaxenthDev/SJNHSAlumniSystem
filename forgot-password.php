<?php
session_start();
include 'includes/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Forgot Password - SJNHS Alumni Website</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <a href="\SJNHSAlumniSystem/index.php" class="text-dark m-3 position-absolute top-0 end-0">
                                <i class="bi bi-x-circle-fill"></i>
                            </a>

                            <div class="d-flex justify-content-center py-2">
                                <a href="index.php" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/SJNHS-logo.png" alt="Logo" class="img-fluid"
                                        style="max-height: 80px;">
                                </a>
                            </div>

                            <div class="text-center pt-2 pb-3">
                                <h5 class="card-title pb-2 fs-4 fw-medium text-success">SJNHS - Alumni Yearbook &
                                    Directory Website</h5>
                                <p class="text-muted">Forgot Password</p>
                            </div>

                            <form id="forgotPasswordForm" class="w-100" method="POST" action="login-code.php">
                                <div class="mb-3">
                                    <select name="type" id="type" class="form-select" required>
                                        <option value="">--Select Account Type--</option>
                                        <option value="SHS">Senior High</option>
                                        <option value="JHS">Junior High</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <input type="text" class="form-control" name="email" id="email"
                                        placeholder="Enter Email" required>
                                </div>

                                <button type="button" class="btn btn-success rounded-5 w-100 btn-lg"
                                    onclick="getSecurityQuestion()">Next</button>
                            </form>

                            <div class="row mt-3 w-100" id="securityQuestionSection" style="display: none;">
                                <p class="text-center fw-bold" id="securityQuestion"></p>
                                <input type="text" class="form-control mb-3" name="securityAnswer" id="securityAnswer"
                                    placeholder="Enter Your Answer" required>
                                <button type="button" class="btn btn-success rounded-5 w-100 btn-lg"
                                    onclick="verifyAnswer()">Submit</button>
                            </div>

                            <div class="row mt-3 w-100" id="resetPasswordSection" style="display: none;">
                                <div class="mb-3 w-100 text-center" style="position: relative;">
                                    <input type="password" class="form-control" id="yourPassword"
                                        placeholder="Enter New Password" required>
                                    <span hidden="hidden" class="field-icon toggle-password bi bi-eye-fill" id="icon"
                                        style="position: absolute; right: 12px; transform: translate(-40%, -60%); top: 60%; cursor: pointer;"></span>
                                </div>
                                <button type="button" class="btn btn-dark rounded-5 w-100 btn-lg"
                                    onclick="resetPassword()">Reset Password</button>
                            </div>

                            <script src="js/script.js"></script>

                            <div class="credits mt-5 text-center">
                                Designed by <a href="https://bootstrapmade.com/" class="text-dark">BootstrapMade</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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
    <script src="js/show-password.js"></script>

</body>

</html>