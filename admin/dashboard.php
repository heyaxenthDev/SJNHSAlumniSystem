<?php
include 'authentication.php';
include_once 'includes/header.php';
include_once 'includes/sidebar.php';
include "includes/conn.php";

include "alert.php";

?>
<script src="js/sweetalert2.all.min.js"></script>
<?php
if (isset($_SESSION['logged'])) {
?>
<script type="text/javascript">
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

Toast.fire({
    background: '#53a653',
    color: '#fff',
    icon: '<?php echo $_SESSION['logged_icon']; ?>',
    title: '<?php echo $_SESSION['logged']; ?>'
});
</script>
<?php
    unset($_SESSION['logged']);
}
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <?php
                    $sql = "SELECT COUNT(`id`) AS total_alumni FROM `alumni_jhs`";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $totalAlumni = $row['total_alumni'];

                    $sql = "SELECT COUNT(`id`) AS new_alumni FROM `alumni_jhs` WHERE `date_created` >= DATE_SUB(NOW(), INTERVAL 1 WEEK)";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $newAlumni = $row['new_alumni'];

                    // Calculate the increase percentage
                    $increasePercentage = ($newAlumni / $totalAlumni) * 100;

                    ?>

                    <!-- JHS Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card jhs-card">
                            <div class="card-body">
                                <h5 class="card-title">Junior High Alumni</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo $totalAlumni; ?></h6>
                                        <span
                                            class="text-success small pt-1 fw-bold"><?php echo number_format($increasePercentage, 2); ?>%</span>
                                        <span class="text-muted small pt-2 ps-1">increase</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End JHS Card -->

                    <?php
                    $sql = "SELECT COUNT(`id`) AS total_alumni FROM `alumni_shs`";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $totalAlumni = $row['total_alumni'];


                    $sql = "SELECT COUNT(`id`) AS new_alumni FROM `alumni_shs` WHERE `date_created` >= DATE_SUB(NOW(), INTERVAL 1 WEEK)";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $newAlumni = $row['new_alumni'];

                    // Calculate the increase percentage
                    $increasePercentage = ($newAlumni / $totalAlumni) * 100;

                    ?>

                    <!-- SHS Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card shs-card">
                            <div class="card-body">
                                <h5 class="card-title">Senior High Alumni</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo $totalAlumni; ?></h6>
                                        <span
                                            class="text-success small pt-1 fw-bold"><?php echo number_format($increasePercentage, 2); ?>%</span>
                                        <span class="text-muted small pt-2 ps-1">increase</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End SHS Card -->


                    <!-- Active Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card active-card">
                            <div class="card-body">
                                <h5 class="card-title">Active Members</h5>
                                <?php
                                // Assuming you have a database connection established and stored in $conn

                                // Query to count online alumni from both tables
                                $sql = "SELECT COUNT(*) AS total_online FROM (
                                            SELECT * FROM alumni_jhs WHERE is_online = 1
                                            UNION
                                            SELECT * FROM alumni_shs WHERE is_online = 1
                                        ) AS online_alumni";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // Fetch total online alumni count
                                    $row = mysqli_fetch_assoc($result);
                                    $total_online = $row['total_online'];
                                ?>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person-check"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo $total_online ?></h6>
                                        <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                            class="text-muted small pt-2 ps-1">decrease</span> -->

                                    </div>
                                </div>
                                <?php
                                } else {
                                    echo "0 results";
                                }

                                // Close the database connection
                                // mysqli_close($conn);
                                ?>

                            </div>
                        </div>

                    </div><!-- End Active Card -->

                    <!-- Current Online Members -->
                    <div class="col-12">
                        <div class="card batch-list overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title"><span class="badge bg-success text-white">Online</span>
                                    Members
                                </h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Status</th>
                                            <th scope="col">Member Name</th>
                                            <th scope="col">Batch Year</th>
                                            <th scope="col">School Type</th>
                                            <th scope="col">Section/Track</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Assuming you have already connected to your database

                                        // SQL query to fetch online alumni from both tables
                                        $sql = "SELECT * FROM alumni_jhs WHERE is_online = 1
                                                UNION
                                                SELECT * FROM alumni_shs WHERE is_online = 1";

                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            // Output data of each row
                                            while ($row = mysqli_fetch_assoc($result)) {

                                                echo "<tr>";
                                                echo "<th scope='row'><span class='badge bg-success text-success rounded-5'>.</span></th>";
                                                echo "<td>" . $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'] . "</td>";
                                                echo "<td>" . $row['year_graduated'] . "</td>";
                                                echo "<td>". ($row['track'] == "JHS" ? "JHS" : "SHS") ."</td>"; // Replace 'School Name' with the actual school name field from your database
                                                echo "<td>" . ($row['track'] == "JHS" ? $row['section'] : $row['track']) . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='5'>No alumni are currently online</td></tr>";
                                        }

                                        // Close the database connection
                                        // mysqli_close($conn);
                                        ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div><!-- End Current Online Members -->

                    <!-- Batch List -->
                    <div class="col-12">
                        <div class="card batch-list overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Batch List</h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Batch Year</th>
                                            <th scope="col">School Type</th>
                                            <th scope="col"># of Members</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $batchNumber = 1;
                                        // Fetch data from alumni_jhs
                                        $sql = "SELECT `year_graduated` AS batch_year, COUNT(`id`) AS num_members FROM `alumni_jhs` GROUP BY `year_graduated`";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<th scope='row'><a href='#'>$batchNumber</a></th>";
                                            echo "<td>{$row['batch_year']}</td>";
                                            echo "<td>Junior High</td>";
                                            echo "<td>{$row['num_members']}</td>";
                                            echo "<td><a href='alumni-jhs-view.php?batch={$row['batch_year']}' class='btn btn-sm btn-success text-white'>View List</a></td>";
                                            echo "</tr>";
                                            $batchNumber++;
                                        }

                                        // Fetch data from alumni_shs
                                        $sql = "SELECT `year_graduated` AS batch_year, COUNT(`id`) AS num_members FROM `alumni_shs` GROUP BY `year_graduated`";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<th scope='row'><a href='#'>$batchNumber</a></th>";
                                            echo "<td>{$row['batch_year']}</td>";
                                            echo "<td>Senior High</td>";
                                            echo "<td>{$row['num_members']}</td>";
                                            echo "<td><a href='alumni-shs-view.php?batch={$row['batch_year']}' class='btn btn-sm btn-success text-white'>View List</a></td>";
                                            echo "</tr>";
                                            $batchNumber++;
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div><!-- End Batch List -->


                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Upcoming Events -->
                <div class="card">
                    <!-- <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div> -->

                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-calendar-week"></i> Upcoming Events</h5>

                        <div class="events">

                            <?php
                            // Fetch ongoing and upcoming events from the database
                            $sql = "SELECT * FROM `events` WHERE `eventStatus` IN (1, 2)";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                echo '<div class="events">';
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '
                                        <div class="post-item clearfix">
                                            <img src="' . $row['eventPicture'] . '" alt="">
                                            <h4>' . $row['eventName'] . '</h4>
                                            <p>' . $row['eventDescription'] . '</p>
                                        </div><!-- End events item-->';
                                }
                                echo '</div>';
                            } else {
                                echo 'No events found';
                            }
                            ?>

                        </div>

                    </div>
                </div><!-- End Upcoming Events -->

                <!-- News & Updates -->
                <div class="card">
                    <!-- <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div> -->

                    <div class="card-body pb-0">
                        <h5 class="card-title"><i class="bi bi-newspaper"></i> News &amp; Updates</h5>

                        <div class="news">
                            <?php

                            // Fetch news items from the database
                            $sql = "SELECT * FROM `news` WHERE `newsStatus` = 1";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                echo '<div class="news">';
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '
                                        <div class="post-item clearfix">
                                            <img src="' . $row['newsPicture'] . '" alt="">
                                            <h4><a href="#">' . $row['title'] . '</a></h4>
                                            <p>' . $row['content'] . '</p>
                                        </div><!-- End news item-->';
                                }
                                echo '</div>';
                            } else {
                                echo 'No news found';
                            }

                            // Close the database connection
                            mysqli_close($conn);
                            ?>
                        </div><!-- End sidebar recent posts-->

                    </div>
                </div><!-- End News & Updates -->

            </div><!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->
<?php
include_once 'includes/footer.php';
?>