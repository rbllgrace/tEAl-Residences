<?php require('./config/config.php');
admin_login();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$con = $GLOBALS['conn'];
$res = mysqli_query($con, "SELECT * FROM `user_queries_table`");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Queries</title>
    <?php require('./partials/links.php') ?>
    <link rel="stylesheet" href="./public/css/user_queries.css">
    <link rel="stylesheet" href="./public/css/common.css">
</head>

<body>
    <?php require('./partials/header.php'); ?>
    <?php require('./partials/nav_pills.php'); ?>


    <div class="center">
        <h1>User Queries</h1>

        <table class="table display" id="data_table" style="width:100%">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Seen</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php

                while ($row = mysqli_fetch_assoc($res)) {

                    $datetimeString = $row['date'];

                    // Convert string to DateTime object
                    $datetime = new DateTime($datetimeString);

                    // Format the DateTime object to a simpler time format
                    $simpleDateTime = $datetime->format("M j, Y g:i A");


                    echo '<tr>
                <td>' . $row['name'] . '</td>
                <td>' . $row['email'] . '</td>
                <td class="room_description_text">' . $row['subject'] . '</td>
                <td class="small">' . $row['message'] . '</td>
                <td class="date">' . $simpleDateTime . '</td>
                <td class="small">' . $row['seen'] . '</td>
                <td class="actions">
                <button type="button" class="btn btn-primary shadow-none btn_edit" onclick="show_modal(this)"><i class="bi bi-pencil-square"></i></button>
                    <button type="button" class="btn btn-primary shadow-none btn_delete" onclick="remove_room(' . $row['room_id'] . ')"><i class="bi bi-trash"></i></button>
                    
                </td>
            </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>



</body>

</html>