<?php


// auth.php
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or perform other actions
    header("Location: http://localhost/teal-residences/user/auth/login/login.php");
    exit();
}
