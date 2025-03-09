<?php
include 'authentication.php';
include 'includes/header.php';
include 'includes/conn.php';

include "alert.php";
?>

<main id="main" class="main">

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="<?= $picture ?>" alt="Profile" class="rounded-circle">
                        <h2><?= $name ?></h2>
                        <h3>
                            <?= $profession ?></h3>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="dashboard card">
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

                    <div class="card-body pb-3">
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
                                <h4><a
                                        href="#"><?php echo $row['firstname'] . " " . $row['initialM'] . ". " . $row['lastname']; ?></a>
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

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>


                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8"><?= $name ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Company</div>
                                    <div class="col-lg-9 col-md-8"><?= $company ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Job</div>
                                    <div class="col-lg-9 col-md-8"><?= $profession ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Country</div>
                                    <div class="col-lg-9 col-md-8">Philippines</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8"><?= $address ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8"><?= $contact ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?= $email ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Awards</div>
                                    <div class="col-lg-9 col-md-8"><?= $awards ?></div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                            Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="<?= $picture ?>" alt="Profile">
                                            <div class="pt-2">
                                                <input type="file" name="profileImage" class="form-control"
                                                    id="profileImage">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                        <div class="col-md-8 col-lg-9 d-flex gap-2">
                                            <input name="firstname" type="text" class="form-control" id="firstname"
                                                value="<?= $fname ?>">
                                            <input name="middlename" type="text" class="form-control" id="middlename"
                                                value="<?= $mname ?>">
                                            <input name="lastname" type="text" class="form-control" id="lastname"
                                                value="<?= $lname ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="company" type="text" class="form-control" id="company"
                                                value="<?= $company ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="job" type="text" class="form-control" id="Job"
                                                value="<?= $profession ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="country" type="text" class="form-control" id="Country"
                                                value="Philippines">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="text" class="form-control" id="Address"
                                                value="<?= $address ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Phone"
                                                value="<?= $contact ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email"
                                                value="<?= $email ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Awards" class="col-md-4 col-lg-3 col-form-label">Awards</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="awards" type="text" class="form-control" id="Awards"
                                                value="<?= $awards ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-3 col-md-4">
                                            <label for="securityQuestion" class="mb-2">Select a Security
                                                Question</label>
                                        </div>
                                        <div class="col-lg-9 col-md-8">
                                            <select id="securityQuestion" name="securityQuestion" class="form-select">
                                                <option
                                                    value="<?= $security_question == "" ? "" : $security_question?>">
                                                    <?= $security_question == "" ? "---Select Question---" : $security_question?>
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-3 col-md-4">
                                            <label for="answer" class="form-label">Security Answer</label>
                                        </div>
                                        <div class="col-lg-9 col-md-8">
                                            <input type="text" name="securityAnswer" class="form-control" id="answer"
                                                value="<?= $security_answer == "" ? " " : $security_answer?>" required>
                                        </div>
                                    </div>

                                    <script>
                                    // List of random security questions
                                    const questions = [
                                        "What is your mother's maiden name?",
                                        "What was your first pet's name?",
                                        "What is your favorite book?",
                                        "What is the name of your first school?",
                                        "What is your favorite movie?",
                                        "What city were you born in?",
                                        "What was your childhood nickname?",
                                        "Who was your childhood best friend?",
                                        "What was the model of your first car?",
                                        "What is your favorite food?"
                                    ];

                                    // Select element
                                    const select = document.getElementById("securityQuestion");

                                    // Shuffle questions (Fisher-Yates shuffle)
                                    function shuffleArray(array) {
                                        for (let i = array.length - 1; i > 0; i--) {
                                            let j = Math.floor(Math.random() * (i + 1));
                                            [array[i], array[j]] = [array[j], array[i]]; // Swap elements
                                        }
                                    }

                                    // Shuffle and populate select options
                                    shuffleArray(questions);
                                    questions.forEach(question => {
                                        let option = document.createElement("option");
                                        option.value = question;
                                        option.textContent = question;
                                        select.appendChild(option);
                                    });
                                    </script>


                                    <div class="text-center">
                                        <button type="submit" name="update" class="btn btn-primary">Save
                                            Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>


                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Include jQuery (if not already included) -->
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                                <!-- Change Password Form -->
                                <form action="code.php" method="POST">
                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control password-field"
                                                id="currentPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password"
                                                class="form-control password-field" id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password"
                                                class="form-control password-field" id="renewPassword">
                                        </div>
                                    </div>

                                    <!-- Show Password Checkbox -->
                                    <div class="row mb-3">
                                        <div class="col-md-8 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="showPasswords">
                                                <label class="form-check-label" for="showPasswords">Show
                                                    Passwords</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary" name="changePassword">Change
                                            Password</button>
                                    </div>
                                </form>
                                <!-- End Change Password Form -->

                                <!-- jQuery Script to Toggle Password Visibility -->
                                <script>
                                $(document).ready(function() {
                                    $("#showPasswords").on("change", function() {
                                        $(".password-field").attr("type", this.checked ? "text" :
                                            "password");
                                    });
                                });
                                </script>

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php
include_once 'includes/footer.php';
?>