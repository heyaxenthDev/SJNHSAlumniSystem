<?php
session_start();

include "includes/conn.php";

//JHS Faculty INSERT Code
if (isset($_POST['addNewJHSFaculty'])) {

    // Sanitize and retrieve form data
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_num = mysqli_real_escape_string($conn, $_POST['phone_num']);
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
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["profilePicture"]["name"])) . " has been uploaded.";
            // Insert into database
            $sql = "INSERT INTO faculty (firstname, middlename, lastname, email, phone_num, designation, hs_type, grade, sect_subj, profile_picture)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssssssssss", $firstname, $middlename, $lastname, $email, $phone_num, $designation, $hs_type, $grade, $section, $targetFile);
            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['status'] = "Success";
                $_SESSION['status_text'] = "New faculty added!";
                $_SESSION['status_code'] = "success";
                $_SESSION['status_btn'] = "Done";
                header("Location: juniorhs-faculty");
            } else {
                $_SESSION['status'] = "Error";
                $_SESSION['status_text'] = mysqli_error($conn);
                $_SESSION['status_code'] = "error";
                $_SESSION['status_btn'] = "Back";
                header("Location: juniorhs-faculty");
            }
        } else {
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Sorry, there was an error uploading your file.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "Back";
            header("Location: juniorhs-faculty");
        }
    }

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}


//SHS Faculty INSERT Code
if (isset($_POST['addNewSHSFaculty'])) {
 
    // Sanitize and retrieve form data
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_num = mysqli_real_escape_string($conn, $_POST['phone_num']);
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
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["profilePicture"]["name"])) . " has been uploaded.";
            // Insert into database
            $sql = "INSERT INTO faculty (firstname, middlename, lastname, email, phone_num, designation, hs_type, grade, sect_subj, profile_picture)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssssssssss", $firstname, $middlename, $lastname, $email, $phone_num, $designation, $hs_type, $grade, $section, $targetFile);
            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['status'] = "Success";
                $_SESSION['status_text'] = "New faculty added!";
                $_SESSION['status_code'] = "success";
                $_SESSION['status_btn'] = "Done";
                header("Location: seniorhs-faculty");
            } else {
                $_SESSION['status'] = "Error";
                $_SESSION['status_text'] = mysqli_error($conn);
                $_SESSION['status_code'] = "error";
                $_SESSION['status_btn'] = "Back";
                header("Location: seniorhs-faculty");
            }
        } else {
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Sorry, there was an error uploading your file.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "Back";
            header("Location: seniorhs-faculty");
        }
    }

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}


if (isset($_POST['addNewSHSBatch'])) {

    // Sanitize and retrieve form data
    $batchyear = mysqli_real_escape_string($conn, $_POST['batchyear']);

    // Set default value for hs_type
    $hs_type = "SHS";

    // Prepare the SQL statement
    $sql = "INSERT INTO batchyear (batch_year, hs_type) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt, "ss", $batchyear, $hs_type);
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "New batch year added successfully!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Done";
        header("Location: seniorhs-alumni");
        // echo "New batch year added successfully!";
    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
        header("Location: seniorhs-faculty");
        // echo "Error: " . mysqli_error($conn);
    }

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

if (isset($_POST['addNewJHSBatch'])) {

    // Sanitize and retrieve form data
    $batchyear = mysqli_real_escape_string($conn, $_POST['batchyear']);

    // Set default value for hs_type
    $hs_type = "JHS";

    // Prepare the SQL statement
    $sql = "INSERT INTO batchyear (batch_year, hs_type) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt, "ss", $batchyear, $hs_type);
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "New batch year added successfully!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Done";
        header("Location: juniorhs-alumni");
        // echo "New batch year added successfully!";
    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
        header("Location: juniorhs-faculty");
        // echo "Error: " . mysqli_error($conn);
    }

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

if (isset($_POST['addNewJHSAlumni'])) {
 
    // Generate a unique alumni_id
    $prefix = "ALUM"; // You can use any prefix you prefer
    $alumni_id = $prefix . uniqid();

    // Sanitize and retrieve form data
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phone_num = mysqli_real_escape_string($conn, $_POST['phone_num']);
    $year_graduated = mysqli_real_escape_string($conn, $_POST['year_graduated']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);
    $profession = mysqli_real_escape_string($conn, $_POST['profession']);
    $marital_stat = mysqli_real_escape_string($conn, $_POST['marital_stat']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // File upload
    $targetDir = "uploads/JHSAlumni/";
    $targetFile = $targetDir . basename($_FILES["profilePicture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["addNewAlumniJHS"])) {
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
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["profilePicture"]["name"])) . " has been uploaded.";
            // Insert into database
            $sql = "INSERT INTO alumni_jhs (alumni_id, firstname, middlename, lastname, email, password, phone_num, year_graduated, section, profession, marital_stat, address, profile_picture)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sssssssssssss", $alumni_id, $firstname, $middlename, $lastname, $email, $password, $phone_num, $year_graduated, $section, $profession, $marital_stat, $address, $targetFile);
                if (mysqli_stmt_execute($stmt)) {
                $_SESSION['status'] = "Success";
                $_SESSION['status_text'] = "New alumni added!";
                $_SESSION['status_code'] = "success";
                $_SESSION['status_btn'] = "Done";
                header("Location: {$_SERVER['HTTP_REFERER']}");
            } else {
                $_SESSION['status'] = "Error";
                $_SESSION['status_text'] = mysqli_error($conn);
                $_SESSION['status_code'] = "error";
                $_SESSION['status_btn'] = "Back";
                header("Location: {$_SERVER['HTTP_REFERER']}");
            }
        } else {
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Sorry, there was an error uploading your file.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "Back";
            header("Location: {$_SERVER['HTTP_REFERER']}");
        }
    }

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}