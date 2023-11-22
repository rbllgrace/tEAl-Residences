<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- google fonts -->
    <!-- poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700;800&display=swap"
        rel="stylesheet">
    <!--  -->

    <!-- vanilla css -->
    <link rel="stylesheet" href="../public/css/register.css">
    <link rel="stylesheet" href="../public/css/default.css">
    <!--  -->

    <!-- vanilla js -->
    <script defer src="../public/js/index.js"></script>
    <!--  -->

    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--  -->

</head>

<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <form id="login" class="input-group" method="POST" action="">
                <input type="text" class="input-field" placeholder="Email">
                <input type="password" class="input-field" placeholder="Password">
                <div class="checkbox_container">
                    <input type="checkbox" class="check-box" id="check"><label for="check">Remember Password</label>
                </div>
                <button type="submit" class="submit-btn" onclick="submitForm()">Log In</button>
            </form>
            <form id="register" class="input-group">
                <input type="text" class="input-field" placeholder="Email" name="email" id="email">
                <input type="password" class="input-field" placeholder="Password" name="password" id="password">
                <input type="password" class="input-field" placeholder="Confirm Password" name="confirm_password"
                    id="confirm_password">
                <div class="checkbox_container">
                    <input type="checkbox" class="check-box" id="check2"><label for="check2">I agree to the terms &
                        conditions</label>

                </div>
                <button type="submit" class="submit-btn" onclick="submitForm()">Register</button>

            </form>
        </div>
    </div>
    <script>

    </script> y
</body>

</html>