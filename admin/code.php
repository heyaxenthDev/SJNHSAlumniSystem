<?php
session_start();

include "includes/conn.php";

//JHS Faculty INSERT Code
// Check if the form is submitted
if (isset($_POST['addNewJHSFaculty'])) {
    // Include your database connection code Jere if not already included

    // Sanitize and retrieve form data
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $designation = mysqli_real_escape_string($conn, $_POST['designation']);
    $grade = mysqli_real_escape_string($conn, $_POST['grade']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);

    // Set default value for hs_type
    $hs_type = "JHS";

    // File upload
    $targetDir = "uploads/JHS/";
    $targetFile = $targetDir . basename($_FILES["profilePicture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["addNewFaculty"])) {
        $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["profilePicture"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["profilePicture"]["name"])) . " has been uploaded.";
            // Insert into database
            $sql = "INSERT INTO faculty (firstname, middlename, lastname, designation, hs_type, grade, sect_subj, profile_picture)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssssssss", $firstname, $middlename, $lastname, $designation, $hs_type, $grade, $section, $targetFile);
            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['status'] = "Success";
                $_SESSION['status_text'] = "New faculty added!";
                $_SESSION['status_code'] = "success";
                $_SESSION['status_btn'] = "Done";
                header("Location: juniorhs-faculty");
                // echo "New faculty added successfully!";
            } else {
                $_SESSION['status'] = "Error";
                $_SESSION['status_text'] = mysqli_error($conn);
                $_SESSION['status_code'] = "error";
                $_SESSION['status_btn'] = "Back";
                header("Location: juniorhs-faculty");
                // echo "Error: " . mysqli_error($conn);
            }
        } else {
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Sorry, there was an error uploading your file.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "Back";
            header("Location: juniorhs-faculty");
            // echo "Sorry, there was an error uploading your file.";
        }
    }

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

//SHS Faculty INSERT Code
// Check if the form is submitted
if (isset($_POST['addNewSHSFaculty'])) {
    // Include your database connection code here if not already included

    // Sanitize and retrieve form data
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $designation = mysqli_real_escape_string($conn, $_POST['designation']);
    $grade = mysqli_real_escape_string($conn, $_POST['grade']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);

    // Set default value for hs_type
    $hs_type = "SHS";

    // File upload
    $targetDir = "uploads/SHS/";
    $targetFile = $targetDir . basename($_FILES["profilePicture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["addNewFaculty"])) {
        $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["profilePicture"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["profilePicture"]["name"])) . " has been uploaded.";
            // Insert into database
            $sql = "INSERT INTO faculty (firstname, middlename, lastname, designation, hs_type, grade, sect_subj, profile_picture)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssssssss", $firstname, $middlename, $lastname, $designation, $hs_type, $grade, $section, $targetFile);
            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['status'] = "Success";
                $_SESSION['status_text'] = "New faculty added!";
                $_SESSION['status_code'] = "success";
                $_SESSION['status_btn'] = "Done";
                header("Location: seniorhs-faculty");
                // echo "New faculty added successfully!";
            } else {
                $_SESSION['status'] = "Error";
                $_SESSION['status_text'] = mysqli_error($conn);
                $_SESSION['status_code'] = "error";
                $_SESSION['status_btn'] = "Back";
                header("Location: seniorhs-faculty");
                // echo "Error: " . mysqli_error($conn);
            }
        } else {
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Sorry, there was an error uploading your file.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "Back";
            header("Location: seniorhs-faculty");
            // echo "Sorry, there was an error uploading your file.";
        }
    }

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}