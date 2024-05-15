<?php
include 'authentication.php';
include 'includes/header.php';
include 'includes/conn.php';
include 'includes/account-setup.php';
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

            <!-- Center columns -->
            <div class="col-lg-6">
                <div class="row">

                    <!--Events outer Card -->
                    <div class="card event">
                        <div class="card-body">
                            <h5 class="card-title">Upcoming Events</h5>

                            <!-- Events Card -->
                            <div class="d-flex overflow-x-auto gap-2">
                                <?php
                                // Fetch events from the database
                                $sql = "SELECT * FROM `events` WHERE eventDate > CURDATE() ORDER BY eventDate";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($event = $result->fetch_assoc()) {
                                ?>
                                        <div class="col-12 col-md-6">
                                            <!-- Events -->
                                            <div class="card event-card position-relative">
                                                <img src="<?php echo $src_dir . $event['eventPicture']; ?>" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h4><span class="badge position-absolute top-0 end-0" style="background-color: #8a9a5b;"><?php echo date('M d', strtotime($event['eventDate'])); ?></span>
                                                    </h4>

                                                    <h5 class="card-title mt-3">
                                                        <?php echo $event['eventName']; ?></h5>
                                                    <p class="card-text"><?php echo $event['eventDescription']; ?></p>
                                                    <div class="d-flex justify-content-between gap-2">
                                                        <button class="btn w-100"><i class="bi bi-bookmark-star"></i>
                                                            Join
                                                            Event</button>
                                                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ViewEventModal"><i class="bi bi-eye-fill"></i></button>
                                                    </div>
                                                </div>
                                            </div><!-- End Events -->
                                        </div>
                                <?php
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>

                            </div>
                        </div><!-- End Events outer Card -->
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="ViewEventModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Understood</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Donation Card -->
                    <div class="card donate-card text-center">
                        <div class="card-body m-3">
                            <h5 class="card-title">Help the Alma Mater</h5>
                            <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                            <p class="card-text">Support your alma mater: every donation helps create a
                                brighter
                                future
                                for
                                our school
                                and its students. Give back today and make a lasting impact!</p>

                            <div class="d-grid gap-2 col-4 mx-auto">
                                <a href="pages-error-404.html" class="btn mt-2">Donate Now</a>
                            </div>
                        </div>
                    </div><!-- End Donation Card -->

                </div>
            </div><!-- End Center columns -->

            <!-- Right side columns -->
            <div class="col-lg-3">
                <!-- Batch Members -->
                <div class="px-3 mb-5">
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
                            <?php
                            // Fetch members from the database
                            $my_id = $_SESSION['user_cred']['alumni_id'];

                            // Escape the alumni_id value
                            $my_id_escaped = mysqli_real_escape_string($conn, $my_id);

                            $sql = "SELECT *, UPPER(LEFT(middlename, 1)) AS initialM FROM `$table` WHERE `is_online` = 1 AND `alumni_id` != '$my_id_escaped'";
                            $result = $conn->query($sql);

                            if (!$result) {
                                die("Query failed: " . mysqli_error($conn));
                            }

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <div class="post-item clearfix">
                                        <img src="<?php echo $row['profile_picture']; ?>" alt="Member profile">
                                        <h4><a href="#"><?php echo $row['firstname'] . " " . $row['initialM'] . ". " . $row['lastname']; ?></a>
                                        </h4>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "No Active Members";
                            }
                            ?>


                        </div><!-- End sidebar recent posts-->

                    </div>
                </div><!-- Batch members -->

            </div><!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->
<?php
include_once 'includes/footer.php';
?>