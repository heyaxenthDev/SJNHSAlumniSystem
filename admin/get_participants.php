<?php
session_start();

include "includes/conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eventCode'])) {
    $eventCode = mysqli_real_escape_string($conn, $_POST['eventCode']);

    $sql = "SELECT ep.alumni_id, ep.joined_at, 
            COALESCE(aj.firstname, ash.firstname) AS firstname,
            COALESCE(aj.lastname, ash.lastname) AS lastname,
            CASE 
                WHEN aj.alumni_id IS NOT NULL THEN 'JHS'
                WHEN ash.alumni_id IS NOT NULL THEN 'SHS'
                ELSE 'Unknown' 
            END AS type
            FROM event_participants ep
            LEFT JOIN alumni_jhs aj ON ep.alumni_id = aj.alumni_id
            LEFT JOIN alumni_shs ash ON ep.alumni_id = ash.alumni_id
            WHERE ep.event_code = '$eventCode'";

    $result = mysqli_query($conn, $sql);
    $participants = [];
    $totalJHS = 0;
    $totalSHS = 0;

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['type'] === 'JHS') {
                $totalJHS++;
            } elseif ($row['type'] === 'SHS') {
                $totalSHS++;
            }

            $participants[] = $row;
        }
    }

    echo json_encode([
        'success' => true,
        'participants' => $participants,
        'total' => count($participants),
        'totalJHS' => $totalJHS,
        'totalSHS' => $totalSHS
    ]);
    exit();
}

echo json_encode(['success' => false, 'message' => 'Invalid request']);
?>