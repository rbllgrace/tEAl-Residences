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

        .black_search {
            background: black;
            color: white;
            border: 1px solid black;

            font-size: .8rem;
        }

        .black_search:hover {
            background: transparent;
            border: 1px solid black;
            color: black;

        }

        .btn_del {
            background: red;
            border-color: red;
            font-size: 0.8rem;
            margin: 0;
            padding: 0;
            padding: 2px 10px;
        }

        .btn_del:hover {
            background: transparent;
            border-color: red;
            color: black;
        }
    </style>

</head>

<body>
    <?php require('./partials/header.php'); ?>
    <?php require('./partials/nav_pills.php'); ?>


    <div class="center">
        <div class="top d-flex justify-content-between align-items-center">
            <h1>Users</h1>
            <div class="search-container d-flex gap-1">
                <input type="text" id="userSearchInput" class="form-control shadow-none" placeholder="Search...">
                <button onclick="searchUsers()" class="btn btn-primary shadow-none black_search">Search</button>
            </div>
        </div>


        <table class="table">
            <thead>
                <tr>
                    <th>User Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Is Verified</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody class="table_body">

                <!-- Example row, you can add more rows dynamically -->
            </tbody>
        </table>
        <!-- <h1 class="to_place text-center"></h1> -->
        <!-- Add this HTML element where you want to display the "User Not Found" message -->
        <div id="notFoundMessage" style="display: none; color: red;" class="text-center">User Not Found</div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal_body_inp">

                </div>

            </div>
        </div>
    </div>


    <script>
        window.onload = function() {
            get_users()
            get_users_inp()
        }

        function get_users() {

            let xhr = new XMLHttpRequest()
            xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

            xhr.onload = function() {
                const table_body = document.querySelector('.table_body');
                table_body.innerHTML = this.responseText
            }
            xhr.send('get_users')
        }

        function get_users_inp() {

            let xhr = new XMLHttpRequest()
            xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

            xhr.onload = function() {
                const table_body = document.querySelector('.modal_body_inp');
                table_body.innerHTML = this.responseText
            }
            xhr.send('get_users_inp')
        }


        function searchUsers() {

            let input = document.getElementById('userSearchInput').value.toLowerCase();
            let rows = document.querySelectorAll('.table_body tr');

            let userFound = false;


            rows.forEach(function(row) {
                let name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                if (name.includes(input)) {
                    row.style.display = '';
                    userFound = true;
                } else {
                    row.style.display = 'none';
                }
            });
            // Display the "User Not Found" message if no user is found
            let notFoundMessageElement = document.getElementById('notFoundMessage');
            if (!userFound) {
                notFoundMessageElement.style.display = 'block';
            } else {
                notFoundMessageElement.style.display = 'none';
            }
        }

        const name_class = document.querySelector('.name_class');
        const email_class = document.querySelector('.email_class');
        const is_verified_class = document.querySelector('.is_verified_class');

        function edit_user(id) {

            let xhr = new XMLHttpRequest()
            xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

            xhr.onload = function() {
                // const table_body = document.querySelector('.table_body');
                // table_body.innerHTML = this.responseText
                console.log(this.responseText);
            }
            xhr.send('edit_user_id=' + id + '&name_class=' + name_class.value + '&email_class=' + email_class.value +
                '&is_verified_class=' + is_verified_class.value)
        }
    </script>


</body>

</html>