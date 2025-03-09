<?php
session_start();
require 'includes/conn.php';

$grade = $_POST['grade'];
$type = $_SESSION['user_cred']['type'];

$sql = "SELECT * FROM faculty WHERE `hs_type` = ? AND grade = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $type, $grade);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $middlenameInitial = substr($row['middlename'], 0, 1);
        echo '<div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch">
                <div class="member" data-aos="fade-up" data-aos-delay="100">
                    <div class="member-img">
                        <img src="\SJNHSAlumniSystem/admin/' . ($row['profile_picture'] == null ? "assets/img/user.png" : $row['profile_picture']) . '" class="img-fluid" alt="">
                        <div class="social">
                            <a href="mailto:' . $row['email'] . '"><i class="bi bi-envelope-fill"></i></a>
                            <a href="tel:' . $row['phone_num'] . '"><i class="bi bi-telephone-fill"></i></a>
                            <a href="chat.php"><i class="bi bi-chat-dots-fill"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>' . $row['firstname'] . " " . $middlenameInitial . ". " . $row['lastname'] . '</h4>
                        <span>Designation: ' . $row['designation'] . '</span>
                        <span>Section / Subject: ' .$row['sect_subj'] . '</span>
                    </div>
                </div>
            </div>';
    }
} else {
    echo '<p>No alumni found for the selected track/section.</p>';
}

$stmt->close();
$conn->close();
?>