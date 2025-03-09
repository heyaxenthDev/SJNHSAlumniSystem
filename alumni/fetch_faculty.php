<?php
session_start();
require 'includes/conn.php';

if (isset($_POST['sect_subj'])) {
    $department = $_POST['sect_subj'];

    $sql = "SELECT * FROM faculty WHERE sect_subj = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $department);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<div class='row'>";
        while ($row = $result->fetch_assoc()) {
            $middlenameInitial = !empty($row['middlename']) ? substr($row['middlename'], 0, 1) . "." : "";
            $fullName = htmlspecialchars($row['firstname'] . " " . $middlenameInitial . " " . $row['lastname']);
            $email = htmlspecialchars($row['email']);
            $phone = htmlspecialchars($row['phone_num']);
            $designation = htmlspecialchars($row['designation']);
            $hsType = htmlspecialchars($row['hs_type']);
            $grade = htmlspecialchars($row['grade']);
            $profileImg = !empty($row['profile_picture']) ? "\SJNHSAlumniSystem/admin/" . htmlspecialchars($row['profile_picture']) : 'assets/img/user.png';

            echo "<div class='col-lg-3 col-md-6 col-6 d-flex align-items-stretch'>
                    <div class='member' data-aos='fade-up' data-aos-delay='100'>
                        <div class='member-img'>
                            <img src='$profileImg' class='img-fluid' alt='Profile Picture'>
                            <div class='social'>
                                <a href='mailto:$email'><i class='bi bi-envelope-fill'></i></a>
                                <a href='tel:$phone'><i class='bi bi-telephone-fill'></i></a>
                            </div>
                        </div>
                        <div class='member-info'>
                            <h4>$fullName</h4>
                            <span>$designation</span>
                            <span>HS Type: $hsType | Grade: $grade</span>
                        </div>
                    </div>
                </div>";
        }
        echo "</div>";
    } else {
        echo "<p class='alert alert-warning'>No faculty members found in this department.</p>";
    }
} else {
    echo "<p class='alert alert-danger'>Invalid request.</p>";
}
?>