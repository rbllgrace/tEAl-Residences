<?php require('./config/config.php');
admin_login();
session_regenerate_id(true);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>

<body>
    <h1>admin logged in</h1>
    <a href="http://localhost/teal-residences/admin_panel/logout.php">Logout</a>

</body>

</html>