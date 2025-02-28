<?php
include 'authentication.php';
include 'includes/header.php';
include 'includes/conn.php';

include "alert.php";
?>

<main id="main" class="main">

    <section class="section profile dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-3">

                <ul class="sidebar-nav " id="sidebar-nav">
                    <!-- Profile Info -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="user-profile.php">
                            <div class="row">
                                <div class="col-auto user-picture">
                                    <img src="<?= $picture ?>" alt="User Picture" class="img-fluid">
                                    <div class="user-name"><?= $name ?></div>
                                </div>
                            </div>
                        </a>
                    </li><!-- End Profile Info -->

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="feed.php">
                            <i class="bi bi-newspaper"></i>
                            <span>Feed</span>
                        </a>
                    </li><!-- End Feed Nav -->

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="yearbook.php">
                            <i class="bi bi-book-fill"></i>
                            <span>Year Book</span>
                        </a>
                    </li><!-- End Year Book Nav -->

                    <li class="nav-item">
                        <a class="nav-link" href="chat.php">
                            <i class="bi bi-chat-left-text-fill"></i>
                            <span>Chat</span>
                        </a>
                    </li><!-- End Messages Nav -->

                    <!-- <li class="nav-item">
                        <a class="nav-link collapsed" href="events.php">
                            <i class="bi bi-calendar-week-fill"></i>
                            <span>Events</span>
                        </a>
                    </li> -->
                    <!-- End Events Page Nav -->

                    <!-- <li class="nav-item">
                        <a class="nav-link collapsed" href="news-and-updates.php">
                            <i class="bi bi-newspaper"></i>
                            <span>News &amp; Updates</span>
                        </a>
                    </li> -->
                    <!-- End News & Updates Page Nav -->

                    <!-- <li class="nav-heading">Alumni</li> -->

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="pages-error-404.html">
                            <i class="bi bi-gift-fill"></i>
                            <span>Donation</span>
                        </a>
                    </li><!-- End Donation Page Nav -->
                </ul>
            </div><!-- End Left side columns -->

            <!-- Right columns -->
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-xl-4">

                        <div class="card">
                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                                <img src="assets/img/user.png" alt="Profile" class="rounded-circle">
                                <h2>Kevin Anderson</h2>
                                <h3>Web Designer</h3>
                                <div class="social-links mt-2">
                                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-8">

                        <div class="card">
                            <div class="card-body pt-3">
                                <!-- Bordered Tabs -->
                                <ul class="nav nav-tabs nav-tabs-bordered">

                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target="#profile-overview">Overview</button>
                                    </li>

                                </ul>
                                <div class="tab-content pt-2">

                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                        <h5 class="card-title">About</h5>
                                        <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam
                                            maiores
                                            cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt
                                            iure
                                            rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe
                                            at
                                            unde.</p>

                                        <h5 class="card-title">Profile Details</h5>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                            <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Company</div>
                                            <div class="col-lg-9 col-md-8">Lueilwitz, Wisoky and Leuschke</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Job</div>
                                            <div class="col-lg-9 col-md-8">Web Designer</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Country</div>
                                            <div class="col-lg-9 col-md-8">USA</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Address</div>
                                            <div class="col-lg-9 col-md-8">A108 Adam Street, New York, NY 535022</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Phone</div>
                                            <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Email</div>
                                            <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                                        </div>

                                    </div>

                                </div><!-- End Bordered Tabs -->

                            </div>
                        </div>

                    </div>
                </div>
            </div><!-- End Right columns -->

        </div>
    </section>

</main><!-- End #main -->
<?php
include_once 'includes/footer.php';
?>