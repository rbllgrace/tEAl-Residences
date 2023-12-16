<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resend Verification</title>
    <?php require('./partials/links.php') ?>
</head>

<body>
    <?php
    require('../../config/db_connect.php');
    require('./partials/login_nav.php');
    $email = $emailErr = '';

    // Function to sanitize input data
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

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
        $mail->Body = 'Thank you for registering! Please click the following link to confirm your email: <a href="http://localhost/teal-residences/user/auth/register/confirm_again.php?code=' . $confirmationCode . '">Confirm Email</a>';

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


                // $emailErr = "Email already exists"; 
                // logic starts here


                $checkCodeQuery = "SELECT * FROM user_table WHERE email = '$email' AND is_verified = 0";
                $result = $conn->query($checkCodeQuery);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $userId = $row['user_id'];

                    $newConfirmationCode = generateConfirmationCode();


                    // Update the user's status to 'verified'
                    $updateQuery = "UPDATE user_table SET confirmation_code = '$newConfirmationCode' WHERE user_id = $userId";
                    $conn->query($updateQuery);

                    sendConfirmationEmail($email, $newConfirmationCode);

                    // Show message to the user using SweetAlert2
                    echo "<script>
                Swal.fire({
                    title: 'Verification Sent',
                    text: 'Please check your email for the verification link.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location.href = 'http://localhost/teal-residences/user/auth/login/login.php'; // Redirect to your login page
                });
                </script>";
                }
            } else {
                $emailErr = "Email not registered";
            }
        }
    }

    ?>
    <div class="main">
        <div class="container form_container">
            <h1 class="text-center login_text">LOGIN</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="mb-1">
                    <label for="exampleFormControlInput1" class="form-label mb-0">Email Address</label>
                    <input type="text" class="form-control shadow-none" id="exampleFormControlInput1" name="email"
                        value="<?php echo $email ?>">
                    <span class="error"><?php echo $emailErr; ?></span>
                </div>
                <button type="submit" class="btn btn-primary btn_login mt-2">Verify Email</button>
            </form>

            <p class="dont_have mt-2">Already Verified?</p>
            <a href=http://localhost/teal-residences/user/auth/login/login.php
                class="btn btn-primary btn_register">Login</a>
        </div>
    </div>

</body>

</html>