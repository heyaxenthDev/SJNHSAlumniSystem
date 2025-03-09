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


                    <!-- Faculty Members -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Faculty Members</h5>
                            <div class="mb-3">

                                <!-- Grade Tabs -->
                                <ul class="nav nav-tabs d-flex" id="gradeTabs" role="tablist">
                                    <?php
                                        $sql = "SELECT DISTINCT grade FROM faculty WHERE hs_type = ? AND grade IS NOT NULL";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bind_param("s", $type);
                                        $stmt->execute();
                                        $result = $stmt->get_result();

                                        if ($result->num_rows > 0) {
                                            $isFirst = true;
                                            while ($row = $result->fetch_assoc()) {
                                                $grade = htmlspecialchars($row['grade']);
                                                $activeClass = $isFirst ? ' active' : '';
                                                echo "<li class=\"nav-item flex-fill\" role=\"presentation\">
                                                        <button class=\"nav-link w-100$activeClass\" id=\"$grade-tab\" data-bs-toggle=\"tab\"
                                                        data-bs-target=\"#g_$grade\" type=\"button\" role=\"tab\" aria-controls=\"$grade\"
                                                        aria-selected=\"" . ($isFirst ? 'true' : 'false') . "\">" . "Grade ". htmlspecialchars($grade) . "</button>
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
                                <div class="tab-content pt-2" id="gradeTabsContent">
                                    <?php
                                    $result->data_seek(0);
                                    $isFirst = true;
                                    while ($row = $result->fetch_assoc()) {
                                        $grade = htmlspecialchars($row['grade']);
                                        $activeClass = $isFirst ? ' show active' : '';
                                        echo "<div class=\"tab-pane fade$activeClass\" id=\"$grade\" role=\"tabpanel\" aria-labelledby=\"$grade-tab\">
                                                <!-- Content for $grade will be loaded here -->
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
                function loadContent(target, url, data) {
                    if (data) {
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: data,
                            success: function(response) {
                                $(target).html(response);
                            },
                            error: function() {
                                $(target).html(
                                    '<div class="alert alert-danger">Error loading data. Please try again.</div>'
                                );
                            }
                        });
                    } else {
                        $(target).empty();
                    }
                }

                // Load Alumni Content
                $('#trackOrSectionTabs button').on('shown.bs.tab', function(e) {
                    var selectedValue = $(e.target).attr('aria-controls');
                    loadContent('#alumniContent', 'fetch_alumni.php', {
                        track_or_sec: selectedValue,
                        year: '<?= htmlspecialchars($year) ?>'
                    });
                });

                // Load Faculty Content
                $('#gradeTabs button').on('shown.bs.tab', function(e) {
                    var selectedValue = $(e.target).attr('aria-controls');
                    loadContent('#facultyContent', 'fetch_faculty.php', {
                        grade: selectedValue
                    });
                });

                // Load default active tab content
                var firstAlumniTab = $('#trackOrSectionTabs button.active').attr('aria-controls');
                if (firstAlumniTab) {
                    loadContent('#alumniContent', 'fetch_alumni.php', {
                        track_or_sec: firstAlumniTab,
                        year: '<?= htmlspecialchars($year) ?>'
                    });
                }

                var firstFacultyTab = $('#gradeTabs button.active').attr('aria-controls');
                if (firstFacultyTab) {
                    loadContent('#facultyContent', 'fetch_faculty.php', {
                        grade: firstFacultyTab
                    });
                }
            });
            </script>

        </div>
    </section>

</main><!-- End #main -->

<?php
include_once 'includes/footer.php';
?>