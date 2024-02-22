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
                    <a href="#" class="active">
                        <i class="bi bi-circle"></i><span>Email</span>
                    </a>
                </li>
                <li>
                    <a href="message.php">
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

    <div class="pagetitle">
        <h1>Email</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item">Communications</li>
                <li class="breadcrumb-item active">Email</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-4">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Post New News</h5>

                        <!-- News Form Elements -->
                        <form class="row g-3" method="POST" action="code.php" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Email</button>
                        </form>

                        <!-- End News Form Elements -->

                    </div>
                </div>

            </div>

            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">News currently posted</h5>
                        <p>add modal view for the details of the news and update.</p>

                        <!-- Table for news posted rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">News Title</th>
                                    <th scope="col">Publication Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            $sql = "SELECT * FROM news";
                            $result = mysqli_query($conn, $sql);
                            $count = 1;
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<th scope='row'><a href='#'>$count</a></th>";
                                    echo "<td>{$row['title']}</td>";
                                    echo "<td>" . date("M d, Y", strtotime($row['publication_date'])) . "</td>";                                    echo "<td>";
                                    switch ($row['newsStatus']) {
                                        case "1":
                                            echo '<span class="badge bg-success">Published</span>';
                                            break;
                                        case "2":
                                            echo '<span class="badge bg-primary">Draft</span>';
                                            break;
                                        default:
                                            echo "Unknown";
                                    }echo "</td>";
                                    echo "<td>
                                            <button class='btn btn-primary btn-sm' onclick='viewEditNews({$row['id']})' data-bs-toggle='modal' data-bs-target='#newsModal'>View &amp; Edit</button>
                                            <button class='btn btn-danger btn-sm'>End</button>
                                        </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No news found</td></tr>";
                            }
                            ?>
                            </tbody>
                        </table><!-- End Table for news posted rows -->

                    </div>
                </div>

                <div class="modal fade" id="newsModal" tabindex="-1" aria-labelledby="newsModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="newsModalLabel">View & Edit News</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- News details will be loaded here dynamically via AJAX -->
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                function viewEditNews(newsId) {
                    // Fetch news details using AJAX
                    $.ajax({
                        url: 'get_details.php',
                        type: 'POST',
                        data: {
                            id: newsId
                        },
                        success: function(response) {
                            // Display news details in modal body
                            $('.modal-body').html(response);
                        }
                    });
                }
                </script>


            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php
include_once 'includes/footer.php';
?>