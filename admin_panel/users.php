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
    <link rel="stylesheet" href="./public/css/users.css">
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

            </tbody>
        </table>
        <div id="notFoundMessage" style="display: none; color: red;" class="text-center">User Not Found</div>
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
    window.onload = function() {
        get_users()
    }

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

        let notFoundMessageElement = document.getElementById('notFoundMessage');
        if (!userFound) {
            notFoundMessageElement.style.display = 'block';
        } else {
            notFoundMessageElement.style.display = 'none';
        }
    }
    </script>


</body>

</html>