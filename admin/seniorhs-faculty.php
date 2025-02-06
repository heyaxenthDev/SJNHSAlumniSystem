<?php
include 'authentication.php';
include_once 'includes/header.php';
include_once 'includes/conn.php';

include_once 'includes/sidebar.php';
include "alert.php";
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Senior High Faculty Directory</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item">Faculty Directory</li>
                <li class="breadcrumb-item active">Senior High</li>
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
                                <button class="btn text-white" style="background-color:#013220" type="button"
                                    data-bs-toggle="modal" data-bs-target="#addfaculty"><i
                                        class="bi bi-person-plus-fill"></i> Add Faculty</button>
                            </div>

                            <!-- Start Add Faculty Modal-->
                            <div class="modal fade" id="addfaculty" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-semibold" style="color: #013220;">Faculty Form
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body m-2">
                                            <form class="row g-3" method="POST" action="code.php"
                                                enctype="multipart/form-data">

                                                <h5 style="color: #013220;" class="fst-italic fw-semibold">General
                                                    Information</h5>

                                                <div class="row mb-2 mt-2">
                                                    <div class="col-lg-5 col-md-5">
                                                        <!-- Profile Picture Preview -->
                                                        <center>
                                                            <img id="profilePicturePreview" src="assets/img/user.png"
                                                                alt="Profile Picture Preview"
                                                                style="max-width: 100%; max-height: 200px;">
                                                        </center>
                                                        <!-- Profile Picture Input -->
                                                        <small class="mt-2">Add Profile
                                                            Picture</small>
                                                        <input type="file" name="profilePicture" class="form-control "
                                                            id="profilePicture" onchange="previewProfilePicture();"
                                                            accept="image/*" required>
                                                    </div>

                                                    <div class="col-lg-7 col-md-7">
                                                        <div class="col-lg-12 col-md-12 mb-2">
                                                            <label for="firstname" class="form-label">First
                                                                Name</label>
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
                                                            <label for="lastname" class="form-label">Last
                                                                Name</label>
                                                            <input type="text" name="lastname" class="form-control"
                                                                id="lastname" required>
                                                        </div>

                                                        <div class="row mb-2">
                                                            <div class="col-lg-6 col-md-6">
                                                                <label for="designation"
                                                                    class="form-label">Designation</label>
                                                                <select name="designation" class="form-select"
                                                                    id="designation" required>
                                                                    <option value="none">--Select Designation--
                                                                    </option>
                                                                    <option value="Principal">Principal</option>
                                                                    <option value="Teacher I">Teacher I</option>
                                                                    <option value="Teacher II">Teacher II</option>
                                                                    <option value="Teacher III">Teacher III</option>
                                                                    <option value="Teacher IV">Teacher IV</option>
                                                                    <option value="Teacher V">Teacher V</option>
                                                                    <option value="Teacher VI">Teacher VI</option>
                                                                    <option value="Master Teacher I">Master Teacher
                                                                        I
                                                                    </option>
                                                                    <option value="Master Teacher II">Master Teacher
                                                                        II
                                                                    </option>
                                                                    <option value="Master Teacher III">Master
                                                                        Teacher
                                                                        III</option>
                                                                    <option value="Master Teacher IV">Master Teacher
                                                                        IV
                                                                    </option>
                                                                    <option value="Master Teacher V">Master Teacher
                                                                        V
                                                                    </option>
                                                                    <option value="Master Teacher VI">Master Teacher
                                                                        VI
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <label for="grade" class="form-label">Grade</label>
                                                                <select name="grade" class="form-select" id="grade"
                                                                    required>
                                                                    <option value="none">--Select Grade--</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12">
                                                            <label for="section"
                                                                class="form-label">Advisory/Subject</label>
                                                            <input type="text" name="section" class="form-control"
                                                                id="section" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <h5 style="color: #013220;" class="fst-italic fw-semibold">Contact
                                                    Details</h5>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" name="email" class="form-control" id="email"
                                                            required>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <label for="phone_num" class="form-label">Phone
                                                            Number</label>
                                                        <input type="tel" name="phone_num" class="form-control"
                                                            id="phone_num" required>
                                                    </div>
                                                </div>

                                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                    <button class="btn rounded-5 text-white" type="submit"
                                                        style="background-color: #013220;" name="addNewSHSFaculty"><i
                                                            class="bi bi-plus-circle"></i>
                                                        Add New Faculty</button>
                                                </div>
                                            </form>
                                            <script src="js/scripts.js"></script>

                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Add Faculty Modal-->

                            <p></p>
                        </div>

                        <div class="row">

                            <?php
                            // Query to select faculty members from the database
                            $sql = "SELECT * FROM faculty WHERE `hs_type` = 'SHS'";
                            $result = mysqli_query($conn, $sql);

                            // Check if there are any faculty members
                            if (mysqli_num_rows($result) > 0) {
                                // Loop through each faculty member and display their information
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $middlenameInitial = substr($row['middlename'], 0, 1);
                                    ?>
                            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                <div class="member" data-aos="fade-up" data-aos-delay="100">
                                    <div class="member-img">
                                        <img src="<?php echo $row['profile_picture']; ?>" class="img-fluid" alt="">
                                        <div class="social">
                                            <a href="mailto:<?php echo $row['email']; ?>"><i
                                                    class="bi bi-envelope-fill"></i></a>
                                            <a href="tel:<?php echo $row['phone_num']; ?>"><i
                                                    class="bi bi-telephone-fill"></i></a>
                                            <a class="editFacultyBtn" data-faculty='<?php echo json_encode([
                                                        "id" => $row["id"],
                                                        "firstname" => $row["firstname"],
                                                        "middlename" => $row["middlename"],
                                                        "lastname" => $row["lastname"],
                                                        "designation" => $row["designation"],
                                                        "grade" => $row["grade"],
                                                        "sect_subj" => $row["sect_subj"],
                                                        "email" => $row["email"],
                                                        "phone_num" => $row["phone_num"],
                                                        "profile_picture" => $row["profile_picture"]
                                                    ], JSON_HEX_APOS | JSON_HEX_QUOT); ?>'>
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                        </div>
                                    </div>
                                    <div class="member-info">
                                        <h4><?php echo $row['firstname'] . " " . $middlenameInitial . ". " . $row['lastname']; ?>
                                        </h4>
                                        <span><?php echo $row['designation'] . " <br> Grade " . $row['grade'] . " - " . $row['sect_subj']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            } else {
                                echo "No team members found.";
                            }

                            // Close the database connection
                            mysqli_close($conn);
                            ?>

                        </div>

                        <!-- Edit Faculty Modal -->
                        <div class="modal fade" id="editFacultyModal" tabindex="-1"
                            aria-labelledby="editFacultyModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-semibold" style="color: #013220;">Edit Faculty</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body m-2">
                                        <form class="row g-3" method="POST" action="update_faculty.php"
                                            enctype="multipart/form-data">
                                            <input type="hidden" name="faculty_id" id="editFacultyId">


                                            <h5 style="color: #013220;" class="fst-italic fw-semibold">General
                                                Information</h5>
                                            <div class="row mb-2 mt-2">
                                                <div class="col-lg-5 col-md-5">
                                                    <center>
                                                        <img id="editProfilePicturePreview" src="assets/img/user.png"
                                                            alt="Profile Picture"
                                                            style="max-width: 100%; max-height: 200px;">
                                                    </center>
                                                    <small class="mt-2">Update Profile Picture</small>
                                                    <input type="file" name="profilePicture" class="form-control"
                                                        id="editProfilePicture" onchange="previewEditProfilePicture();"
                                                        accept="image/*">
                                                </div>

                                                <div class="col-lg-7 col-md-7">
                                                    <label for="editFirstname" class="form-label">First Name</label>
                                                    <input type="text" name="firstname" class="form-control"
                                                        id="editFirstname" required>

                                                    <label for="editMiddlename" class="form-label">Middle Name</label>
                                                    <input type="text" name="middlename" class="form-control"
                                                        id="editMiddlename">

                                                    <label for="editLastname" class="form-label">Last Name</label>
                                                    <input type="text" name="lastname" class="form-control"
                                                        id="editLastname" required>

                                                    <label for="editDesignation" class="form-label">Designation</label>
                                                    <select name="designation" class="form-select" id="editDesignation"
                                                        required>
                                                        <option value="Principal">Principal</option>
                                                        <option value="Teacher I">Teacher I</option>
                                                        <option value="Teacher II">Teacher II</option>
                                                        <option value="Teacher III">Teacher III</option>
                                                        <option value="Master Teacher I">Master Teacher I</option>
                                                    </select>

                                                    <label for="editGrade" class="form-label">Grade</label>
                                                    <select name="grade" class="form-select" id="editGrade" required>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                    </select>

                                                    <label for="editSection" class="form-label">Advisory/Subject</label>
                                                    <input type="text" name="section" class="form-control"
                                                        id="editSection" required>
                                                </div>
                                            </div>

                                            <h5 style="color: #013220;" class="fst-italic fw-semibold">Contact Details
                                            </h5>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="editEmail" class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control" id="editEmail"
                                                        required>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="editPhoneNum" class="form-label">Phone Number</label>
                                                    <input type="tel" name="phone_num" class="form-control"
                                                        id="editPhoneNum" required>
                                                </div>
                                            </div>

                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <button class="btn rounded-5 text-white" type="submit"
                                                    style="background-color: #013220;" name="updateFaculty"><i
                                                        class="bi bi-save"></i> Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                        $(document).ready(function() {
                            $('.editFacultyBtn').click(function() {
                                let faculty = $(this).data('faculty');

                                $('#editFacultyId').val(faculty.id);
                                $('#editFirstname').val(faculty.firstname);
                                $('#editMiddlename').val(faculty.middlename);
                                $('#editLastname').val(faculty.lastname);
                                $('#editDesignation').val(faculty.designation);
                                $('#editGrade').val(faculty.grade);
                                $('#editSection').val(faculty.sect_subj);
                                $('#editEmail').val(faculty.email);
                                $('#editPhoneNum').val(faculty.phone_num);
                                $('#editProfilePicturePreview').attr('src', faculty.profile_picture);

                                $('#editFacultyModal').modal('show');
                            });
                        });

                        function previewEditProfilePicture() {
                            var file = document.getElementById("editProfilePicture").files[0];
                            var reader = new FileReader();
                            reader.onloadend = function() {
                                document.getElementById("editProfilePicturePreview").src = reader.result;
                            }
                            if (file) {
                                reader.readAsDataURL(file);
                            }
                        }
                        </script>

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