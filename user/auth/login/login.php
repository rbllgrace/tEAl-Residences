<?php
session_start();
if (isset($_SESSION['user_login']) && isset($_SESSION['user_id']) == true) {
    header("Location: http://localhost/teal-residences/admin_panel/dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEAL Login</title>
    <?php require('./partials/links.php') ?>

</head>

<body>
    <?php

    require('../../config/db_connect.php');
    require('./partials/login_nav.php');

    function logFailedAttempt($email)
    {
        if (!isset($_SESSION['login_attempts'])) {
            $_SESSION['login_attempts'] = 1;
        } else {
            $_SESSION['login_attempts']++;
        }

        $_SESSION['last_attempt_time'] = time();
        $_SESSION['last_attempt_email'] = $email;
    }

    function isRateLimited()
    {
        $max_attempts = 4;
        $lockout_duration = 60;

        if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] >= $max_attempts) {
            $elapsed_time = time() - $_SESSION['last_attempt_time'];
            if ($elapsed_time < $lockout_duration) {
                return true; // User is rate-limited
            } else {
                unset($_SESSION['login_attempts']);
            }
        }

        return false; // User is not rate-limited
    }

    // Check if the user is rate-limited or locked out
    if (isRateLimited()) {
        echo "Too many consecutive failed login attempts. Please try again later.";
        exit();
    }


    // ... (Include necessary files and configurations)

    $email = $password = '';
    $emailErr = $passwordErr = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate user input
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validate email
        if (empty($email)) {
            $emailErr = "Email is required *";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }

        // Validate password
        if (empty($password)) {
            $passwordErr = "Password is required *";
        }

        // If there are no validation errors, proceed with login
        if (empty($emailErr) && empty($passwordErr)) {
            // Fetch the user record from the database based on the provided email
            $sql = "SELECT * FROM user_table WHERE email='$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($row["is_verified"] == 1 && password_verify($password, $row["password"])) {
                    // Login successful


                    $_SESSION['user_id'] = $row['user_id'];
                    // $_SESSION['name'] = $name;
                    $_SESSION['user_login'] = true;

                    unset($_SESSION['login_attempts']);

                    header('Location: http://localhost/teal-residences/user/pages/homepage.php'); // redirect to homepage

                } elseif ($row["is_verified"] == 0) {
                    // Account not verified
                    $emailErr = "Please verify your email before logging in. <a href='http://localhost/teal-residences/user/auth/login/verify_ui.php'>Verify here.</a>";
                } else {
                    // Incorrect password
                    $passwordErr = "Incorrect email or password";
                    logFailedAttempt($email);
                }
            } else {
                // User not found
                $emailErr = "Email not registered";
            }
        }
    }
    ?>

    <div class="main">
        <div class="container form_container">
            <?php
            // Check if there is a logout success message
            $logoutMessage = isset($_GET['logout']) && $_GET['logout'] == 'success' ? 'You have been successfully logged out.' : '';
            ?>
            <span class="error"
                style="color: green; font-size: .9rem; position: relative; left: 12px;"><?php echo $logoutMessage; ?></span>
            <h1 class="text-center login_text">LOGIN</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div>
                    <label for="exampleFormControlInput1" class="form-label mb-0">Email Address</label>
                    <input type="text" class="form-control shadow-none" id="exampleFormControlInput1" name="email"
                        value="<?php echo $email ?>">
                    <span class="error"><?php echo $emailErr; ?></span>
                </div>

                <div>
                    <label for="exampleFormControlInput2" class="form-label mb-0">Password</label>
                    <input type="password" class="form-control shadow-none" id="exampleFormControlInput2"
                        name="password" value="<?php echo $password ?>">
                    <span class="error"><?php echo $passwordErr; ?></span>

                </div>

                <button type="submit" class="btn btn-primary btn_login mt-2">Login</button>
            </form>

            <a href="http://localhost/teal-residences/user/auth/forgot_password/forgot_password_ui.php"
                class="forgot_password">Forgot Password?</a>

            <p class="dont_have">Don't have an account?</p>
            <a href=http://localhost/teal-residences/user/auth/register/register.php
                class="btn btn-primary btn_register">Register</a>
        </div>
    </div>

</body>




</html>