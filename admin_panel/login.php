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
    <link rel="stylesheet" href="./public/css/login.css">
</head>

<body>
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
                $nameErr = "Invalid name or password";
                // alert('danger', 'Invalid name or password');
            }
        }
    }
    ?>
    <div class="main">
        <div class="container form_container">
            <h1 class="text-center login_text">Admin Login Panel</h1>
            <form method="POST">
                <div>
                    <label for="exampleFormControlInput1" class="form-label mb-0">Admin Name</label>
                    <input type="text" class="form-control shadow-none" id="exampleFormControlInput1" name="name" value="<?php echo $name ?>">
                    <span class="error"><?php echo $nameErr; ?></span>
                </div>
                <div>
                    <label for="exampleFormControlInput2" class="form-label mb-0">Password</label>
                    <input type="password" class="form-control shadow-none" id="exampleFormControlInput2" name="password" value="<?php echo $password ?>">
                    <span class="error"><?php echo $passwordErr; ?></span>
                </div>
                <button type="submit" class="btn btn-primary btn_login mt-2 shadow-none" name="login">Login</button>
            </form>
        </div>
    </div>
</body>

</html>