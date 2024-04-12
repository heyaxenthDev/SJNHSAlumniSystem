<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin - SJNHS Alumni Website</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.ico" rel="icon">
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
    <link href="assets/css/chat-style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a href="dashboard.php" class="logo d-flex align-items-center">
                <img src="assets/img/favicon.png" alt="">
                <span class="d-none d-lg-block">SJNHS</span>
            </a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Chat History Column -->
            <div class="col-md-3">
                <div class="sidebar">

                    <div class="z-1 sticky-top pb-2" style="background-color: #fff;">
                        <div class="row">
                            <div class="col-md-8 mb-2">
                                <h4>Chat Messages</h4>
                            </div>
                            <div class="col-md-4 text-head text-end">
                                <a href>
                                    <i class=" bx bxs-message-square-add" style="color: #013220;"></i>
                                </a>
                            </div>
                        </div>
                        <input type="text" class="form-control mb-3" placeholder="Search...">
                    </div>

                    <ul class="chat-list">
                        <li class="chat-item active">
                            <img src="assets/img/user.png" alt="Profile Picture">
                            <div class="details">
                                <span>John Doe</span><br>
                                <small>Lorem ipsum dolor sit amet.</small>
                            </div>
                        </li>

                        <li class="chat-item ">
                            <img src="assets/img/user.png" alt="Profile Picture">
                            <div class="details">
                                <span>John Doe</span><br>
                                <small>Lorem ipsum dolor sit amet.</small>
                            </div>
                        </li>

                        <li class="chat-item ">
                            <img src="assets/img/user.png" alt="Profile Picture">
                            <div class="details">
                                <span>John Doe</span><br>
                                <small>Lorem ipsum dolor sit amet.</small>
                            </div>
                        </li>

                        <li class="chat-item ">
                            <img src="assets/img/user.png" alt="Profile Picture">
                            <div class="details">
                                <span>John Doe</span><br>
                                <small>Lorem ipsum dolor sit amet.</small>
                            </div>
                        </li>
                        <li class="chat-item ">
                            <img src="assets/img/user.png" alt="Profile Picture">
                            <div class="details">
                                <span>John Doe</span><br>
                                <small>Lorem ipsum dolor sit amet.</small>
                            </div>
                        </li>

                        <li class="chat-item ">
                            <img src="assets/img/user.png" alt="Profile Picture">
                            <div class="details">
                                <span>John Doe</span><br>
                                <small>Lorem ipsum dolor sit amet.</small>
                            </div>
                        </li>

                        <li class="chat-item ">
                            <img src="assets/img/user.png" alt="Profile Picture">
                            <div class="details">
                                <span>John Doe</span><br>
                                <small>Lorem ipsum dolor sit amet.</small>
                            </div>
                        </li>

                        <li class="chat-item ">
                            <img src="assets/img/user.png" alt="Profile Picture">
                            <div class="details">
                                <span>John Doe</span><br>
                                <small>Lorem ipsum dolor sit amet.</small>
                            </div>
                        </li>

                        <!-- Add more chat history items as needed -->
                    </ul>

                </div>
            </div>

            <!-- Chat Area Column -->
            <div class="col-md-6">
                <div class="chat-area">
                    <div class="header sticky-top row align-items-center">
                        <div class="col-sm-8 col-8">
                            <div class="d-flex align-items-center">
                                <img src="assets/img/user.png" alt="Profile Picture"
                                    style="width: 50px; height: 50px; border-radius: 50%;">
                                <div class="details ms-3">
                                    <span>John Doe</span><br>
                                    <small class="text-muted">Last seen 5 minutes ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-4 info-icon text-end px-4">
                            <a href=""><i class="ri ri-information-fill"></i></a>
                        </div>
                    </div>


                    <div class="chat-box">
                        <div class="chat outgoing">
                            <div class="details">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="chat incoming">
                            <img src="assets/img/user.png" alt="Profile Picture">
                            <div class="details">
                                <p>Nulla vitae elit libero, a pharetra augue.</p>
                            </div>
                        </div>
                        <div class="chat outgoing">
                            <div class="details">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="chat incoming">
                            <img src="assets/img/user.png" alt="Profile Picture">
                            <div class="details">
                                <p>Nulla vitae elit libero, a pharetra augue.</p>
                            </div>
                        </div>
                        <div class="chat outgoing">
                            <div class="details">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="chat incoming">
                            <img src="assets/img/user.png" alt="Profile Picture">
                            <div class="details">
                                <p>Nulla vitae elit libero, a pharetra augue.</p>
                            </div>
                        </div>
                        <div class="chat outgoing">
                            <div class="details">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="chat incoming">
                            <img src="assets/img/user.png" alt="Profile Picture">
                            <div class="details">
                                <p>Nulla vitae elit libero, a pharetra augue.</p>
                            </div>
                        </div>
                        <!-- Add more chat messages as needed -->
                    </div>
                    <div class="typing-area sticky-bottom">
                        <input type="text" placeholder="Type a message...">
                        <button><i class="ri ri-send-plane-fill"></i></button>
                    </div>
                </div>
            </div>

            <!-- User Information Column (Collapsable) -->
            <div class="col-md-3">
                <div class="user-info mt-5 pt-2 d-flex flex-column align-items-center justify-content-center">
                    <img src="assets/img/user.png" alt="user-pic">
                    <h4 class="mt-2">Chat Username</h4>
                    <small class="text-muted">Active status</small>

                    <ul class="list-inline d-inline-flex gap-4 mt-5 list">
                        <li class="list-inline-item list-group-item">
                            <i class="ri ri-account-pin-circle-fill"></i>
                        </li>
                        <li class="list-inline-item list-group-item">
                            <i class="bi bi-envelope"></i>
                        </li>
                        <li class="list-inline-item list-group-item">
                            <i class="bi bi-phone"></i>
                        </li>
                    </ul>
                </div>
            </div>


        </div>
    </div>


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
    <script src="assets/js/main.js"></script>

</body>

</html>