<?php
session_start();
require "includes/conn.php";

$table = $_SESSION['user_cred']['table'];
$loggedInUserId = $_SESSION['user_cred']['alumni_id']; // Get logged-in user ID

$query = "SELECT c.msg_id, c.conversationID, c.outgoing_msg_id, c.msg_content, c.timestamp, 
                 u.firstname AS sender_name, u.profile_picture 
          FROM chat c
          JOIN $table u ON c.outgoing_msg_id = u.alumni_id
          WHERE c.outgoing_msg_id != ?  -- Exclude messages from the logged-in user
          ORDER BY c.timestamp DESC 
          LIMIT 5";

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $loggedInUserId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$messages = [];
while ($row = mysqli_fetch_assoc($result)) {
    $messages[] = $row;
}

echo json_encode($messages);
?>