<?php
require('../../connection/connect.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_GET['token'];
    echo $token;
    $new_password = $_POST['new_password'];


    // Check if the token is valid
    $stmt = $conn->prepare("SELECT email FROM password_reset WHERE token = ? AND expiration_time > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->bind_result($email);
    $result = $stmt->fetch();
    $stmt->close();

    if ($result) {
        // Update the user's password in the database
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE user_table SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashed_password, $email);
        $stmt->execute();
        $stmt->close();

        // Remove the used token from the password_reset table
        $stmt = $conn->prepare("DELETE FROM password_reset WHERE token = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $stmt->close();

        echo "Password successfully reset.";
    } else {
        $error_message = "Invalid or expired token.";
    }
}
