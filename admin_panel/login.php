<?php
session_start();
if (isset($_SESSION['admin_login']) && isset($_SESSION['admin_login']) == true) {
    header("Location: http://localhost/teal-residences/admin_panel/dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <?php require('./partials/links.php') ?>
    <link rel="stylesheet" href="./public/css/default.css">
    <link rel="stylesheet" href="./public/css/alert.css">
    <link rel="stylesheet" href="./public/css/login.css">
</head>

<body>

    <?php
    // session_start();

    // require('/xampp/htdocs/tEAl-Residences/user/connection/connect.php');

    // $name = $password = '';
    // $nameErr = $passwordErr = '';
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     // Validate user input
    //     // $name = $_POST['name'];
    //     // $password = $_POST['password'];

    //     require('./config/config.php');
    //     $data = filteration($_POST);
    //     // print_r($data);
    //     $name =  $data['name'];
    //     $password = $data['password'];
    //     // echo $name;
    //     // echo $password;

    //     // Validate name
    //     if (empty($name)) {
    //         $nameErr = "Name is required *";
    //     }

    //     // Validate password
    //     if (empty($password)) {
    //         $passwordErr = "Password is required *";
    //     }


    //     // If there are no validation errors, proceed with login
    //     if (empty($nameErr) && empty($passwordErr)) {
    //         // Fetch the user record from the database based on the provided name
    //         $sql = "SELECT * FROM admin_cred_table WHERE admin_name='$name'";
    //         $result = $conn->query($sql);

    //         if ($result->num_rows > 0) {
    //             $row = $result->fetch_assoc();


    //             if ($password != $row['admin_pass']) {
    //                 $passwordErr = "Invalid name or password *";
    //             } else {
    //                 // logged in here
    //                 $_SESSION['admin_id'] = $row['admin_id'];
    //                 $_SESSION['admin_name'] = $name;

    //                 header('Location: http://localhost/teal-residences/admin_panel/dashboard.php'); // redirect to homepage
    //             }
    //         } else {
    //             $nameErr = "Not registered as an admin *";
    //         }
    //     }
    // }

    ?>



    <?php
    require('./config/config.php');

    $name = $password = '';
    $nameErr = $passwordErr = '';

    if (isset($_POST['login'])) {
        $frm_data = filteration($_POST);

        $name = $frm_data['name'];
        $password = $frm_data['password'];

        $query = "SELECT * FROM `admin_cred_table` WHERE `admin_name`=? AND `admin_pass`=?";
        $values = [$name, $password];

        $res = select($query, $values, 'ss');

        if ($res->num_rows == 1) {
            $row = mysqli_fetch_assoc($res);
            $_SESSION['admin_login'] = true;
            $_SESSION['admin_id'] = $row['admin_id'];

            header("Location: http://localhost/teal-residences/admin_panel/dashboard.php");
        } else {
            // Validate name
            if (empty($name)) {
                $nameErr = "Name is required *";
            }

            // Validate password
            if (empty($password)) {
                $passwordErr = "Password is required *";
            }

            if (!($nameErr || $passwordErr)) {
                // $nameErr = "Invalid name or password";
                alert('danger', 'Invalid name or password');
            }
        }
    }
    ?>

    <!-- <div class="container form_container">

        <h1 class="text-center login_text">Admin Login Panel</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="mb-1">

                <label for="exampleFormControlInput1" class="form-label mb-0">Admin Name</label>
                <input type="text" class="form-control shadow-none" id="exampleFormControlInput1" name="name" value="<?php echo $name ?>">
                <span class="error"><?php echo $nameErr; ?></span>

            </div>

            <div class="mb-1">
                <label for="exampleFormControlInput2" class="form-label mb-0">Password</label>
                <input type="password" class="form-control shadow-none" id="exampleFormControlInput2" name="password" value="<?php echo $password ?>">
                <span class="error"><?php echo $passwordErr; ?></span>


            </div>

            <button type="submit" class="btn btn-primary btn_login mt-2" name="login">Login</button>
        </form>


    </div> -->

    <div class="container form_container">

        <h1 class="text-center login_text">Admin Login Panel</h1>
        <form method="POST">
            <div class="mb-1">

                <label for="exampleFormControlInput1" class="form-label mb-0">Admin Name</label>
                <input type="text" class="form-control shadow-none" id="exampleFormControlInput1" name="name" value="<?php echo $name ?>">
                <span class="error"><?php echo $nameErr; ?></span>


            </div>

            <div class="mb-1">
                <label for="exampleFormControlInput2" class="form-label mb-0">Password</label>
                <input type="password" class="form-control shadow-none" id="exampleFormControlInput2" name="password" value="<?php echo $password ?>">
                <span class="error"><?php echo $passwordErr; ?></span>

            </div>

            <button type="submit" class="btn btn-primary btn_login mt-2 shadow-none" name="login">Login</button>
        </form>


    </div>


</body>

</html>