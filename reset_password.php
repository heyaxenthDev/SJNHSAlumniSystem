<?php
session_start();
include 'includes/conn.php'; // Database connection

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $newPassword = password_hash($_POST["newPassword"], PASSWORD_BCRYPT);
    $type = $_POST["type"];

    $validTables = ["alumni_shs", "alumni_jhs"];
    $table = ($type == "SHS") ? "alumni_shs" : "alumni_jhs";

    if (!in_array($table, $validTables)) {
        echo json_encode(["status" => "error", "message" => "Invalid request."]);
        exit();
    }

    // Check if email exists
    $stmt = $conn->prepare("SELECT email FROM $table WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 0) {
        echo json_encode(["status" => "error", "message" => "Email not found."]);
        exit();
    }

    $stmt->close();

    // Update password
    $stmt = $conn->prepare("UPDATE $table SET password = ? WHERE email = ?");
    $stmt->bind_param("ss", $newPassword, $email);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Password changed successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "There was an issue resetting your password. Please try again."]);
    }

    $stmt->close();
    $conn->close();
    exit();
}
?>