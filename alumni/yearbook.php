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
                        <a class="nav-link collapsed" href="#">
                            <i class="bi bi-people-fill"></i>
                            <span>Classmates</span>
                        </a>
                    </li><!-- End Classmates Nav -->

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

            <!-- Right side columns -->
            <div class="col-lg-9">

                <!-- Batch Members -->
                <div class="user" id="user">
                    <!-- Batch Members -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Batch <?= $year ?></h5>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <?php
                                $sql = "SELECT * FROM $table WHERE `year_graduated` = ?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("s", $year);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                if ($result->num_rows > 0) {
                                    $first = true;
                                    while ($row = $result->fetch_assoc()) {
                                        $middlenameInitial = substr($row['middlename'], 0, 1);
                                        $track_or_sec = ($_SESSION['user_cred']['type'] == "SHS") ? $row['track'] : "Section ".$row['section'];
                                ?>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?php echo $first ? 'active' : ''; ?>"
                                        id="<?php echo $track_or_sec . "-tab" ?>" data-bs-toggle="tab"
                                        data-bs-target="#<?php echo $track_or_sec ?>" type="button" role="tab"
                                        aria-controls="<?php echo $track_or_sec ?>"
                                        aria-selected="<?php echo $first ? 'true' : 'false'; ?>"><?php echo $track_or_sec ?>
                                    </button>
                                </li>

                                <?php
                                        $first = false;
                                    }
                                } else {
                                    echo "No record found.";
                                }
                                ?>
                            </ul>
                            <div class="tab-content pt-2" id="myTabContent">
                                <?php
                                // Reset the result pointer
                                $result->data_seek(0);

                                $first = true;
                                while ($row = $result->fetch_assoc()) {
                                    $middlenameInitial = substr($row['middlename'], 0, 1);
                                    $track_or_sec = ($_SESSION['user_cred']['type'] == "SHS") ? $row['track'] : $row['section'];
                                ?>

                                <div class="tab-pane fade <?php echo $first ? 'show active' : ''; ?>"
                                    id="<?php echo $track_or_sec ?>" role="tabpanel"
                                    aria-labelledby="<?php echo $track_or_sec . "-tab" ?>">

                                    <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch">
                                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                                            <div class="member-img">
                                                <img src="<?php echo ($row['profile_picture'] == null) ? "assets/img/user.png" :  $row['profile_picture'];  ?>"
                                                    class="img-fluid" alt="">
                                                <div class="social">
                                                    <a href="mailto:<?php echo $row['email']; ?>"><i
                                                            class="bi bi-envelope-fill"></i></a>
                                                    <a href="tel:<?php echo $row['phone_num']; ?>"><i
                                                            class="bi bi-telephone-fill"></i></a>
                                                    <a href=""><i class="bi bi-chat-dots-fill"></i></a>
                                                    <!-- <a href=""><i class="bi bi-pencil-square"></i></a> -->
                                                </div>
                                            </div>
                                            <div class="member-info">
                                                <h4><?php echo $row['firstname'] . " " . $middlenameInitial . ". " . $row['lastname']; ?>
                                                </h4>
                                                <span><?php echo "Section: " . $row['section']; ?></span>
                                                <span><?php echo "Profession: " . $row['profession']; ?></span>
                                                <span><?php echo "Address: " . $row['address']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $first = false;
                                } ?>
                            </div><!-- End Default Tabs -->
                        </div>
                    </div>
                    <?php
                    // Close the prepared statement and the database connection
                    $stmt->close();
                    $conn->close();
                    ?>


                </div>
                <!-- Batch members -->

            </div><!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->

<?php
include_once 'includes/footer.php';
?>