<?php
include 'authentication.php';
include_once 'includes/header.php';
include_once 'includes/conn.php';

include_once 'includes/sidebar.php';
include "alert.php";
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Events</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Events</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-4">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Post New Event</h5>

                        <!-- Events Form Elements -->
                        <form class="row g-3" method="POST" action="code.php" enctype="multipart/form-data">

                            <div class="row mb-4 mt-2">
                                <div class="col-lg-12 col-md-12">
                                    <center>
                                        <img id="eventPicturePreview" src="assets/img/undraw_festivities_tvvj.png"
                                            alt="Event Picture Preview" style="max-width: 100%; max-height: 300px;">
                                    </center>
                                    <small class="mt-2">Add Event Picture</small>
                                    <input type="file" name="eventPicture" class="form-control" id="eventPicture"
                                        onchange="previewEventPicture();" accept="image/*" required>
                                </div>
                                <script src="js/scripts.js"></script>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 mb-2">
                                    <label for="eventName" class="form-label">Event Name</label>
                                    <input type="text" name="eventName" class="form-control" id="eventName" required>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-2">
                                    <label for="eventDate" class="form-label">Event Date</label>
                                    <input type="date" name="eventDate" class="form-control" id="eventDate" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-2">
                                    <label for="eventStatus" class="form-label">Event Status</label>
                                    <select name="eventStatus" class="form-select" id="eventStatus" required>
                                        <option value="">Select Status</option>
                                        <option value="1" class="text-success">On-going</option>
                                        <option value="2" class="text-primary">Upcoming</option>
                                        <option value="3" class="text-warning">Postponed</option>
                                        <!-- <option value="4" class="text-danger">Ended</option> -->
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-2">
                                    <label for="eventLocation" class="form-label">Event Location</label>
                                    <input type="text" name="eventLocation" class="form-control" id="eventLocation"
                                        required>
                                </div>

                                <div class="col-lg-12 col-md-12 mb-2">
                                    <label for="eventDescription" class="form-label">Event Description</label>
                                    <textarea name="eventDescription" class="form-control" id="eventDescription"
                                        rows="2" required></textarea>
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <button class="btn rounded-5 text-white" type="submit"
                                    style="background-color: #013220;" name="addNewEvent"><i
                                        class="bi bi-plus-circle"></i> Add New Event</button>
                            </div>
                        </form>
                        <!-- End Events Form Elements -->

                    </div>
                </div>

            </div>

            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Event currently posted</h5>
                        <p>add modal view for the details of the news and update.</p>

                        <!-- Table for events posted rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Event Code</th>
                                    <th scope="col">Event Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM events";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>{$row['eventsCode']}</td>";
                                        echo "<td>{$row['eventName']}</td>";
                                        echo "<td>{$row['eventDate']}</td>";
                                        echo "<td>";
                                        switch ($row['eventStatus']) {
                                            case "1":
                                                echo '<span class="badge bg-success">On-going</span>';
                                                break;
                                            case "2":
                                                echo '<span class="badge bg-primary">Upcoming</span>';
                                                break;
                                            case "3":
                                                echo '<span class="badge bg-warning">Postponed</span>';
                                                break;
                                            case "4":
                                                echo '<span class="badge bg-danger">Ended</span>';
                                                break;
                                            default:
                                                echo "Unknown";
                                        }echo "</td>";
                                        echo "<td>
                                        <button class='btn btn-primary btn-sm' onclick='viewEditEvent({$row['id']})' data-bs-toggle='modal' data-bs-target='#eventModal'>View &amp; Edit</button>
                                                                                            </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>No events found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table><!-- End Table for events posted rows -->

                    </div>
                </div>

                <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="eventModalLabel">View & Edit Event</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Event details will be loaded here dynamically via AJAX -->
                            </div>
                        </div>
                    </div>
                </div>


                <script>
                function viewEditEvent(eventId) {
                    // Fetch event details using AJAX
                    $.ajax({
                        url: 'get_details.php',
                        type: 'POST',
                        data: {
                            eventid: eventId
                        },
                        success: function(response) {
                            // Display event details in modal body
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