<?php
// include 'authentication.php';
include 'includes/header.php';
include 'includes/conn.php';

include "alert.php";
?>

<main id="main" class="main">

    <section class="section dashboard">
        <div class="row">

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
                        <a class="nav-link" href="#">
                            <i class="bi bi-chat-left-text-fill"></i>
                            <span>Chat-Messages</span>
                        </a>
                    </li><!-- End Messages Nav -->

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="events.php">
                            <i class="bi bi-calendar-week-fill"></i>
                            <span>Events</span>
                        </a>
                    </li><!-- End Events Page Nav -->

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="news-and-updates.php">
                            <i class="bi bi-newspaper"></i>
                            <span>News &amp; Updates</span>
                        </a>
                    </li><!-- End News & Updates Page Nav -->

                    <!-- <li class="nav-heading">Alumni</li> -->

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="pages-error-404.html">
                            <i class="bi bi-gift-fill"></i>
                            <span>Donation</span>
                        </a>
                    </li><!-- End Donation Page Nav -->
                </ul>

            </div><!-- End Left side columns -->

            <!-- Center columns -->
            <div class="col-lg-6">
                <div class="row">

                    <!-- Events Card -->
                    <div class="col-xxl-4 col-md-6">
                        <!-- Events -->
                        <div class="card event-card">
                            <img src="assets/img/undraw_Partying_re_at7f.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Alumni Homecoming</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary" style="flex: 0 0 80%;">Button 1</button>
                                    <button class="btn btn-secondary" style="flex: 0 0 20%;">Button 2</button>
                                </div>
                            </div>
                        </div><!-- End Events -->
                    </div>


                    <div class="col-xxl-4 col-md-6">
                        <!-- Events -->
                        <div class="card event-card">
                            <img src="assets/img/undraw_Events_re_98ue.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Alumni Homecoming</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <div class="d-grid gap-2 mx-auto">
                                    <button class="btn btn-primary" type="button">Join Event</button>
                                    <button class="btn btn-primary" type="button">Button</button>
                                </div>
                            </div>
                        </div><!-- End Events -->
                    </div>


                    <div class="col-xxl-4 col-xl-12">
                        <!-- Events -->
                        <div class="card event-card">
                            <img src="assets/img/undraw_special_event_4aj8.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Alumni Homecoming</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <div class="d-grid gap-2 mx-auto">
                                    <button class="btn btn-primary" type="button">Join Event</button>
                                    <button class="btn btn-primary" type="button">Button</button>
                                </div>
                            </div>
                        </div><!-- End Events -->
                    </div><!-- End Events Card -->

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><a href="#">#2457</a></th>
                                            <td>Brandon Jacob</td>
                                            <td><a href="#" class="text-primary">At praesentium minu</a></td>
                                            <td>$64</td>
                                            <td><span class="badge bg-success">Approved</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">#2147</a></th>
                                            <td>Bridie Kessler</td>
                                            <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a>
                                            </td>
                                            <td>$47</td>
                                            <td><span class="badge bg-warning">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">#2049</a></th>
                                            <td>Ashleigh Langosh</td>
                                            <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                                            <td>$147</td>
                                            <td><span class="badge bg-success">Approved</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">#2644</a></th>
                                            <td>Angus Grady</td>
                                            <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                                            <td>$67</td>
                                            <td><span class="badge bg-danger">Rejected</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">#2644</a></th>
                                            <td>Raheem Lehner</td>
                                            <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                            <td>$165</td>
                                            <td><span class="badge bg-success">Approved</span></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                    <!-- Top Selling -->
                    <div class="col-12">
                        <div class="card top-selling overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Top Selling <span>| Today</span></h5>

                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Preview</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Sold</th>
                                            <th scope="col">Revenue</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><a href="#"><img src="assets/img/product-1.jpg" alt=""></a>
                                            </th>
                                            <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas
                                                    nulla</a></td>
                                            <td>$64</td>
                                            <td class="fw-bold">124</td>
                                            <td>$5,828</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#"><img src="assets/img/product-2.jpg" alt=""></a>
                                            </th>
                                            <td><a href="#" class="text-primary fw-bold">Exercitationem similique
                                                    doloremque</a></td>
                                            <td>$46</td>
                                            <td class="fw-bold">98</td>
                                            <td>$4,508</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a>
                                            </th>
                                            <td><a href="#" class="text-primary fw-bold">Doloribus nisi
                                                    exercitationem</a></td>
                                            <td>$59</td>
                                            <td class="fw-bold">74</td>
                                            <td>$4,366</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#"><img src="assets/img/product-4.jpg" alt=""></a>
                                            </th>
                                            <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum
                                                    error</a></td>
                                            <td>$32</td>
                                            <td class="fw-bold">63</td>
                                            <td>$2,016</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#"><img src="assets/img/product-5.jpg" alt=""></a>
                                            </th>
                                            <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus
                                                    repellendus</a></td>
                                            <td>$79</td>
                                            <td class="fw-bold">41</td>
                                            <td>$3,239</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Top Selling -->

                </div>
            </div><!-- End Center columns -->

            <!-- Right side columns -->
            <div class="col-lg-3">
                <!-- Batch Members -->
                <div class="mb-5">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body pb-0">
                        <h5 class="card-title">Batch Members <small>(online)</small></h5>

                        <div class="members">
                            <div class="post-item clearfix">
                                <img src="assets/img/image.png" alt="Member profile">
                                <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/image.png" alt="Member profile">
                                <h4><a href="#">Quidem autem et impedit</a></h4>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/image.png" alt="Member profile">
                                <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/image.png" alt="Member profile">
                                <h4><a href="#">Laborum corporis quo dara net para</a></h4>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/image.png" alt="Member profile">
                                <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
                            </div>

                        </div><!-- End sidebar recent posts-->

                    </div>
                </div><!-- Batch members -->

                <!-- Donation Card -->
                <div class="card donate-card text-center">
                    <div class="card-body m-3">
                        <h5 class="card-title text-white">Help the Alma Mater</h5>
                        <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                        <p class="card-text">Support your alma mater: every donation helps create a brighter future
                            for
                            our school
                            and its students. Give back today and make a lasting impact!</p>

                        <div class="d-grid">
                            <a href="pages-error-404.html" class="btn mt-2">Donate Now</a>
                        </div>
                    </div>
                </div><!-- End Donation Card -->

            </div><!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->
<?php
include_once 'includes/footer.php';
?>