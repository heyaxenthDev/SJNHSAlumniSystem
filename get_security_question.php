<?php
session_start();
include 'includes/conn.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $type = $_POST["type"];
    ($type == "SHS") ? $table = "alumni_shs" : $table = "alumni_jhs";
    
    $stmt = $conn->prepare("SELECT security_question FROM $table WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($question);
    
    if ($stmt->fetch()) {
        echo json_encode(["success" => true, "question" => $question]);
        // $_SESSION["table"] = $table;
        
    } else {
        echo json_encode(["success" => false]);
    }
    
    $stmt->close();
}
?>