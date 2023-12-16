<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <?php require('./partials/links.php') ?>
</head>

<body>
    <?php
    require('../../config/db_connect.php');
    require('./partials/forgot_password_ui_nav.php');
    $password = $passwordErr = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $token = $_GET['token'];
        // echo $token;
        $new_password = $_POST['new_password'];


        // Check if the token is valid
        $stmt = $conn->prepare("SELECT email FROM password_reset_table WHERE token = ? AND expiration_time > NOW()");
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
            $stmt = $conn->prepare("DELETE FROM password_reset_table WHERE token = ?");
            $stmt->bind_param("s", $token);
            $stmt->execute();
            $stmt->close();

            // echo "Password successfully reset.";

            // Show message to the user using SweetAlert2
            echo "<script>
             Swal.fire({
                 title: 'Password successfully reset.',
                 text: 'Press ok to proceed to login',
                 icon: 'success',
                 confirmButtonText: 'OK'
             }).then(function() {
                window.location.href = 'http://localhost/teal-residences/user/auth/login/login.php'; // Redirect to your login page
            });
             </script>";
        } else {
            $error_message = "Invalid or expired token.";
        }
    }
    ?>
    <!-- Your HTML form for the new password input -->
    <div class="main">
        <div class="container form_container">
            <h1 class="text-center login_text">Reset Password</h1>
            <form action="http://localhost/teal-residences/user/auth/forgot_password/reset_password_ui.php?token=<?php echo $_GET['token']; ?>" method="POST">
                <div class="mb-1">

                    <label for="exampleFormControlInput1" class="form-label mb-0">New Password</label>
                    <input type="password" class="form-control shadow-none" id="exampleFormControlInput1" name="new_password">
                </div>
                <button type="submit" class="btn btn-primary btn_login mt-2">Send</button>
            </form>
        </div>
    </div>

</body>

</html>