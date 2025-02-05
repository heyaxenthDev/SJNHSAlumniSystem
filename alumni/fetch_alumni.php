<?php
session_start();
require 'includes/conn.php';

$track_or_sec = $_POST['track_or_sec'];
$year = $_POST['year'];

$sql = "SELECT * FROM alumni_jhs WHERE `year_graduated` = ? AND (" . ($_SESSION['user_cred']['type'] == "SHS" ? "`track`" : "`section`") . " = ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $year, $track_or_sec);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $middlenameInitial = substr($row['middlename'], 0, 1);
        echo '<div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch">
                <div class="member" data-aos="fade-up" data-aos-delay="100">
                    <div class="member-img">
                        <img src="' . ($row['profile_picture'] == null ? "assets/img/user.png" : $row['profile_picture']) . '" class="img-fluid" alt="">
                        <div class="social">
                            <a href="mailto:' . $row['email'] . '"><i class="bi bi-envelope-fill"></i></a>
                            <a href="tel:' . $row['phone_num'] . '"><i class="bi bi-telephone-fill"></i></a>
                            <a href=""><i class="bi bi-chat-dots-fill"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>' . $row['firstname'] . " " . $middlenameInitial . ". " . $row['lastname'] . '</h4>
                        <span>Section: ' . $row['section'] . '</span>
                        <span>Profession: ' . $row['profession'] . '</span>
                        <span>Address: ' . $row['address'] . '</span>
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