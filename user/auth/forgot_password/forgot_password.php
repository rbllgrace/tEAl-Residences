<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

    <!-- bootstrap 5 cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--  -->

    <!-- vanilla css -->
    <link rel="stylesheet" href="../../public/css/default.css">
    <link rel="stylesheet" href="../../public/css/header.css">

    <link rel="stylesheet" href="../login/login.css">
    <!--  -->

    <style>
    .forgot_password {
        display: inline-block;

        font-size: .7rem;
        text-align: right;
        text-decoration: none;
    }

    .forgot_password:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <?php require('../../connection/connect.php') ?>
    <?php require('../login/login_nav.php') ?>

    <?php

    $email = $emailErr = '';


    
    // Function to sanitize input data
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
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

    <div class="container form_container">

        <h1 class="text-center login_text">Forgot Password</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="mb-1">

                <label for="exampleFormControlInput1" class="form-label mb-0">Email Address</label>
                <input type="text" class="form-control shadow-none" id="exampleFormControlInput1" name="email"
                    value="<?php echo $email ?>">
                <span class="error"><?php echo $emailErr; ?></span>
            </div>



            <button type="submit" class="btn btn-primary btn_login mt-2">Send</button>
        </form>




    </div>
</body>

</html>