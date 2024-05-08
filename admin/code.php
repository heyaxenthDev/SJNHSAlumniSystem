<?php
session_start();

include "includes/conn.php";

/*--------------------------------------------------------------
# Add New People and Batch to the database
--------------------------------------------------------------*/

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
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "File is not an image.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "Back";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            // echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["profilePicture"]["size"] > 500000) {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Sorry, your file is too large.";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        // echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
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
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "File is not an image.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "Back";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            // echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["profilePicture"]["size"] > 500000) {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Sorry, your file is too large.";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        // echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
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
        header("Location: {$_SERVER['HTTP_REFERER']}");
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
        header("Location: {$_SERVER['HTTP_REFERER']}");
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

    // Insert into database
    $sql = "INSERT INTO alumni_jhs (alumni_id, firstname, middlename, lastname, email, password, phone_num, year_graduated, section, profession, marital_stat, address)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssssss", $alumni_id, $firstname, $middlename, $lastname, $email, $password, $phone_num, $year_graduated, $section, $profession, $marital_stat, $address);

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

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}


// if (isset($_POST['addNewJHSAlumni'])) {

//     // Generate a unique alumni_id
//     $prefix = "ALUM"; // You can use any prefix you prefer
//     $alumni_id = $prefix . uniqid();

//     // Sanitize and retrieve form data
//     $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
//     $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
//     $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
//     $email = mysqli_real_escape_string($conn, $_POST['email']);
//     $password = mysqli_real_escape_string($conn, $_POST['password']);
//     $phone_num = mysqli_real_escape_string($conn, $_POST['phone_num']);
//     $year_graduated = mysqli_real_escape_string($conn, $_POST['year_graduated']);
//     $section = mysqli_real_escape_string($conn, $_POST['section']);
//     $profession = mysqli_real_escape_string($conn, $_POST['profession']);
//     $marital_stat = mysqli_real_escape_string($conn, $_POST['marital_stat']);
//     $address = mysqli_real_escape_string($conn, $_POST['address']);

//     // File upload
//     $targetDir = "uploads/JHSAlumni/";
//     $targetFile = $targetDir . basename($_FILES["profilePicture"]["name"]);
//     $uploadOk = 1;
//     $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

//     // Check if image file is a actual image or fake image
//     if (isset($_POST["addNewAlumniJHS"])) {
//         $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
//         if ($check !== false) {
//             echo "File is an image - " . $check["mime"] . ".";
//             $uploadOk = 1;
//         } else {
//             $_SESSION['status'] = "Error";
//             $_SESSION['status_text'] = "File is not an image.";
//             $_SESSION['status_code'] = "error";
//             $_SESSION['status_btn'] = "Back";
//             header("Location: {$_SERVER['HTTP_REFERER']}");
//             // echo "File is not an image.";
//             $uploadOk = 0;
//         }
//     }

//     // Check file size
//     if ($_FILES["profilePicture"]["size"] > 500000) {
//         $_SESSION['status'] = "Error";
//         $_SESSION['status_text'] = "Sorry, your file is too large.";
//         $_SESSION['status_code'] = "error";
//         $_SESSION['status_btn'] = "Back";
//         header("Location: {$_SERVER['HTTP_REFERER']}");
//         // echo "Sorry, your file is too large.";
//         $uploadOk = 0;
//     }

//     // Allow certain file formats
//     if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
//         $_SESSION['status'] = "Error";
//         $_SESSION['status_text'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//         $_SESSION['status_code'] = "error";
//         $_SESSION['status_btn'] = "Back";
//         header("Location: {$_SERVER['HTTP_REFERER']}");
//         // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//         $uploadOk = 0;
//     }

//     // Check if $uploadOk is set to 0 by an error
//     if ($uploadOk == 0) {
//         echo "Sorry, your file was not uploaded.";
//     } else {
//         if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $targetFile)) {
//             echo "The file " . htmlspecialchars(basename($_FILES["profilePicture"]["name"])) . " has been uploaded.";
//             // Insert into database
//             $sql = "INSERT INTO alumni_jhs (alumni_id, firstname, middlename, lastname, email, password, phone_num, year_graduated, section, profession, marital_stat, address, profile_picture)
//             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
//             $stmt = mysqli_prepare($conn, $sql);
//             mysqli_stmt_bind_param($stmt, "sssssssssssss", $alumni_id, $firstname, $middlename, $lastname, $email, $password, $phone_num, $year_graduated, $section, $profession, $marital_stat, $address, $targetFile);
//                 if (mysqli_stmt_execute($stmt)) {
//                 $_SESSION['status'] = "Success";
//                 $_SESSION['status_text'] = "New alumni added!";
//                 $_SESSION['status_code'] = "success";
//                 $_SESSION['status_btn'] = "Done";
//                 header("Location: {$_SERVER['HTTP_REFERER']}");
//             } else {
//                 $_SESSION['status'] = "Error";
//                 $_SESSION['status_text'] = mysqli_error($conn);
//                 $_SESSION['status_code'] = "error";
//                 $_SESSION['status_btn'] = "Back";
//                 header("Location: {$_SERVER['HTTP_REFERER']}");
//             }
//         } else {
//             $_SESSION['status'] = "Error";
//             $_SESSION['status_text'] = "Sorry, there was an error uploading your file.";
//             $_SESSION['status_code'] = "error";
//             $_SESSION['status_btn'] = "Back";
//             header("Location: {$_SERVER['HTTP_REFERER']}");
//         }
//     }

//     // Close the statement and database connection
//     mysqli_stmt_close($stmt);
//     mysqli_close($conn);
// }

if (isset($_POST['addNewSHSAlumni'])) {
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
    $track = mysqli_real_escape_string($conn, $_POST['track']);
    $profession = mysqli_real_escape_string($conn, $_POST['profession']);
    $marital_stat = mysqli_real_escape_string($conn, $_POST['marital_stat']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // Insert into database
    $sql = "INSERT INTO alumni_shs (alumni_id, firstname, middlename, lastname, email, password, phone_num, year_graduated, track, profession, marital_stat, address)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssssss", $alumni_id, $firstname, $middlename, $lastname, $email, $password, $phone_num, $year_graduated, $track, $profession, $marital_stat, $address);

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

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}


// if (isset($_POST['addNewSHSAlumni'])) {
//     // Generate a unique alumni_id
//     $prefix = "ALUM"; // You can use any prefix you prefer
//     $alumni_id = $prefix . uniqid();

//     // Sanitize and retrieve form data
//     $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
//     $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
//     $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
//     $email = mysqli_real_escape_string($conn, $_POST['email']);
//     $password = mysqli_real_escape_string($conn, $_POST['password']);
//     $phone_num = mysqli_real_escape_string($conn, $_POST['phone_num']);
//     $year_graduated = mysqli_real_escape_string($conn, $_POST['year_graduated']);
//     $track = mysqli_real_escape_string($conn, $_POST['track']);
//     $profession = mysqli_real_escape_string($conn, $_POST['profession']);
//     $marital_stat = mysqli_real_escape_string($conn, $_POST['marital_stat']);
//     $address = mysqli_real_escape_string($conn, $_POST['address']);

//     // File upload
//     $targetDir = "uploads/SHSAlumni/";
//     $targetFile = $targetDir . basename($_FILES["profilePicture"]["name"]);
//     $uploadOk = 1;
//     $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

//     // Check if image file is a actual image or fake image
//     if (isset($_POST["addNewSHSAlumni"])) {
//         $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
//         if ($check !== false) {
//             echo "File is an image - " . $check["mime"] . ".";
//             $uploadOk = 1;
//         } else {
//             $_SESSION['status'] = "Error";
//             $_SESSION['status_text'] = "File is not an image.";
//             $_SESSION['status_code'] = "error";
//             $_SESSION['status_btn'] = "Back";
//             header("Location: {$_SERVER['HTTP_REFERER']}");
//             // echo "File is not an image.";
//             $uploadOk = 0;
//         }
//     }

//     // Check file size
//     if ($_FILES["profilePicture"]["size"] > 500000) {
//         $_SESSION['status'] = "Error";
//         $_SESSION['status_text'] = "Sorry, your file is too large.";
//         $_SESSION['status_code'] = "error";
//         $_SESSION['status_btn'] = "Back";
//         header("Location: {$_SERVER['HTTP_REFERER']}");
//         // echo "Sorry, your file is too large.";
//         $uploadOk = 0;
//     }

//     // Allow certain file formats
//     if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
//         $_SESSION['status'] = "Error";
//         $_SESSION['status_text'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//         $_SESSION['status_code'] = "error";
//         $_SESSION['status_btn'] = "Back";
//         header("Location: {$_SERVER['HTTP_REFERER']}");
//         // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//         $uploadOk = 0;
//     }

//     // Check if $uploadOk is set to 0 by an error
//     if ($uploadOk == 0) {
//         echo "Sorry, your file was not uploaded.";
//     } else {
//         if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $targetFile)) {
//             echo "The file " . htmlspecialchars(basename($_FILES["profilePicture"]["name"])) . " has been uploaded.";
//             // Insert into database
//             $sql = "INSERT INTO alumni_shs (alumni_id, firstname, middlename, lastname, email, password, phone_num, year_graduated, track, profession, marital_stat, address, profile_picture)
//             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
//             $stmt = mysqli_prepare($conn, $sql);
//             mysqli_stmt_bind_param($stmt, "sssssssssssss", $alumni_id, $firstname, $middlename, $lastname, $email, $password, $phone_num, $year_graduated, $track, $profession, $marital_stat, $address, $targetFile);
//             if (mysqli_stmt_execute($stmt)) {
//                 $_SESSION['status'] = "Success";
//                 $_SESSION['status_text'] = "New alumni added!";
//                 $_SESSION['status_code'] = "success";
//                 $_SESSION['status_btn'] = "Done";
//                 header("Location: {$_SERVER['HTTP_REFERER']}");
//             } else {
//                 $_SESSION['status'] = "Error";
//                 $_SESSION['status_text'] = mysqli_error($conn);
//                 $_SESSION['status_code'] = "error";
//                 $_SESSION['status_btn'] = "Back";
//                 header("Location: {$_SERVER['HTTP_REFERER']}");
//             }
//         } else {
//             $_SESSION['status'] = "Error";
//             $_SESSION['status_text'] = "Sorry, there was an error uploading your file.";
//             $_SESSION['status_code'] = "error";
//             $_SESSION['status_btn'] = "Back";
//             header("Location: {$_SERVER['HTTP_REFERER']}");
//         }
//     }

//     // Close the statement and database connection
//     mysqli_stmt_close($stmt);
//     mysqli_close($conn);
// }


/*--------------------------------------------------------------
# Add Events and News to database
--------------------------------------------------------------*/

if (isset($_POST['addNewEvent'])) {
    // Generate a unique event id
    $prefix = "EVENT"; // You can use any prefix you prefer
    $event_id = $prefix . uniqid();

    // Sanitize and retrieve form data
    $eventName = mysqli_real_escape_string($conn, $_POST['eventName']);
    $eventDate = mysqli_real_escape_string($conn, $_POST['eventDate']);
    $eventStatus = mysqli_real_escape_string($conn, $_POST['eventStatus']); // New field
    $eventLocation = mysqli_real_escape_string($conn, $_POST['eventLocation']);
    $eventDescription = mysqli_real_escape_string($conn, $_POST['eventDescription']);

    // File upload
    $targetDir = "uploads/events/";
    $targetFile = $targetDir . basename($_FILES["eventPicture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    if (isset($_POST["addNewEvent"])) {
        $check = getimagesize($_FILES["eventPicture"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "File is not an image.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "Back";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            // echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["eventPicture"]["size"] > 500000) {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Sorry, your file is too large.";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        // echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["eventPicture"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["eventPicture"]["name"])) . " has been uploaded.";
            // Insert into database
            $sql = "INSERT INTO events (eventsCode, eventName, eventDate, eventStatus, eventLocation, eventDescription, eventPicture)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sssssss", $event_id, $eventName, $eventDate, $eventStatus, $eventLocation, $eventDescription, $targetFile);
            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['status'] = "Success";
                $_SESSION['status_text'] = "New event added!";
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

if (isset($_POST['addNewNews'])) {
    // Generate a unique news id
    $prefix = "NEWS"; // You can use any prefix you prefer
    $news_id = $prefix . uniqid();

    // Sanitize and retrieve form data
    $newsTitle = mysqli_real_escape_string($conn, $_POST['newsTitle']);
    $newsContent = mysqli_real_escape_string($conn, $_POST['newsContent']);
    $publicationDate = mysqli_real_escape_string($conn, $_POST['publicationDate']);
    $newsStatus = mysqli_real_escape_string($conn, $_POST['newsStatus']);

    // File upload
    $targetDir = "uploads/news/";
    $targetFile = $targetDir . basename($_FILES["newsPicture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    if (isset($_POST["addNewNews"])) {
        $check = getimagesize($_FILES["newsPicture"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "File is not an image.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "Back";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            // echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["newsPicture"]["size"] > 500000) {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Sorry, your file is too large.";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        // echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["newsPicture"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["newsPicture"]["name"])) . " has been uploaded.";
            // Insert into database
            $sql = "INSERT INTO news (newsCode, title, content, publication_date, newsStatus, newsPicture)
            VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssssss", $news_id, $newsTitle, $newsContent, $publicationDate, $newsStatus, $targetFile);
            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['status'] = "Success";
                $_SESSION['status_text'] = "New news added!";
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

/*--------------------------------------------------------------
# Edit Data Code Queries
--------------------------------------------------------------*/


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
    // Close the database connection
    mysqli_close($conn);
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