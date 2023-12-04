<?php require('./config/config.php');
admin_login();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php require('./partials/links.php') ?>

    <style>
    * {
        font-family: 'Poppins', sans-serif;
        box-sizing: border-box;
        scroll-behavior: smooth;
    }

    .btn_logout {
        background: black;
        color: white;
        border-color: black;
        font-size: .8rem;
    }

    .btn_logout:hover {
        background: black;
        border-color: white;
    }

    .navbar {
        background: #11151c !important;
        position: fixed;
        top: 0;
        width: 100%;
    }

    .nav-pills {
        width: 250px;
        text-align: center;

        position: fixed;
        top: 56px;
        height: 100%;
        background: #11151c;
        border-top: 1px solid white;
    }

    .nav-pills .nav-link {
        color: white;
    }

    .center {
        margin-left: 20vw;
        margin-top: 5%;
    }
    </style>
</head>

<body>
    <?php require('./partials/header.php'); ?>

    <ul class="nav nav-pills flex-column">

        <li class="nav-item">
            <h4 class="text-left"> <a class="nav-link" aria-current="page" href="#">Admin Panel</a></h4>
        </li>

        <li class="nav-item">
            <a class="nav-link" aria-current="page"
                href="http://localhost/teal-residences/admin_panel/dashboard.php">Dashboard</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="http://localhost/teal-residences/admin_panel/rooms.php">Rooms</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="http://localhost/teal-residences/admin_panel/users.php">Users</a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="http://localhost/teal-residences/admin_panel/facilities.php">Facilities</a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="http://localhost/teal-residences/admin_panel/settings.php">Settings</a>
        </li>
    </ul>

    <p class="center">rooms</p>



</body>

</html>