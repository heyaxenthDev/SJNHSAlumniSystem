<?php
session_start();
include "includes/conn.php";

// Check if the form is submitted
if (isset($_POST['complete'])) {
    $hs_type = $_POST['hs_type'];
    $section = $_POST['section'];
    $profession = $_POST['profession'];
    $company = $_POST['company'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmPassword'];

    // Check if password and confirm password match
    if ($password !== $cpassword) {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Passwords do not match";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit(); // Stop further execution
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if a new profile picture is uploaded
    if (isset($_FILES["profilePicture"]["name"]) && !empty($_FILES["profilePicture"]["name"])) {
        // Handle the file upload
        $target_dir = "uploads/" . $hs_type . "/";
        $target_file = $target_dir . $_SESSION['user_cred']['alumni_id'] . "_" . basename($_FILES["profilePicture"]["name"]);

        // Check if the file already exists
        if (file_exists($target_file)) {
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Sorry, file already exists.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "ok";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit(); // Stop further execution
        }

        // Check file size
        if ($_FILES["profilePicture"]["size"] > 500000) { // Adjust the file size limit as needed
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Sorry, your file is too large.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "ok";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit(); // Stop further execution
        }

        // Allow certain file formats
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");
        $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (!in_array($file_extension, $allowed_extensions)) {
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "ok";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit(); // Stop further execution
        }

        // Attempt to move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
            // Update the profile picture in the database
            $profile_pic = $target_file;
        } else {
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Sorry, there was an error uploading your file.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "ok";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit(); // Stop further execution
        }
    } else {
        // No new profile picture uploaded, use the existing one
        $profile_pic = $_SESSION['user_cred']['profile_picture'];
    }


    // Determine the table name based on hs_type
    $table_name = ($hs_type == "SHS") ? "alumni_shs" : "alumni_jhs";

    // Prepare the update query
    $stmt = $conn->prepare("UPDATE `$table_name` SET `section`=?, `profession`=?, `current_company_bus`=?, `phone_num`=?, `address`=?, `password`=?, `profile_picture`=?, `user_status`=1 WHERE `alumni_id`=?");
    $stmt->bind_param("ssssssss", $section, $profession, $company, $contact, $address, $hashed_password, $profile_pic, $_SESSION['user_cred']['alumni_id']);

    // Execute the update query
    if ($stmt->execute()) {
        $_SESSION['status'] = "Complete!";
        $_SESSION['status_text'] = "Account updated successfully";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Done";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Error updating record:" . $conn->error;
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

    $stmt->close();
    $conn->close();
}