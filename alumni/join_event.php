<?php
session_start();
require 'includes/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "You must be logged in to join an event.";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Ok";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $event_code = $_POST['event_code'];

    if (empty($event_code)) {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Event code is missing.";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Ok";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }

    $conn = new mysqli("localhost", "root", "", "your_database_name");

    if ($conn->connect_error) {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Database connection failed.";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Ok";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }

    // Check if user already joined
    $check_sql = "SELECT * FROM event_participants WHERE user_id = ? AND event_code = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("ss", $user_id, $event_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "You have already joined this event.";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Ok";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }

    // Insert user into event
    $sql = "INSERT INTO event_participants (user_id, event_code) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user_id, $event_code);

    if ($stmt->execute()) {
        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "You have joined the event!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Ok";
    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Something went wrong. Please try again.";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Ok";
    }

    $stmt->close();
    $conn->close();

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
?>