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
    <link rel="stylesheet" href="./public/css/common.css">
    <style>
    th {
        font-size: 0.8rem;
        text-align: center;
    }

    td {
        font-size: 0.8rem;
        text-align: center;

        vertical-align: middle;
    }

    .btn_edit {
        padding: 2px 10px;
    }

    .room_description_text {
        font-size: 0.7rem;
        width: 300px;
    }

    input {
        font-size: 0.7rem !important;
    }
    </style>

</head>

<body>
    <?php require('./partials/header.php'); ?>
    <?php require('./partials/nav_pills.php'); ?>


    <div class="center">
        <div class="top d-flex justify-content-between align-items-center">
            <h1>Users</h1>

        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>User Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Is Verified</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody class="table_body">
                <!-- Example row, you can add more rows dynamically -->
            </tbody>
        </table>
    </div>


    <script>
    window.onload = function() {
        get_users()
    }

    function get_users() {

        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {
            const table_body = document.querySelector('.table_body');
            table_body.innerHTML = this.responseText
            // console.log(this.responseText);
        }
        xhr.send('get_users')
    }
    </script>


</body>

</html>