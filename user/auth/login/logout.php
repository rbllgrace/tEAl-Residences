<?php
// Include necessary files and configurations
// ...

// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_login'])) {
    // Unset all session variables
    $_SESSION = array();


    // Destroy the session
    session_destroy();

    // Redirect to the login page or perform other actions
    header("Location: http://localhost/teal-residences/user/auth/login/login.php?logout=success");

    exit();
} else {
    // The user is not logged in
    // You can redirect to the login page or perform other actions
    header("Location: http://localhost/teal-residences/user/auth/login/login.php");

    exit();
}
