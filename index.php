<?php
session_start();
include 'includes/conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SJNHS Alumni Website</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>


<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="index.php">SJNHS</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.php" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#events">Events</a></li>
                    <li><a class="nav-link scrollto " href="#alumni">Alumni</a></li>
                    <li><a class="nav-link scrollto" href="#news">News</a></li>
                    <li><a class="nav-link scrollto" href="#donation">Donate</a></li>
                    <li><a class="nav-link scrollto" href="#" data-bs-toggle="modal" data-bs-target="#adminlogin"><i
                                class="bi bi-lock-fill"></i></a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <?php
    include "alert.php";
    ?>
    <!-- Start Admin Login Modal-->
    <div class="modal fade" id="adminlogin" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: #013220;"><img src="assets/img/favicon-32x32.png" alt="">
                        STA. JUSTA NATIONAL HIGH SCHOOL</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-5">
                    <form class="row g-3" method="POST" action="login-code.php" autocomplete="off">
                        <h5 class=" card-title te xt-center pb-3 fs-4 fw-semibold" style="color: #013220;">
                            Administrative Log in
                        </h5>
                        <div class="col-12">
                            <label for="yourUsername" class="form-label"><i class="bx bxs-user"></i> Username</label>
                            <input type="text" name="username" class="form-control" id="yourUsername" required>
                        </div>

                        <div class="col-12 mb-2 position-relative">
                            <label for="yourPassword" class="form-label"><i class="bx bxs-lock-alt"></i>
                                Password</label>
                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                            <span hidden="hidden" class="field-icon toggle-password bi bi-eye-fill" id="icon"
                                style="position: absolute; right: 17px; transform: translate(0, -50%); top: 72%; cursor: pointer;"></span>
                        </div>
                        <script src="js/show-password.js"></script>

                        <div class="col-12">
                            <button class="btn rounded-5 w-100 text-white btn-lg" type="submit"
                                style="background-color: #013220;" name="adminLogin">Login</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div><!-- End Admin Login Modal-->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <div class="row">
                <div class="col-xl-6">
                    <h1>STA. JUSTA NATIONAL HIGH SCHOOL</h1>
                    <h2>Alumni Yearbook and Directory Website</h2>
                    <a href="select-user.html" class="btn-get-started scrollto">Alumni Log in</a>
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Happy Clients</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext"></i>
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Projects</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-headset"></i>
                            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Hours Of Support</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-people"></i>
                            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Hard Workers</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="container" data-aos="fade-up">

                <div class="row no-gutters">
                    <div class="content col-xl-5 d-flex justify-content-center">
                        <div class="content">
                            <img src="assets/img/SJNHS-logo.png" alt="">
                        </div>
                    </div>
                    <div class="col-xl-7 d-flex align-items-stretch">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-md icon-box" data-aos="fade-up" data-aos-delay="100">
                                    <h1>About Us</h1>
                                    <p>This is the Official page of Sta. Justa National High
                                        School.
                                        Announcements,updates and ot Justa Junior High School was changed to Sta. The
                                        Sta. No. 6655.
                                        in 1975, pursuant to the Presidential Decree No. 557, entitled declaring all
                                        Barrios in the Philippines as Barangay, The Sta. Justa Barangay High School
                                        until it was converted to Sta. Justa National HIgh School is previously
                                        squatting in Sta. Justa Elementary School. <br><br>However, through the combined
                                        efforts
                                        of of the Parents-Teachers Association (PTA), and other civic spirited citizens,
                                        a 1.5563 hectare lot was purchased. On June 10, 1987, by virtue of Executive
                                        Order No. 189
                                        issued by the President of the Republic, the barangay high school was converted
                                        into a national high school under the direct supervision of the Schools Division
                                        Superintendent. The same was also provided for under Republic Act. On April 1,
                                        1995, the school achieved its full nationalization, thereby providing the
                                        community with quality and productive secondary education consistent with the
                                        Secondary Education Development Program (SDEP) of the Department of Education
                                        (DepEd).</p>
                                </div>
                            </div>
                        </div><!-- End .content-->
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Event Section ======= -->
        <section id="events" class="events">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Upcoming Events</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea.</p>
                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        <?php
                        // Fetch events from the database
                        $sql = "SELECT * FROM `events` WHERE eventDate > CURDATE() ORDER BY eventDate";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($event = $result->fetch_assoc()) {
                        ?>
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="event-item">
                                    <img src="<?php echo "admin/" . $event['eventPicture']; ?>" class="img-fluid"
                                        alt="">
                                    <h3><?php echo $event['eventName']; ?></h3>
                                    <h4><?php echo date('M d', strtotime($event['eventDate'])); ?></h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        <?php echo $event['eventDescription']; ?>
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div><!-- End event item -->
                        <?php
                            }
                        } else {
                            echo "No Events Posted";
                        }
                        ?>


                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Events Section -->

        <!-- ======= Alumni Directory Section ======= -->
        <section id="alumni" class="alumni section-bg ">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Alumni Directory</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea.</p>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <a href="alumni-login.php?Type=JHS">
                            <div class="icon-box">
                                <i class="bi bi-card-checklist"></i>
                                <h4>Junior High</h4>
                                <p class="text-white">Voluptatum deleniti atque
                                    corrupti quos dolores et quas
                                    molestias excepturi sint
                                    occaecati cupiditate non
                                    provident</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 mt-4 mt-md-0">
                        <a href="alumni-login.php?Type=SHS">
                            <div class="icon-box">
                                <i class="bi bi-briefcase"></i>
                                <h4>Senior High</h4>
                                <p class="text-white">Minim veniam, quis nostrud
                                    exercitation ullamco laboris
                                    nisi ut aliquip ex ea commodo
                                    consequat tarad limino ata</p>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </section><!-- End Alumni Directory Section -->

        <!-- ======= News&update Section ======= -->
        <section id="news" class="news">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>News &amp; Updates</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea.</p>
                </div>

                <ul class="nav nav-news row d-flex">
                    <?php
                    $sql = "SELECT *, ROW_NUMBER() OVER (ORDER BY id) as counts FROM `news` WHERE `newsStatus` = 1 LIMIT 4";
                    $news = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($news) > 0) {
                        while ($row = mysqli_fetch_assoc($news)) {
                    ?>
                    <li class="nav-item col-3">
                        <a class="nav-link <?php if ($row['counts'] == 1) echo 'active show'; ?>" data-bs-toggle="tab"
                            data-bs-target="#tab-<?php echo $row['counts']; ?>">
                            <i class="ri ri-pushpin-line"></i>
                            <h4 class="d-none d-lg-block"><?php echo $row['title']; ?></h4>
                        </a>
                    </li>
                    <?php
                        }
                    }
                    ?>
                </ul>

                <div class="tab-content">
                    <?php
                    mysqli_data_seek($news, 0); // Reset pointer to the beginning
                    while ($row = mysqli_fetch_assoc($news)) {
                    ?>
                    <div class="tab-pane <?php if ($row['counts'] == 1) echo 'active show'; ?>"
                        id="tab-<?php echo $row['counts']; ?>">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up"
                                data-aos-delay="100">
                                <h3><?php echo $row['title']; ?></h3>
                                <p class="fst-italic">
                                    <?php echo $row['content']; ?>
                                </p>
                                <!-- Add your content here -->

                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up"
                                data-aos-delay="200">
                                <img src="<?php echo "admin/" . $row['newsPicture']; ?>" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </section><!-- End News&update Section -->

        <!-- ======= Donation Section ======= -->
        <section id="donation" class="">
            <div class="container p-5 rounded-5" data-aos="fade-up" style="background-color: #FBF719;">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <p class="text-dark fw-medium">Celebrate the spirit of giving back and empower future
                            generations through
                            Alumni Donations.
                            Your generosity fuels scholarships, advances campus initiatives, and enhances academic
                            programs. Join hands with fellow alumni in shaping a brighter future for our alma mater.
                            Every contribution makes a profound impact, fostering excellence and opportunity for
                            generations to come. Together, let's continue to build upon the legacy of success and create
                            lasting change.</p>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="d-grid gap-2 col-6 mx-auto mt-4">
                            <a class=" btn rounded-5 text-white btn-lg" href="pages-error-404.html"
                                style="background-color: #013220;">Donate</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>SJNHS</h3>
                        <p>
                            Sta. Justa, <br>
                            Tibiao, Antique 5707<br>
                            Philippines <br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Alumni</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Related Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#events">Events</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#news">News &amp; Updates</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Donate</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#adminlogin">Admin</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Join Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>SJNHS - Alumni Yearbook & Directory System</span></strong>. All
                    Rights Reserved
                </div>
                <div class="credits">
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
            <div class="social-links text-center text-md-end pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>