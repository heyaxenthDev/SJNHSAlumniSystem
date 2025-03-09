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

                </ul>

            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-9">
                <!-- Batch Members -->
                <div class="user" id="user">
                    <!-- Batch Members -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Batch <?= htmlspecialchars($year) ?></h5>
                            <div class="mb-3">
                                <!-- <label for="trackOrSectionTabs" class="form-label">Select Track/Section:</label> -->

                                <!-- Track/Section Tabs -->
                                <ul class="nav nav-tabs d-flex" id="trackOrSectionTabs" role="tablist">
                                    <!-- Tabs will be dynamically inserted here -->
                                    <?php
                        $column = ($_SESSION['user_cred']['type'] == "SHS") ? "track" : "section";
                        $sql = "SELECT DISTINCT `$column` FROM $table WHERE `year_graduated` = ? AND `$column` IS NOT NULL";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $year);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            $isFirst = true;
                            while ($row = $result->fetch_assoc()) {
                                $track_or_sec = ($_SESSION['user_cred']['type'] == "SHS") ? $row['track'] : $row['section'];
                                $activeClass = $isFirst ? ' active' : '';
                                echo "<li class=\"nav-item flex-fill\" role=\"presentation\">
                                        <button class=\"nav-link w-100$activeClass\" id=\"$track_or_sec-tab\" data-bs-toggle=\"tab\"
                                        data-bs-target=\"#$track_or_sec\" type=\"button\" role=\"tab\" aria-controls=\"$track_or_sec\"
                                        aria-selected=\"" . ($isFirst ? 'true' : 'false') . "\">" . htmlspecialchars($track_or_sec) . "</button>
                                    </li>";
                                $isFirst = false;
                            }
                        } else {
                            echo "<li class=\"nav-item flex-fill\" role=\"presentation\">
                                    <button class=\"nav-link w-100 disabled\" type=\"button\">No record found.</button>
                                </li>";
                        }
                        ?>
                                </ul>

                                <!-- Tab Content -->
                                <div class="tab-content pt-2" id="trackOrSectionTabsContent">
                                    <?php
                        $result->data_seek(0); // Reset result pointer to start
                        $isFirst = true;
                        while ($row = $result->fetch_assoc()) {
                            $track_or_sec = ($_SESSION['user_cred']['type'] == "SHS") ? $row['track'] : $row['section'];
                            $activeClass = $isFirst ? ' show active' : '';
                            echo "<div class=\"tab-pane fade$activeClass\" id=\"$track_or_sec\" role=\"tabpanel\" aria-labelledby=\"$track_or_sec-tab\">
                                    <!-- Content for $track_or_sec will go here -->
                                </div>";
                            $isFirst = false;
                        }
                        ?>
                                </div>
                            </div>

                            <div class="alumni-content row" id="alumniContent">
                                <!-- Alumni information will be loaded here -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Faculty Members -->
                <div class="user" id="user">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Faculty Members</h5>
                            <div class="mb-3">
                                <!-- Department Tabs -->
                                <ul class="nav nav-tabs d-flex" id="departmentTabs" role="tablist">
                                    <?php
                    $sql = "SELECT DISTINCT sect_subj FROM faculty WHERE sect_subj IS NOT NULL";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $isFirst = true;
                        while ($row = $result->fetch_assoc()) {
                            $department = htmlspecialchars($row['sect_subj']);
                            $activeClass = $isFirst ? ' active' : '';
                            echo "<li class=\"nav-item flex-fill\" role=\"presentation\">
                                    <button class=\"nav-link w-100$activeClass\" id=\"$department-tab\" data-bs-toggle=\"tab\"
                                    data-bs-target=\"#$department\" type=\"button\" role=\"tab\" aria-controls=\"$department\"
                                    aria-selected=\"" . ($isFirst ? 'true' : 'false') . "\">$department</button>
                                </li>";
                            $isFirst = false;
                        }
                    } else {
                        echo "<li class=\"nav-item flex-fill\" role=\"presentation\">
                                <button class=\"nav-link w-100 disabled\" type=\"button\">No record found.</button>
                            </li>";
                    }
                    ?>
                                </ul>

                                <!-- Tab Content -->
                                <div class="tab-content pt-2" id="departmentTabsContent">
                                    <?php
                    $result->data_seek(0);
                    $isFirst = true;
                    while ($row = $result->fetch_assoc()) {
                        $department = htmlspecialchars($row['sect_subj']);
                        $activeClass = $isFirst ? ' show active' : '';
                        echo "<div class=\"tab-pane fade$activeClass\" id=\"$department\" role=\"tabpanel\" aria-labelledby=\"$department-tab\">
                                <!-- Content for $department will be loaded here -->
                            </div>";
                        $isFirst = false;
                    }
                    ?>
                                </div>
                            </div>

                            <div class="faculty-content row" id="facultyContent">
                                <!-- Faculty information will be loaded here -->
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
            $(document).ready(function() {
                function loadAlumniContent(trackOrSec) {
                    if (trackOrSec) {
                        $.ajax({
                            url: 'fetch_alumni.php',
                            type: 'POST',
                            data: {
                                track_or_sec: trackOrSec,
                                year: '<?= htmlspecialchars($year) ?>'
                            },
                            success: function(response) {
                                $('#alumniContent').html(response);
                            },
                            error: function() {
                                $('#alumniContent').html(
                                    '<div class="alert alert-danger">Error loading data. Please try again.</div>'
                                );
                            }
                        });
                    } else {
                        $('#alumniContent').empty();
                    }
                }

                $('#trackOrSectionTabs button').on('shown.bs.tab', function(e) {
                    var selectedValue = $(e.target).attr('aria-controls');
                    loadAlumniContent(selectedValue);
                });

                // Load content for the first tab automatically
                var firstTabContent = $('#trackOrSectionTabs button.active').attr('aria-controls');
                loadAlumniContent(firstTabContent);
            });

            $(document).ready(function() {
                function loadFacultyContent(department) {
                    if (department) {
                        $.ajax({
                            url: 'fetch_faculty.php',
                            type: 'POST',
                            data: {
                                sect_subj: department
                            },
                            success: function(response) {
                                $('#facultyContent').html(response);
                            },
                            error: function() {
                                $('#facultyContent').html(
                                    '<div class="alert alert-danger">Error loading data. Please try again.</div>'
                                );
                            }
                        });
                    } else {
                        $('#facultyContent').empty();
                    }
                }

                $('#departmentTabs button').on('shown.bs.tab', function(e) {
                    var selectedValue = $(e.target).attr('aria-controls');
                    loadFacultyContent(selectedValue);
                });

                // Load content for the first tab automatically
                var firstTabContent = $('#departmentTabs button.active').attr('aria-controls');
                loadFacultyContent(firstTabContent);
            });
            </script>



        </div>
    </section>

</main><!-- End #main -->

<?php
include_once 'includes/footer.php';
?>