<?php
session_start();

include "includes/conn.php";

if (isset($_POST['editNews'])) {
    
    $id = $_POST['id'];
    $editTitle = mysqli_real_escape_string($conn, $_POST['editTitle']);
    $editContent = mysqli_real_escape_string($conn, $_POST['editContent']);
    $editPublicationDate = mysqli_real_escape_string($conn, $_POST['editPublicationDate']);
    $editStatus = mysqli_real_escape_string($conn, $_POST['editStatus']);

    // Check if a new picture was uploaded
    if ($_FILES['editPicture']['name'] != '') {
        $targetDir = "uploads/news/";
        $editPicture = $targetDir . basename($_FILES["editPicture"]["name"]);
        $editPictureTemp = $_FILES['editPicture']['tmp_name'];
        if (move_uploaded_file($editPictureTemp, $editPicture)) {
            $sql = "UPDATE `news` SET `title`='$editTitle', `content`='$editContent', `publication_date`='$editPublicationDate', `newsStatus`='$editStatus', `newsPicture`='$editPicture' WHERE `id`='$id'";
        } else {
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Error uploading picture";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "Back";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }
    } else {
        $sql = "UPDATE `news` SET `title`='$editTitle', `content`='$editContent', `publication_date`='$editPublicationDate', `newsStatus`='$editStatus' WHERE `id`='$id'";
    }

    if (mysqli_query($conn, $sql)) {
        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "News updated successfully";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Done";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Error updating record: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }
}


if (isset($_POST['editEvent'])) {
    // Sanitize and retrieve form data
    $id = mysqli_real_escape_string($conn, $_POST['eventid']);
    $eventName = mysqli_real_escape_string($conn, $_POST['eventName']);
    $eventDate = mysqli_real_escape_string($conn, $_POST['eventDate']);
    $eventStatus = mysqli_real_escape_string($conn, $_POST['eventStatus']);
    $eventLocation = mysqli_real_escape_string($conn, $_POST['eventLocation']);
    $eventDescription = mysqli_real_escape_string($conn, $_POST['eventDescription']);

    // Check if a new picture was uploaded
    if ($_FILES['eventPicture']['name'] != '') {
        $targetDir = "uploads/events/";
        $eventPicture = $targetDir . basename($_FILES["eventPicture"]["name"]);
        $eventPictureTemp = $_FILES['eventPicture']['tmp_name'];
        if (move_uploaded_file($eventPictureTemp, $eventPicture)) {
            $sql = "UPDATE events SET eventName='$eventName', eventDate='$eventDate', eventStatus='$eventStatus', eventLocation='$eventLocation', eventDescription='$eventDescription', eventPicture='$eventPicture' WHERE id='$id'";
        } else {
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Error uploading picture";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "Back";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }
    } else {
        $sql = "UPDATE events SET eventName='$eventName', eventDate='$eventDate', eventStatus='$eventStatus', eventLocation='$eventLocation', eventDescription='$eventDescription' WHERE id='$id'";
    }

    if (mysqli_query($conn, $sql)) {
        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "Event updated successfully";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Done";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Error updating event: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }

    // Close the database connection
    mysqli_close($conn);
}

?>