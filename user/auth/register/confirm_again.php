<?php

// confirm.php

// Include necessary files and configurations
require 'C:\xampp\htdocs\tEAl-Residences\user\libraries\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\tEAl-Residences\user\libraries\PHPMailer\src\SMTP.php';
require 'C:\xampp\htdocs\tEAl-Residences\user\libraries\PHPMailer\src\Exception.php';
require('../../connection/connect.php');


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve the confirmation code from the URL parameter
    $confirmationCode = $_GET['code'];

    // Verify the confirmation code against the database
    $checkCodeQuery = "SELECT * FROM user_table WHERE confirmation_code = '$confirmationCode' AND is_verified = 0";


    $result = $conn->query($checkCodeQuery);

    if ($result->num_rows > 0) {
        // Valid confirmation code
        $row = $result->fetch_assoc();
        $userId = $row['user_id'];

        // Update the user's status to 'verified'
        $updateQuery = "UPDATE user_table SET is_verified = 1 WHERE user_id = $userId";
        $conn->query($updateQuery);

        // Display a success message
        echo "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Email Verification</title>
                <style>
                    body {
                        font-family: 'Arial', sans-serif;
                        background-color: #f0f0f0;
                        text-align: center;
                        padding: 50px;
                    }
                    .success-container {
                        background-color: #4CAF50;
                        color: #fff;
                        padding: 20px;
                        border-radius: 10px;
                    }
                    h1 {
                        margin-bottom: 20px;
                    }
                    p {
                        font-size: 18px;
                    }
                </style>
            </head>
            <body>
                <div class='success-container'>
                    <h1>Email Verified Successfully!</h1>
                    <p>You can now log in.</p>
                </div>
            </body>
            </html>
        ";

        // Optionally, redirect the user to the login page
        // header('Refresh: 3; URL=http://localhost/teal-residences/user/auth/login/login.php'); // Redirect after 3 seconds
        exit();
    } else {
        // Already verified code
        echo "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Email Verification</title>
                <style>
                    body {
                        font-family: 'Arial', sans-serif;
                        background-color: #f0f0f0;
                        text-align: center;
                        padding: 50px;
                    }
                    .info-container {
                        background-color: #2196F3;
                        color: #fff;
                        padding: 20px;
                        border-radius: 10px;
                    }
                    h1 {
                        margin-bottom: 20px;
                    }
                    p {
                        font-size: 18px;
                    }
                </style>
            </head>
            <body>
                <div class='info-container'>
                    <h1>Information</h1>
                    <p>This email has already been verified!</p>
                </div>
            </body>
            </html>
        ";
    }
}
