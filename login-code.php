<?php
session_start();

include "includes/conn.php";

if (isset($_POST['adminLogin'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $login_query = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password' LIMIT 1";
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
