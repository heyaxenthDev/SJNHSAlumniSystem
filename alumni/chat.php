<?php
include 'includes/conn.php';
include 'includes/header.php'
?>
<main class="main" id="main">
    <section class="section">
        <div class="row dashboard">
            <!-- Left side columns -->
            <div class="col-lg-3">

                <ul class="sidebar-nav " id="sidebar-nav">
                    <!-- Profile Info -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="user-profile.php">
                            <div class="row">
                                <div class="col-auto user-picture">
                                    <img src="assets/img/user.png" alt="User Picture" class="img-fluid">
                                    <div class="user-name">John Doe</div>
                                </div>
                            </div>
                        </a>
                    </li><!-- End Profile Info -->

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#">
                            <i class="bi bi-people-fill"></i>
                            <span>Batch Members</span>
                        </a>
                    </li><!-- End Batch Members Nav -->

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#">
                            <i class="bi bi-book-fill"></i>
                            <span>Year Book</span>
                        </a>
                    </li><!-- End Batch Members Nav -->

                    <li class="nav-item">
                        <a class="nav-link" href="chat-messages.php">
                            <i class="bi bi-chat-left-text-fill"></i>
                            <span>Chat-Messages</span>
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


            <div class="col-lg-3">
                <!-- Default Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- <h5 class="card-title">Default Card</h5> -->
                        <div class="input-group mb-3 mt-4">
                            <input type="text" class="form-control" placeholder="Search by name" aria-label="Search"
                                aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                                    class="bi bi-search"></i></button>
                        </div>
                        <!-- List group with Advanced Contents -->
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/user.png" class="rounded-circle me-3" alt="Profile Picture"
                                            style="width: 50px; height: 50px;">
                                        <div>
                                            <h5 class="mb-1">Juan Dela Cruz</h5>
                                            <small class="text-muted">And some muted small print.</small>
                                        </div>
                                    </div>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/user.png" class="rounded-circle me-3" alt="Profile Picture"
                                            style="width: 50px; height: 50px;">
                                        <div>
                                            <h5 class="mb-1">Juan Dela Cruz</h5>
                                            <small class="text-muted">And some muted small print.</small>
                                        </div>
                                    </div>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/user.png" class="rounded-circle me-3" alt="Profile Picture"
                                            style="width: 50px; height: 50px;">
                                        <div>
                                            <h5 class="mb-1">Juan Dela Cruz</h5>
                                            <small class="text-muted">And some muted small print.</small>
                                        </div>
                                    </div>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                            </a>
                        </div><!-- End List group Advanced Content -->

                    </div>
                </div><!-- End Default Card -->
            </div>
            <div class="col-lg-6">
                <!-- Card with header and footer -->
                <div class="card">
                    <div class="card-header chat">
                        <div class="d-flex align-items-center">
                            <img src="assets/img/user.png" class="rounded-circle me-2" alt="Profile Picture"
                                style="width: 40px; height: 40px;">
                            <div>
                                <h5 class="card-title mb-0">Juan Dela Cruz</h5>
                                <small>Online</small>
                            </div>
                        </div>
                    </div>

                    <div class="card-body chat-box">
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
                    <div class="card-footer">
                        <textarea name="" id="" cols="30" rows="2" class="form-control"></textarea>
                        <div class="d-flex mt-2 align-items-center justify-content-between">
                            <div class="extra-button">
                                <button class="btn"><i class="bi bi-image"></i></button>
                                <button class="btn"><i class="bi bi-paperclip"></i></button>
                            </div>
                            <button class="btn btn-sm text-white" style="background-color: #013220;">Send <i
                                    class="bi bi-send"></i></button>
                        </div>

                    </div>
                </div><!-- End Card with header and footer -->
            </div>
        </div>
    </section>
</main>
<?php
include 'includes/footer.php';
?>