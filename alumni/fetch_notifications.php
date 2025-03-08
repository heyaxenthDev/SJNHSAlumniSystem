<?php
include "includes/conn.php";


$query = "SELECT * FROM events ORDER BY date_created DESC LIMIT 5";
$result = $conn->query($query);

$notifications = [];
while ($row = $result->fetch_assoc()) {
    $notifications[] = $row;
}

echo json_encode($notifications);
?>