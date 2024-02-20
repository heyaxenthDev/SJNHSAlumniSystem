<?php
include 'includes/conn.php';

if (isset($_POST['query'])) {
    $query = $_POST['query'];
    $sql = "SELECT * FROM alumni_jhs WHERE `firstname` LIKE '%$query%' OR `lastname` LIKE '%$query%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="result">' . $row['firstname'] . ' ' . $row['lastname'] . '</div>';
        }
    } else {
        echo 'No results found.';
    }
}

// Close the database connection
mysqli_close($conn);
?>