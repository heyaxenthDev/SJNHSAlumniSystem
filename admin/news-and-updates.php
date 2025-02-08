<?php
include 'authentication.php';
include_once 'includes/header.php';
include_once 'includes/conn.php';

include_once 'includes/sidebar.php';
include "alert.php";
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>News &amp; Updates</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">News &amp; Updates</li>
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

                            <div class="row mb-4 mt-2">
                                <div class="col-lg-12 col-md-12">
                                    <center>
                                        <img id="newsPicturePreview" src="assets/img/undraw_Newspaper_re_syf5.png"
                                            alt="News Picture Preview" style="max-width: 100%; max-height: 300px;">
                                    </center>
                                    <small class="mt-2">Add News Picture</small>
                                    <input type="file" name="newsPicture" class="form-control" id="newsPicture"
                                        onchange="previewNewsPicture();" accept="image/*" required>
                                </div>
                                <script src="js/scripts.js"></script>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-2">
                                    <label for="newsTitle" class="form-label">News Title</label>
                                    <input type="text" name="newsTitle" class="form-control" id="newsTitle" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-2">
                                    <label for="newsContent" class="form-label">News Content</label>
                                    <textarea name="newsContent" class="form-control" id="newsContent" rows="2"
                                        required></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 mb-2">
                                    <label for="publicationDate" class="form-label">Publication Date</label>
                                    <input type="date" name="publicationDate" class="form-control" id="publicationDate"
                                        required>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-2">
                                    <label for="newsStatus" class="form-label">News Status</label>
                                    <select name="newsStatus" class="form-select" id="newsStatus" required>
                                        <option value="">Select Status</option>
                                        <option value="1" class="text-success">Published</option>
                                        <option value="2" class="text-primary">Draft</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <button class="btn rounded-5 text-white" type="submit"
                                    style="background-color: #013220;" name="addNewNews"><i
                                        class="bi bi-plus-circle"></i> Add New News</button>
                            </div>
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
                                $sql = "SELECT *, ROW_NUMBER() OVER (ORDER BY id) as counts FROM news";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<th scope='row'><a href='#'>" . $row['counts'] . "</a></th>";
                                        echo "<td>{$row['title']}</td>";
                                        echo "<td>" . date("M d, Y", strtotime($row['publication_date'])) . "</td>";
                                        echo "<td>";
                                        switch ($row['newsStatus']) {
                                            case "1":
                                                echo '<span class="badge bg-success">Published</span>';
                                                break;
                                            case "2":
                                                echo '<span class="badge bg-primary">Draft</span>';
                                                break;
                                            default:
                                                echo "Unknown";
                                        }
                                        echo "</td>";
                                        echo "<td>
                                            <button class='btn btn-primary btn-sm' onclick='viewEditNews({$row['id']})' data-bs-toggle='modal' data-bs-target='#newsModal'>View &amp; Edit</button>";
                                        echo "</td>";
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
                    <div class="modal-dialog modal-xl">
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