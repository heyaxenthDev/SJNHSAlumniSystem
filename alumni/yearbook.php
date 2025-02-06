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
                                <label for="trackOrSectionSelect" class="form-label">Select Track/Section:</label>
                                <select class="form-select" id="trackOrSectionSelect" name="track_or_sec"
                                    aria-label="Track/Section select">
                                    <option value="">Select a track/section</option>
                                    <?php
                                    $column = ($_SESSION['user_cred']['type'] == "SHS") ? "track" : "section";
                                    $sql = "SELECT DISTINCT `$column` FROM $table WHERE `year_graduated` = ? AND `$column` IS NOT NULL";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("s", $year);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $track_or_sec = ($_SESSION['user_cred']['type'] == "SHS") ? $row['track'] : $row['section'];
                                            echo "<option value=\"" . htmlspecialchars($track_or_sec) . "\">" . htmlspecialchars($track_or_sec) . "</option>";
                                        }
                                    } else {
                                        echo "<option disabled>No record found.</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="alumni-content row" id="alumniContent">
                                <!-- Alumni information will be loaded here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
            $(document).ready(function() {
                $('#trackOrSectionSelect').on('change', function() {
                    var selectedValue = $(this).val();
                    if (selectedValue) {
                        $.ajax({
                            url: 'fetch_alumni.php',
                            type: 'POST',
                            data: {
                                track_or_sec: selectedValue,
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
                });
            });
            </script>




        </div>
    </section>

</main><!-- End #main -->

<?php
include_once 'includes/footer.php';
?>