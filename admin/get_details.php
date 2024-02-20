<?php
session_start();

include "includes/conn.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    // Fetch news details from the database
    $sql = "SELECT * FROM news WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "
            <form method='POST' action='update.php' enctype='multipart/form-data'>
                <input type='hidden' name='id' value='{$row['id']}'>
                
                <div class='row mb-4 mt-2'>
                    <div class='col-lg-12 col-md-12'>
                        <center>
                            <img src='{$row['newsPicture']}' id='newsPicturePreview'  alt='News Picture' style='max-width: 100%; max-height: 300px;'><br>
                        </center>
                            <input type='file' name='editPicture' id='editPicture' class='form-control mt-2' onchange='previewEditNewsPicture();' accept='image/*'>
                        </div>
                    <script src='js/scripts.js'></script>
                </div>
            
                <div class='mb-3'>
                    <label for='editTitle' class='form-label'>Title</label>
                    <input type='text' class='form-control' id='editTitle' name='editTitle' value='{$row['title']}'>
                </div>
                <div class='mb-3'>
                    <label for='editContent' class='form-label'>Content</label>
                    <textarea class='form-control' id='editContent' name='editContent' rows='3'>{$row['content']}</textarea>
                </div>
                <div class='mb-3'>
                    <label for='editPublicationDate' class='form-label'>Publication Date</label>
                    <input type='date' class='form-control' id='editPublicationDate' name='editPublicationDate' value='{$row['publication_date']}'>
                </div>
                <div class='mb-3'>
                    <label for='editStatus' class='form-label'>Status</label>
                    <select class='form-select' id='editStatus' name='editStatus'>
                        <option value='1' " . ($row['newsStatus'] == '1' ? 'selected' : '') . ">Published</option>
                        <option value='2' " . ($row['newsStatus'] == '2' ? 'selected' : '') . ">Draft</option>
                    </select>
                </div>
                
                <div class='d-grid gap-2 d-md-flex justify-content-md-center'>
                    <button class='btn rounded-5 text-white' type='submit' style='background-color: #013220;' name='editNews'><i class='bi bi-pencil'></i> Save Changes</button>
                </div>
            </form>";

        // Trigger the modal
        echo "<script>$('#editNewsModal').modal('show');</script>";
    } else {
        echo "News not found";
    }
}

if (isset($_POST['eventid'])) {
    $id = $_POST['eventid'];
    // Fetch events details from the database
    $sql = "SELECT * FROM events WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "
        <form class='row g-3' method='POST' action='update.php' enctype='multipart/form-data'>
            <input type='hidden' name='eventid' value='{$row['id']}'>
            
            <div class='row mb-4 mt-2'>
                <div class='col-lg-12 col-md-12'>
                    <center>
                        <img src='{$row['eventPicture']}' id='eventPicturePreview' alt='Event Picture Preview' style='max-width: 100%; max-height: 300px;'><br>
                    </center>
                    <input type='file' name='eventPicture' class='form-control mt-2' id='eventPicture' onchange='previewEventPicture();' accept='image/*'>
                </div>
                <script src='js/scripts.js'></script>
            </div>
        
            <div class='row'>
                <div class='col-lg-6 col-md-6 mb-2'>
                    <label for='eventName' class='form-label'>Event Name</label>
                    <input type='text' name='eventName' class='form-control' id='eventName' value='{$row['eventName']}' required>
                </div>
        
                <div class='col-lg-6 col-md-6 mb-2'>
                    <label for='eventDate' class='form-label'>Event Date</label>
                    <input type='date' name='eventDate' class='form-control' id='eventDate' value='{$row['eventDate']}' required>
                </div>
            </div>
        
            <div class='row'>
                <div class='col-lg-12 col-md-12 mb-2'>
                    <label for='eventStatus' class='form-label'>Event Status</label>
                    <select name='eventStatus' class='form-select' id='eventStatus' required>
                        <option value=''>Select Status</option>
                        <option value='1' class='text-success' " . ($row['eventStatus'] == '1' ? 'selected' : '') . ">On-going</option>
                        <option value='2' class='text-primary' " . ($row['eventStatus'] == '2' ? 'selected' : '') . ">Upcoming</option>
                        <option value='3' class='text-warning' " . ($row['eventStatus'] == '3' ? 'selected' : '') . ">Postponed</option>
                        <!-- <option value='4' class='text-danger'>Ended</option> -->
                    </select>
                </div>
            </div>
        
            <div class='row'>
                <div class='col-lg-12 col-md-12 mb-2'>
                    <label for='eventLocation' class='form-label'>Event Location</label>
                    <input type='text' name='eventLocation' class='form-control' id='eventLocation' value='{$row['eventLocation']}' required>
                </div>
        
                <div class='col-lg-12 col-md-12 mb-2'>
                    <label for='eventDescription' class='form-label'>Event Description</label>
                    <textarea name='eventDescription' class='form-control' id='eventDescription' rows='2' required>{$row['eventDescription']}</textarea>
                </div>
            </div>
        
            <div class='d-grid gap-2 d-md-flex justify-content-md-center'>
                <button class='btn rounded-5 text-white' type='submit' style='background-color: #013220;' name='editEvent'><i class='bi bi-pencil'></i> Save Changes</button>
            </div>
        </form>";
        // Trigger the modal
        echo "<script>$('#editNewsModal').modal('show');</script>";
    } else {
        echo "Event not found";
    }
}