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


    <!-- data tables -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js">
    </script>
    <!--  -->
</head>

<body>
    <?php require('./partials/header.php'); ?>
    <?php require('./partials/nav_pills.php'); ?>


    <div class="center">
        <div class="top d-flex justify-content-between align-items-center">
            <h1>User Queries</h1>
            <button class="btn btn-primary btn_delete shadow-none" onclick="clear_all_queries()">Clear All</button>
        </div>
        <table class="table display" id="data_table" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Date Queried</th>
                    <th>Action</th>
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

                    echo '<tr class="mt-5">
                        <td>' . $row['name'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td class="room_description_text">' . $row['subject'] . '</td>
                        <td class="small">' . $row['message'] . '</td>
                        <td class="date">' . $simpleDateTime . '</td>
                        <td class="actions">
                            <button type="button" class="btn btn-primary shadow-none btn_delete" onclick="remove_single_user_query(' . $row['id'] . ')"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>';
                }

                ?>
            </tbody>
        </table>
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
                scrollY: '300px', // Set a fixed height for vertical scrolling
                language: {
                    search: "Search Any Details:",
                    paginate: {
                        next: '>',
                        previous: '<'
                    }
                }
            });
        });

        // ======================== Alert ========================
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
            }, 2000);
        }

        // ======================== Remove Query ========================
        function remove_single_user_query(id) {
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
                    alert('error', 'Someting went wrong!')
                }
            }
            xhr.send('remove_single_user_query_id=' + id)
        }

        // ======================== Clear All ========================
        function clear_all_queries() {
            let xhr = new XMLHttpRequest()
            xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

            xhr.onload = function() {
                console.log(this.responseText);
                if (this.responseText === 'Query executed successfully') {
                    alert('success', 'Cleared!')

                    setTimeout(() => {
                        window.location.reload();
                    }, 500);

                } else {
                    alert('error', 'Someting went wrong!')
                }
            }
            xhr.send('clear_all_queries=')
        }
    </script>
</body>

</html>