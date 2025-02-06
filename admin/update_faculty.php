<?php
session_start();
require 'includes/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $faculty_id = $_POST['faculty_id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone_num = $_POST['phone_num'];
    $designation = $_POST['designation'];
    $grade = $_POST['grade'];
    $sect_subj = $_POST['section'];

    $profile_picture = null;

    // Check if a new profile picture is uploaded
    if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['size'] > 0) {
        $target_dir = "uploads/"; // Directory where images will be stored
        $target_file = $target_dir . basename($_FILES["profilePicture"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file is an actual image
        $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
        if ($check === false) {
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "File is not an image.";
            $_SESSION['status_code'] = "error";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }

        // Check file size (max 2MB)
        if ($_FILES["profilePicture"]["size"] > 2000000) {
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Sorry, file is too large.";
            $_SESSION['status_code'] = "error";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }

        // Allow only JPG, JPEG, PNG
        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Only JPG, JPEG & PNG files are allowed.";
            $_SESSION['status_code'] = "error";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }

        // Move uploaded file to the server
        if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
            $profile_picture = basename($_FILES["profilePicture"]["name"]);
        } else {
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "There was an error uploading your file.";
            $_SESSION['status_code'] = "error";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }
    }

    // Prepare SQL statement (Update faculty details)
    if ($profile_picture) {
        // If profile picture is updated
        $sql = "UPDATE faculty SET 
                firstname = ?, 
                middlename = ?, 
                lastname = ?, 
                email = ?, 
                phone_num = ?, 
                designation = ?, 
                grade = ?, 
                sect_subj = ?, 
                profile_picture = ? 
                WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssi", $firstname, $middlename, $lastname, $email, $phone_num, $designation, $grade, $sect_subj, $profile_picture, $faculty_id);
    } else {
        // If profile picture is NOT updated
        $sql = "UPDATE faculty SET 
                firstname = ?, 
                middlename = ?, 
                lastname = ?, 
                email = ?, 
                phone_num = ?, 
                designation = ?, 
                grade = ?, 
                sect_subj = ? 
                WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssi", $firstname, $middlename, $lastname, $email, $phone_num, $designation, $grade, $sect_subj, $faculty_id);
    }

    if ($stmt->execute()) {
        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "Faculty record updated successfully!";
        $_SESSION['status_code'] = "success";
    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Something went wrong.";
        $_SESSION['status_code'] = "error";
    }

    $stmt->close();
    $conn->close();

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
} else {
    $_SESSION['status'] = "Error";
    $_SESSION['status_text'] = "Invalid request.";
    $_SESSION['status_code'] = "error";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
?>