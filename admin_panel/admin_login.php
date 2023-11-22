<?php
    require("admin_con.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN & REGISTRATION</title>
    <link rel="stylesheet" href="admin_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn">ADMIN</button>
            </div>
            <form id="login" class="input-group" method="POST">
                <div class="input-container">
                    <i class="fas fa-user"></i>
                    <input type="text" class="input-field" placeholder="Username" required name="admin">
                </div>
                <div class="input-container">
                    <i class="fas fa-lock"></i>
                    <input type="text" class="input-field" placeholder="Enter Password" required name="adminpass">
                </div>
                <input type="checkbox" class="check-box"><span>Remember Password</span>
                <button type="submit" class="submit-btn" name="sign">Log In</button>
            </form>
        </div>
    </div>
    <?php
        if(isset($_POST['sign'])){
            $query = "SELECT * FROM `admin_login` WHERE `admin_name` ='$_POST[admin]' AND `admin_password`='$_POST[adminpass]'";
            $result=mysqli_query($conn,$query);
            if(mysqli_num_rows($result)==1)
            {/* this is for log out*/
                session_start();
                $_SESSION['adminloginId']=$_POST[''];
                header("location: addash.php");
            }
            else{
                echo "<script>alert('Incorrect Password');</script>";
            }
        }
    ?>
</body>

</html>