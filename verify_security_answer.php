<?php
session_start();
include 'includes/conn.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $answer = $_POST["answer"];
    $type = $_POST["type"];
    ($type == "SHS") ? $table = "alumni_shs" : $table = "alumni_jhs";


    $stmt = $conn->prepare("SELECT security_answer FROM $table WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($hashed_answer);
    
    if ($stmt->fetch() && password_verify($answer, $hashed_answer)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }

    $stmt->close();
}
?>