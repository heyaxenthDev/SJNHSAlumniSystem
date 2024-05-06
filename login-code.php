<?php
session_start();

include "includes/conn.php";

if (isset($_POST['adminLogin'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $login_query = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'";
    $login_query_run = mysqli_query($conn, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $_SESSION['admin_auth'] = true;
        $_SESSION['logged'] = "Logged in successfully";
        $_SESSION['logged_icon'] = "success";
        header("Location: admin/dashboard.php");
    } else {
        // $_SESSION['set'] = "show";
        // $_SESSION['id'] = $username;
        $_SESSION['status'] = "Wrong Username or Password";
        $_SESSION['status_text'] = "Please check your credentials.";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "ok";
        header("Location: index.php");
    }
}

if (isset($_POST['alumniLogin'])) {

    $type = $conn->real_escape_string($_POST['typeGrad']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    switch ($type) {
        case "SHS":
            loginAlumni($conn, $type, $email, $password, "alumni_shs");
            break;
        case "JHS":
            loginAlumni($conn, $type, $email, $password, "alumni_jhs");
            break;
        default:
            // Handle unknown type
            break;
    }
}

function loginAlumni($conn, $type, $email, $password, $table)
{
    $query = "SELECT * FROM `$table` WHERE `email` = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_auth'] = true;
            $_SESSION['user_cred'] = [
                'alumni_id' => $row['alumni_id'],
                'id' => $row['id'],
                'type' => $type,
            ];
            $_SESSION['logged'] = "Logged in successfully";
            $_SESSION['logged_icon'] = "success";
            header("Location: alumni/feed.php");
        } else {
            $_SESSION['entered_email'] = $email;
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Incorrect password! Please try again.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "ok";
            header("Location: alumni-login.php?Type=$type");
        }
    } else {
        $_SESSION['status'] = "Wrong Username or Password";
        $_SESSION['status_text'] = "Please check your credentials.";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "ok";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }
}