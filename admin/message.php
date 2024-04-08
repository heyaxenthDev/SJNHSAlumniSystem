<?php
include 'authentication.php';
include_once 'includes/header.php';
include_once 'includes/conn.php';

// include_once 'includes/sidebar.php';
include "alert.php";
?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="dashboard.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#faculty-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person-badge"></i><span>Faculty Directory</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="faculty-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="juniorhs-faculty.php">
                        <i class="bi bi-circle"></i><span>Junior High</span>
                    </a>
                </li>
                <li>
                    <a href="seniorhs-faculty.php">
                        <i class="bi bi-circle"></i><span>Senior High</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Faculty Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="events.php">
                <i class="bi bi-calendar-week"></i>
                <span>Events</span>
            </a>
        </li><!-- End Events Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="news-and-updates.php">
                <i class="bi bi-newspaper"></i>
                <span>News &amp; Updates</span>
            </a>
        </li><!-- End News & Updates Page Nav -->

        <li class="nav-heading">Alumni</li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#alumni-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>Alumni Yearbook</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="alumni-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="juniorhs-alumni.php">
                        <i class="bi bi-circle"></i><span>Junior High</span>
                    </a>
                </li>
                <li>
                    <a href="seniorhs-alumni.php">
                        <i class="bi bi-circle"></i><span>Senior High</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Alumni Nav -->

        <li class="nav-item">
            <a class="nav-link " data-bs-target="#comms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-envelope"></i><span>Communications</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="comms-nav" class="nav-content  " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="email.php">
                        <i class="bi bi-circle"></i><span>Email</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="active">
                        <i class="bi bi-circle"></i><span>Message</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Communications Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-error-404.html">
                <i class="bi bi-gift"></i>
                <span>Donation</span>
            </a>
        </li><!-- End Doantion Page Nav -->
    </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

    <!-- <div class="pagetitle">
        <h1>Message</h1>
    </div> -->
    <!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-3 mt-3">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h5 class="message-title">Messages</h5>
                            </div>
                            <div class="col-4 text-end message">
                                <a href="">
                                    <i class="bi bi-plus-circle-fill" style="color: #013220;"></i>
                                </a>
                            </div>
                        </div>
                        <hr>

                        <form class=" d-flex mb-3 mt-2">
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder="Search messages"
                                    aria-label="Search" id="searchInput">
                            </div>
                        </form>

                        <!-- Chat History -->
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Juan Dela Cruz</h5>
                                    <small>3 days ago</small>
                                </div>
                                <small>And some small print.</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Pedro Santa Cruz</h5>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                                <small class="text-muted">And some muted small print.</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Maria Clara</h5>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                                <small class="text-muted">And some muted small print.</small>
                            </a>
                        </div><!-- End Chat History -->

                    </div>

                    <div class="col-6 mt-3">
                        <div class="chat-box">
                            <div class="message-title p-3">Juan Dela Cruz</div>
                            <hr>
                            <div class="card-body">
                                <!-- Chat messages go here -->
                                <div class="message-bubble other-message mt-3 float-start">Ut in ea error laudantium
                                    quas omnis
                                    officia.
                                </div>
                                <div class="message-bubble my-message float-end text-white">Corrupti inventore
                                    consequatur
                                    nisi
                                    necessitatibus modi consequuntur soluta id.</div>
                            </div>
                            <div class="">
                                <div class="input-group">
                                    <textarea class="form-control message-input"
                                        placeholder="Type your message"></textarea>
                                    <button class="btn text-white" style="background-color: #013220;"><i
                                            class="bi bi-telegram"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 mt-3">
                        <!-- Online Friends here -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php
include_once 'includes/footer.php';
?>