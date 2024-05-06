<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    // Get the current user's unique_id
    $outgoing_id = $_SESSION['unique_id'];
    // Get the incoming_id from the POST request (the user the current user is chatting with)
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $output = "";
    // Select messages between the current user and the other user, joining with the users table to get user information
    $sql = "SELECT * FROM chat 
                LEFT JOIN users ON users.unique_id = chat.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) 
                ORDER BY msg_id";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            // Determine if the message is outgoing or incoming based on the outgoing_msg_id
            $messageType = ($row['outgoing_msg_id'] === $outgoing_id) ? "outgoing" : "incoming";
            // Build the chat message HTML based on the message type
            $output .= '<div class="chat ' . $messageType . '">
                                <img src="php/images/' . $row['img'] . '" alt="">
                                <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                </div>
                            </div>';
        }
    } else {
        // Display a message if no messages are available
        $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
    }
    // Output the chat messages HTML
    echo $output;
} else {
    // Redirect to login page if session unique_id is not set
    header("location: ../login.php");
}