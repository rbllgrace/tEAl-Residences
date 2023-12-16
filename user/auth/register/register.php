<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEAL Register</title>
    <?php require('./partials/links.php') ?>
</head>

<body>
    <?php

    require('../../config/db_connect.php');
    require('./partials/register_nav.php');

    // Function to send a confirmation email
    function sendConfirmationEmail($userEmail, $confirmationCode)
    {
        require 'C:\xampp\htdocs\tEAl-Residences\user\libraries\PHPMailer\src\PHPMailer.php';
        require 'C:\xampp\htdocs\tEAl-Residences\user\libraries\PHPMailer\src\SMTP.php';
        require 'C:\xampp\htdocs\tEAl-Residences\user\libraries\PHPMailer\src\Exception.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer();

        // Configure the email settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'noreply050623@gmail.com';
        $mail->Password = 'xlqhaxnjiowsxuyr';
        $mail->SMTPSecure = 'tls'; // Change to 'ssl' if necessary
        $mail->Port = 587; // Change to 465 if using 'ssl'

        // Sender and recipient
        $mail->setFrom('noreply050623@gmail.com', 'noreply');
        $mail->addAddress($userEmail);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Email Confirmation';
        $mail->Body = 'Thank you for registering! Please click the following link to confirm your email: <a href="http://localhost/teal-residences/user/auth/register/confirm.php?code=' . $confirmationCode . '">Confirm Email</a>';

        // Send the email
        if (!$mail->send()) {
            // echo 'Confirmation email sent successfully!';
            echo 'Error: ' . $mail->ErrorInfo;
        } else {
            // echo 'Error: ' . $mail->ErrorInfo;
        }
    }

    function generateConfirmationCode()
    {
        // Generate a random string using PHP's built-in functions
        $length = 32; // You can adjust the length of the confirmation code
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $confirmationCode = '';

        for ($i = 0; $i < $length; $i++) {
            $confirmationCode .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $confirmationCode;
    }
    ?>

    <?php
    // Define variables and set to empty values
    $name_err = $email_err = $pass_err = $confirm_password_err = "";
    $name = $email = $password = $confirm_password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Name validation
        if (empty($_POST["name"])) {
            $name_err = "Name is required *";
        } else {
            $name = test_input($_POST["name"]);
            // Check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $name_err = "Only letters and white space allowed";
            }
        }

        // Email validation
        if (empty($_POST["email"])) {
            $email_err = "Email is required *";
        } else {
            $email = test_input($_POST["email"]);

            // Check if the email already exists in the database
            $sql = "SELECT * FROM user_table WHERE email='$email'";
            $result = $conn->query($sql);
            // Check if email address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_err = "Invalid email format";
            } elseif ($result->num_rows > 0) {
                $email_err = "Email already exists";
            }
        }

        // Password validation
        if (empty($_POST["password"])) {
            $pass_err = "Password is required *";
        } else {
            $password = test_input($_POST["password"]);
            // Add additional password strength checks if needed
        }

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if (!$uppercase) {
            $pass_err = "Password should contain at least one uppercase letter.";
        }
        if (!$lowercase) {
            $pass_err = "Password should contain at least one lowercase letter.";
        }
        if (!$number) {
            $pass_err = "Password should contain at least one number.";
        }
        if (!$specialChars) {
            $pass_err = "Password should contain at least one special character.";
        }

        // Password validation for minimum length
        if (strlen($password) < 6) {
            $pass_err = "Password must be at least 6 characters";
        }

        // Confirm Password validation
        if (empty($_POST["confirm_password"])) {
            $confirm_password_err = "Please confirm the password";
        } else {
            $confirm_password = test_input($_POST["confirm_password"]);
            if ($confirm_password != $password) {
                $confirm_password_err = "Passwords do not match";
            }
        }

        // If all validations pass, insert user information into the database
        if (empty($name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
            $confirmationCode = generateConfirmationCode();
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security

            // Insert user information into the database
            $insertQuery = "INSERT INTO user_table (name, email, password, confirmation_code, is_verified) 
            VALUES ('$name', '$email', '$hashedPassword', '$confirmationCode', 0)";
            if ($conn->query($insertQuery) === TRUE) {
                sendConfirmationEmail($email, $confirmationCode);

                // Show message to the user using SweetAlert2
                echo "<script>
                Swal.fire({
                    title: 'Confirmation Sent',
                    text: 'Please check your email for the verification link.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location.href = 'http://localhost/teal-residences/user/auth/login/login.php'; // Redirect to your login page
                });
                </script>";
            } else {
                echo "Error: " . $insertQuery . "<br>" . $conn->error;
            }
        }
    }

    $conn->close();

    // Function to sanitize input data
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <div class="main">
        <div class="container form_container">
            <h1 class="text-center login_text">REGISTER</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div>
                    <label for="exampleFormControlInput1" class="form-label mb-0">Name</label>
                    <input type="text" class="form-control shadow-none" id="exampleFormControlInput1" name="name" value="<?php echo $name ?>">
                    <span class="error"><?php echo $name_err; ?></span>
                </div>

                <div>
                    <label for="exampleFormControlInput2" class="form-label mb-0">Email Address</label>
                    <input type="text" class="form-control shadow-none" id="exampleFormControlInput2" name="email" value="<?php echo $email ?>">
                    <span class="error"><?php echo $email_err; ?></span>
                </div>

                <div>
                    <label for="exampleFormControlInput3" class="form-label mb-0">Password</label>
                    <input type="password" class="form-control shadow-none" id="exampleFormControlInput3" name="password" value="<?php echo $password ?>">
                    <span class="error"><?php echo $pass_err; ?></span>
                </div>

                <div>
                    <label for="exampleFormControlInput4" class="form-label mb-0">Confirm Password</label>
                    <input type="password" class="form-control shadow-none" id="exampleFormControlInput4" name="confirm_password" value="<?php echo $confirm_password ?>">
                    <span class="error"><?php echo $confirm_password_err; ?></span>
                </div>

                <button type="submit" class="btn btn-primary btn_login">Register</button>
            </form>

            <p class="dont_have">Already have an account?</p>
            <a href="http://localhost/teal-residences/user/auth/login/login.php" class="btn btn-primary btn_register">Login</a>
        </div>
    </div>

</body>

</html>