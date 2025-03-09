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
    $securityQuestion = $_POST['securityQuestion'];
    $securityAnswer = $_POST['securityAnswer'];
    
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
    $stmt = $conn->prepare("UPDATE `$table_name` SET `section`=?, `profession`=?, `current_company_bus`=?, `phone_num`=?, `address`=?, `password`=?, `security_question`=?, `security_answe`=?, `profile_picture`=?, `user_status`=1 WHERE `alumni_id`=?");
    $stmt->bind_param("ssssssssss", $section, $profession, $company, $contact, $address, $hashed_password, $securityQuestion, $securityAnswer, $profile_pic, $_SESSION['user_cred']['alumni_id']);

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

function replaceExistingFile($target_file) {
    // Check if the file exists
    if (file_exists($target_file)) {
        // Attempt to delete the existing file
        if (!unlink($target_file)) {
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Error replacing existing file. Please try again.";
            $_SESSION['status_code'] = "error";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }
    }
    return true; // Indicate success
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    
    $id = $_SESSION['user_cred']['id'];
    $table = $_SESSION['user_cred']['table'];
    $type = $_SESSION['user_cred']['type'];
    $firstname = $_POST["firstname"];
    $middlename = $_POST["middlename"];
    $lastname = $_POST["lastname"];
    $company = $_POST["company"];
    $job = $_POST["job"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $awards = $_POST["awards"];
    $securityQuestion = $_POST["securityQuestion"];
    $securityAnswer = $_POST["securityAnswer"];

    $hashAnswer = password_hash($securityAnswer, PASSWORD_DEFAULT);

    // Handle file upload
    if (!empty($_FILES['profileImage']['name'])) {
        $target_dir = "uploads/" . $type . "/";
        $original_filename = basename($_FILES["profileImage"]["name"]);
        $new_filename = $_SESSION['user_cred']['alumni_id'] . "_" . $original_filename;
        $target_file = $target_dir . $new_filename;
        $file_extension = strtolower(pathinfo($original_filename, PATHINFO_EXTENSION));
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");
        
        // Validate file extension
        if (!in_array($file_extension, $allowed_extensions)) {
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
            $_SESSION['status_code'] = "error";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }

        // Check file size (1MB limit)
        if ($_FILES["profileImage"]["size"] > 1048576) { // Adjust the size as needed
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Your file is too large.";
            $_SESSION['status_code'] = "error";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }

        // Replace the existing file if it exists
        replaceExistingFile($target_file);

        // Upload the new file
        if (!move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Error uploading your file.";
            $_SESSION['status_code'] = "error";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }
    } else {
        $target_file = NULL; // No new file uploaded
    }

    // Use Prepared Statement to prevent SQL Injection
    $sql = "UPDATE $table SET 
                firstname = ?, 
                middlename = ?, 
                lastname = ?, 
                current_company_bus = ?, 
                profession = ?, 
                address = ?, 
                phone_num = ?, 
                email = ?,
                awards = ?,
                security_question = ?,
                security_answer = ?, 
                profile_picture = COALESCE(?, profile_picture) 
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssssssi",
        $firstname, 
        $middlename, 
        $lastname, 
        $company, 
        $job, 
        $address, 
        $phone, 
        $email,
        $awards,
        $securityQuestion,
        $hashAnswer,
        $target_file, 
        $id
    );

    if ($stmt->execute()) {
        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "Profile updated successfully.";
        $_SESSION['status_code'] = "success";
    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Error updating profile: " . $stmt->error;
        $_SESSION['status_code'] = "error";
    }

    $stmt->close();
    $conn->close();

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["changePassword"])) {
    
    // Get user ID from session
    $id = $_SESSION['user_cred']['id'];
    $table = $_SESSION['user_cred']['table'];

    // Get form inputs
    $currentPassword = $_POST["password"];
    $newPassword = $_POST["newpassword"];
    $renewPassword = $_POST["renewpassword"];

    // Validate if new passwords match
    if ($newPassword !== $renewPassword) {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "New passwords do not match.";
        $_SESSION['status_code'] = "error";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }

    // Fetch the current password hash from the database
    $sql = "SELECT password FROM $table WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();
    
    // If user exists, verify the password
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();
        
        if (password_verify($currentPassword, $hashedPassword)) {
            // Hash the new password before saving
            $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update the password in the database
            $updateSql = "UPDATE $table SET password = ? WHERE id = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param("si", $newHashedPassword, $id);

            if ($updateStmt->execute()) {
                $_SESSION['status'] = "Success";
                $_SESSION['status_text'] = "Password changed successfully.";
                $_SESSION['status_code'] = "success";
            } else {
                $_SESSION['status'] = "Error";
                $_SESSION['status_text'] = "Error updating password.";
                $_SESSION['status_code'] = "error";
            }

            $updateStmt->close();
        } else {
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Current password is incorrect.";
            $_SESSION['status_code'] = "error";
        }
    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "User not found.";
        $_SESSION['status_code'] = "error";
    }

    $stmt->close();
    $conn->close();

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
?>