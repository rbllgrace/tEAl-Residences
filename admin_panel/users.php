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
$res = mysqli_query($con, "SELECT * FROM `user_table`");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php require('./partials/links.php') ?>
    <link rel="stylesheet" href="./public/css/common.css">
    <link rel="stylesheet" href="./public/css/users.css">

    <!-- data tables -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js">
    </script>
    <!--  -->

    <style>
    table.dataTable>thead>tr>th,
    table.dataTable>thead>tr>td {
        padding: 10px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.3);
        text-align: center;
    }

    .dataTables_wrapper .dataTables_filter {
        float: right;
        text-align: right;
        font-size: 0.8rem;
    }

    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #aaa;
        border-radius: 3px;
        background-color: transparent;
        color: inherit;
        margin-left: 11px;
    }

    .dataTables_wrapper .dataTables_filter input:focus-visible {
        outline: none;
    }

    label {
        display: inline-block;
        margin-bottom: 1rem;
        font-size: .8rem;
    }

    .dataTables_wrapper .dataTables_length select {
        border-radius: 3px;
        padding: 5px;
        background-color: transparent;
        color: inherit;
        padding: 0px;
        font-size: .7rem;
        cursor: pointer;
    }

    .dataTables_wrapper .dataTables_info {
        clear: both;
        float: left;
        padding-top: .755em;
        font-size: .8rem;
        margin-bottom: 1rem;
    }

    .dataTables_wrapper .dataTables_paginate {
        float: right;
        text-align: right;
        padding-top: .755em;
        font-size: .8rem;
        margin-bottom: 1rem;
    }
    </style>


</head>

<body>
    <?php require('./partials/header.php'); ?>
    <?php require('./partials/nav_pills.php'); ?>

    <div class="center">
        <h1 class="mb-4">Users</h1>
        <table class="table display" id="data_table" style="width:100%">
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
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($res)) {
                    echo '<tr>
                    <td>' . $row['user_id'] . '</td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['email'] . '</td>
                    
                    <td class="fw-bold" style="color: ' . ($row['is_verified'] == 1 ? 'green' : 'red') . ';">'
                        . ($row['is_verified'] == 1 ? '<i class="bi bi-check-circle-fill"></i>  Verified' : '<i class="bi bi-file-excel-fill"></i>  Not Verified') . '</td>
            
                    <td>' . $row['created_at'] . '</td>
                    <td>
                        <button class="btn btn-primary shadow-none btn_edit" data-bs-toggle="modal" data-bs-target="#editUserModal"
                            onclick="get_single_user_with_id(' . $row['user_id'] . ')">Edit</button>
                        <button class="btn btn-primary shadow-none btn_del" onclick="delete_single_user(' . $row['user_id'] . ')">Delete</button>
                    </td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade modal_add_user" id="editUserModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editUserModalLabel">Edit User</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body modal_content_edit_user_container">
                </div>

            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {

        $('#data_table').DataTable({
            paging: true, // Enable pagination
            pageLength: 10, // Set the number of rows per page
            ordering: true, // Enable sorting
            order: [
                [1, 'asc']
            ], // Sort by the second column in ascending order
            searching: true, // Enable search
            responsive: true, // Enable responsive mode
            scrollX: false, // Disable horizontal scrolling
            scrollY: '350px', // Set a fixed height for vertical scrolling
            language: {
                search: "Search Any Details:",
                paginate: {
                    next: '>',
                    previous: '<'
                }
            }
        });
    });

    function alert(type, msg) {

        let base_class = (type == 'success') ? 'alert-success' : 'alert-danger'
        let element = document.createElement('div')
        element.innerHTML = `<div class="alert ${base_class} alert-dismissible fade show custom_alert" role="alert">
${msg}
<button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
</div>`
        document.body.append(element)

        // Use setTimeout to remove the alert after the specified duration
        setTimeout(function() {
            element.remove();
        }, 3000);
    }

    function validateInput(input) {
        var value = parseFloat(input.value);

        if (isNaN(value) || value < -1) {
            input.value = 0;
        } else if (value === 0) {
            input.value = 0;
        } else if (value > 1) {
            input.value = 1;
        }
    }


    const modal_content_edit_user_container = document.querySelector('.modal_content_edit_user_container');

    function get_single_user_with_id(user_id) {
        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {

            modal_content_edit_user_container.innerHTML = this.responseText
        }

        xhr.send('user_id=' + user_id + '&get_single_user_with_id')
    }

    function edit_user_by_id(user_id) {
        const name_inp_user = document.querySelector('.name_inp_user');
        const is_verified_inp_user = document.querySelector('.is_verified_inp_user');

        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {

            let my_modal = document.querySelector('.modal_add_user')
            let modal = bootstrap.Modal.getInstance(my_modal)
            modal.hide()

            if (this.responseText == 1) {
                alert('success', 'User Updated!')
                setTimeout(() => {
                    window.location.reload();
                }, 500);
            } else {
                alert('error', 'No Changes Made!')
            }
        }

        xhr.send('name_inp_user=' + name_inp_user.value + '&is_verified_inp_user=' + is_verified_inp_user.value +
            '&user_id=' + user_id +
            '&edit_user_by_id')


    }

    function delete_single_user(user_id) {
        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {
            if (this.responseText == 1) {
                alert('success', 'Removed!')
                setTimeout(() => {
                    window.location.reload();
                }, 500);
            } else {
                alert('error', 'Something went wrong!')
            }
        }

        xhr.send('user_id=' + user_id + '&delete_single_user')
    }


    // function searchUsers() {

    //     let input = document.getElementById('userSearchInput').value.toLowerCase();
    //     let rows = document.querySelectorAll('.table_body tr');

    //     let userFound = false;

    //     rows.forEach(function(row) {
    //         let name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
    //         if (name.includes(input)) {
    //             row.style.display = '';
    //             userFound = true;
    //         } else {
    //             row.style.display = 'none';
    //         }
    //     });

    //     let notFoundMessageElement = document.getElementById('notFoundMessage');
    //     if (!userFound) {
    //         notFoundMessageElement.style.display = 'block';
    //     } else {
    //         notFoundMessageElement.style.display = 'none';
    //     }
    // }
    </script>


</body>

</html>