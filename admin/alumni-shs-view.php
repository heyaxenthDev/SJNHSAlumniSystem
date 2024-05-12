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
            <a class="nav-link" data-bs-target="#alumni-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>Alumni Yearbook</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="alumni-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="juniorhs-alumni.php">
                        <i class="bi bi-circle"></i><span>Junior High</span>
                    </a>
                </li>
                <li>
                    <a href="seniorhs-alumni.php" class="active">
                        <i class="bi bi-circle"></i><span>Senior High</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Alumni Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#comms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-envelope"></i><span>Communications</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="comms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="email.php">
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
        <h1>Batch <?php echo isset($_GET['batch']) ? $_GET['batch'] : ''; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item">Alumni Yearbook</li>
                <li class="breadcrumb-item"><a href="juniorhs-alumni.php">Senior High</a></li>
                <li class="breadcrumb-item active">Batch <?php echo isset($_GET['batch']) ? $_GET['batch'] : ''; ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div id="user" class="user">
                    <div class="container" data-aos="fade-up">

                        <div class="section-title">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">

                                <div class="search-bar">
                                    <input type="text" name="query" id="search" placeholder="Search"
                                        title="Enter search keyword">
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script>
                                    $(document).ready(function() {
                                        var timeout; // Variable to hold the timeout
                                        $('input[name=query]').keyup(function() {
                                            clearTimeout(timeout); // Clear the previous timeout
                                            timeout = setTimeout(function() { // Set a new timeout
                                                    var query = $('input[name=query]')
                                                        .val(); // Get the search query
                                                    console.log(query);
                                                    // Send an AJAX request to the server
                                                    $.ajax({
                                                        type: 'POST', // Use POST method to match PHP code
                                                        url: 'search.php', // Replace 'search.php' with your server-side search script
                                                        data: {
                                                            query: query
                                                        }, // Send the search query as data
                                                        success: function(response) {
                                                            $('#search-results').html(
                                                                response
                                                            ); // Update the search results div with the response
                                                        },
                                                        error: function(xhr, status,
                                                            error) {
                                                            console.error(
                                                                "An error occurred: " +
                                                                error
                                                            ); // Log any errors to the console
                                                        }
                                                    });
                                                },
                                                300
                                            ); // Wait for 300ms before sending the request (debouncing)
                                        });
                                    });
                                    </script>

                                    <div id="search-results"></div>
                                </div>

                                <button class="btn text-white" style="background-color:#013220" type="button"
                                    data-bs-toggle="modal" data-bs-target="#addfaculty"><i
                                        class="bi bi-person-plus-fill"></i> Add Alumni
                                </button>
                            </div>


                            <!-- Start Add Alumni Modal-->
                            <div class="modal fade" id="addfaculty" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-semibold" style="color: #013220;">Alumni Form -
                                                General Information
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body m-2">
                                            <form class="row g-3" method="POST" action="code.php"
                                                enctype="multipart/form-data">

                                                <!-- <h5 style="color: #013220;" class="fst-italic fw-semibold">General
                                                    Information</h5> -->

                                                <div class="row mb-4 mt-2">
                                                    <div class="col-lg-5 col-md-5">
                                                        <!-- Profile Picture Preview -->
                                                        <center>
                                                            <img id="profilePicturePreview" src="assets/img/user.png"
                                                                alt="Profile Picture Preview"
                                                                style="max-width: 100%; max-height: 165px;">
                                                        </center>
                                                        <!-- Profile Picture Input -->
                                                        <small class="mt-2">Default Profile Picture</small>
                                                        <!-- <input type="file" name="profilePicture" class="form-control"
                                                            id="profilePicture" onchange="previewProfilePicture();"
                                                            accept="image/*" required> -->
                                                        <script src="js/scripts.js"></script>
                                                    </div>

                                                    <div class="col-lg-7 col-md-7">
                                                        <div class="col-lg-12 col-md-12 mb-2">
                                                            <label for="firstname" class="form-label">First Name</label>
                                                            <input type="text" name="firstname" class="form-control"
                                                                id="firstname" required>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 mb-2">
                                                            <label for="middlename" class="form-label">Middle
                                                                Name</label>
                                                            <input type="text" name="middlename" class="form-control"
                                                                id="middlename" required>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 mb-2">
                                                            <label for="lastname" class="form-label">Last Name</label>
                                                            <input type="text" name="lastname" class="form-control"
                                                                id="lastname" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-2">
                                                    <div class="col-lg-3 col-md-3">
                                                        <label for="year_graduated" class="form-label">Year
                                                            Graduated</label>
                                                        <input type="text" name="year_graduated" class="form-control"
                                                            id="year_graduated"
                                                            value="<?php echo isset($_GET['batch']) ? $_GET['batch'] : ''; ?>"
                                                            readonly>
                                                    </div>

                                                    <div class="col-lg-3 col-md-3">
                                                        <label for="track" class="form-label">Track</label>
                                                        <select name="track" class="form-select" id="track" required>
                                                            <option value="">Select Track</option>
                                                            <option value="ABM">Accountancy, Business, and Management
                                                                (ABM)</option>
                                                            <option value="STEM">Science, Technology, Engineering, and
                                                                Mathematics (STEM)</option>
                                                            <option value="HUMSS">Humanities and Social Sciences (HUMSS)
                                                            </option>
                                                            <option value="GAS">General Academic Strand (GAS)</option>
                                                            <option value="TVL">Technical-Vocational-Livelihood (TVL)
                                                            </option>
                                                            <option value="SPORTS">Sports Track</option>
                                                            <option value="ARTS">Arts and Design Track</option>
                                                        </select>
                                                    </div>


                                                    <div class="col-lg-3 col-md-3">
                                                        <label for="profession" class="form-label">Profession</label>
                                                        <select name="profession" class="form-select" id="profession"
                                                            required>
                                                            <option value="">Select Profession</option>
                                                            <optgroup label="Healthcare">
                                                                <option value="Doctor">Doctor</option>
                                                                <option value="Nurse">Nurse</option>
                                                                <option value="Pharmacist">Pharmacist</option>
                                                            </optgroup>
                                                            <optgroup label="Education">
                                                                <option value="Teacher">Teacher</option>
                                                                <option value="Professor">Professor</option>
                                                                <option value="Guidance Counselor">Guidance Counselor
                                                                </option>
                                                            </optgroup>
                                                            <optgroup label="Information Technology">
                                                                <option value="Software Developer">Software Developer
                                                                </option>
                                                                <option value="Web Developer">Web Developer</option>
                                                                <option value="Database Administrator">Database
                                                                    Administrator</option>
                                                            </optgroup>
                                                            <optgroup label="Business">
                                                                <option value="Entrepreneur">Entrepreneur</option>
                                                                <option value="Business Analyst">Business Analyst
                                                                </option>
                                                                <option value="Marketing Specialist">Marketing
                                                                    Specialist</option>
                                                            </optgroup>
                                                            <optgroup label="Engineering">
                                                                <option value="Civil Engineer">Civil Engineer</option>
                                                                <option value="Mechanical Engineer">Mechanical Engineer
                                                                </option>
                                                                <option value="Electrical Engineer">Electrical Engineer
                                                                </option>
                                                            </optgroup>
                                                            <optgroup label="Others">
                                                                <option value="Freelancer">Freelancer</option>
                                                                <option value="Artist">Artist</option>
                                                                <option value="Writer">Writer</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>


                                                    <div class="col-lg-3 col-md-3">
                                                        <label for="marital_stat" class="form-label">Marital
                                                            Status</label>
                                                        <select name="marital_stat" class="form-select"
                                                            id="marital_stat" required>
                                                            <option value=" ">--Select--</option>
                                                            <option value="Single">Single</option>
                                                            <option value="Married">Married</option>
                                                            <option value="Widowed">Widowed</option>
                                                            <option value="Divorced">Divorced</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- <h5 style="color: #013220;" class="fst-italic fw-semibold">Contact
                                                    Details</h5> -->
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" name="email" class="form-control" id="email"
                                                            required>
                                                    </div>

                                                    <div class="col-lg-4 col-md-4">
                                                        <label for="password" class="form-label">Set Default
                                                            Password</label>
                                                        <?php
                                                        $defaultPassword = "Welcome123!";
                                                        // $hashedPassword = password_hash($defaultPassword, PASSWORD_DEFAULT);
                                                        ?>
                                                        <input type="text" name="password" class="form-control"
                                                            id="password" value="<?php echo $defaultPassword; ?>"
                                                            required>
                                                    </div>

                                                    <div class="col-lg-4 col-md-4">
                                                        <label for="phone_num" class="form-label">Phone Number</label>
                                                        <input type="tel" name="phone_num" class="form-control"
                                                            id="phone_num" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 mb-2">
                                                    <label for="address" class="form-label">Address</label>
                                                    <textarea name="address" class="form-control" id="address" rows="2"
                                                        required></textarea>
                                                </div>

                                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                    <button class="btn rounded-5 text-white" type="submit"
                                                        style="background-color: #013220;" name="addNewSHSAlumni"><i
                                                            class="bi bi-plus-circle"></i> Add New Alumni</button>
                                                </div>
                                            </form>



                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Add Alumni Modal-->

                            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum
                                quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui
                                impedit suscipit alias ea.</p>
                            <hr>
                        </div>

                        <div class="row">
                            <?php
                            // Query to select alumni members from the database
                            $sql = "SELECT * FROM alumni_shs WHERE `year_graduated` = '$_GET[batch]'";
                            $result = mysqli_query($conn, $sql);

                            // Check if there are any alumni members
                            if (mysqli_num_rows($result) > 0) {
                                // Loop through each alumni member and display their information
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $middlenameInitial = substr($row['middlename'], 0, 1);
                            ?>
                            <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch">
                                <div class="member" data-aos="fade-up" data-aos-delay="100">
                                    <div class="member-img">
                                        <img src="<?php echo ($row['profile_picture'] == null) ? "assets/img/user.png" :  $src . $row['profile_picture'];  ?>"
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
                                        <span><?php echo "Track: " . $row['track']; ?></span>
                                        <span><?php echo "Profession: " . $row['profession']; ?></span>
                                        <span><?php echo "Address: " . $row['address']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            } else {
                                echo "No alumni members found.";
                            }

                            // Close the database connection
                            mysqli_close($conn);
                            ?>

                        </div>
                    </div>

                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>
</main><!-- End #main -->
<?php
include_once 'includes/footer.php';
?>