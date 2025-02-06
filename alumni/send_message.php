<?php
session_start();
require 'includes/conn.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conversationID = $_POST["conversationID"];
    $outgoing_msg_id = $_POST["outgoing_msg_id"];
    $msg_content = $_POST["msg_content"];
    $timestamp = date("Y-m-d H:i:s");

    // Insert the new message into the database
    $sql = "INSERT INTO chat (conversationID, outgoing_msg_id, msg_content, timestamp)
            VALUES ('$conversationID', '$outgoing_msg_id', '$msg_content', '$timestamp')";

    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>