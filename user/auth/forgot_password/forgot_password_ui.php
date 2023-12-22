<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <?php require('./partials/links.php') ?>
</head>

<body>

    <?php require('../../config/db_connect.php'); ?>
    <?php require('./partials/forgot_password_ui_nav.php') ?>

    <?php

    $email = $emailErr = '';

    // code starts here

    function generateUniqueToken()
    {
        return bin2hex(random_bytes(32));
    }

    function sendConfirmationEmail($userEmail, $token)
    {

        $reset_link = "http://localhost/teal-residences/user/auth/forgot_password/reset_password_ui.php?token=$token";

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
        $mail->setFrom('noreply050623@gmail.com', 'TEAL Residences @noreply');
        $mail->addAddress($userEmail);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset';
        $mail->Body = "Click the following link to reset your password: <a href='$reset_link'>Reset Password</a>";

        // Send the email
        if (!$mail->send()) {
            // echo 'Confirmation email sent successfully!';
            echo 'Error: ' . $mail->ErrorInfo;
        } else {
            // echo 'Error: ' . $mail->ErrorInfo;
        }
    }

    // Function to sanitize input data
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // it goes here when submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Email validation
        if (empty($_POST["email"])) {
            $emailErr = "Email is required *";
        } else {
            $email = test_input($_POST["email"]);

            // Check if the email already exists in the database
            $sql = "SELECT * FROM user_table WHERE email='$email'";
            $result = $conn->query($sql);
            // Check if email address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            } elseif ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $userId = $row['user_id'];

                // logic starts here
                $token = generateUniqueToken();

                // Store the token in the database along with the user's email
                $stmt = $conn->prepare("INSERT INTO password_reset_table (email, token, expiration_time) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR))");
                $stmt->bind_param("ss", $email, $token);
                $stmt->execute();
                $stmt->close();

                sendConfirmationEmail($email, $token);

                // Show message to the user using SweetAlert2
                echo "<script>
                Swal.fire({
                    title: 'Password reset token sent',
                    text: 'Password reset instructions have been sent to your email.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                </script>";
            } else {
                $emailErr = "Email not registered";
            }
        }
    }
    ?>

    <div class="main">
        <div class="container form_container">
            <h1 class="text-center login_text">Forgot Password</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="mb-1">

                    <label for="exampleFormControlInput1" class="form-label mb-0">Email Address</label>
                    <input type="text" class="form-control shadow-none" id="exampleFormControlInput1" name="email" value="<?php echo $email ?>">
                    <span class="error"><?php echo $emailErr; ?></span>
                </div>
                <button type="submit" class="btn btn-primary btn_login mt-2">Forgot</button>
            </form>
        </div>
    </div>
</body>

</html>