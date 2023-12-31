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
$res = mysqli_query($con, "SELECT * FROM `rooms`");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms</title>
    <?php require('./partials/links.php') ?>
    <link rel="stylesheet" href="./public/css/rooms.css">
    <link rel="stylesheet" href="./public/css/common.css">

    <!-- data tables -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js">
    </script>
    <!--  -->

    <!-- data tables css -->
    <link rel="stylesheet" href="./public/css/data_tables.css">
</head>

<body>
    <?php require('./partials/header.php'); ?>
    <?php require('./partials/nav_pills.php'); ?>

    <div class="center">
        <div class="top d-flex justify-content-between align-items-center">
            <h1>Rooms</h1>
            <button class="btn btn-primary btn_add shadow-none" data-bs-toggle="modal" data-bs-target="#addRoomModal">Add Room</button>
        </div>

        <table class="table display" id="data_table" style="width:100%">

            <thead>
                <tr>
                    <th>Picture</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Max Person</th>
                    <th>Per Night</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php

                while ($row = mysqli_fetch_assoc($res)) {

                    $datetimeStringCreatedAt = $row['created_at'];
                    $datetimeString = $row['updated_at'];

                    // Convert string to DateTime object
                    $datetime = new DateTime($datetimeString);
                    $datetimeCreatedAt = new DateTime($datetimeStringCreatedAt);

                    // Format the DateTime object to a simpler time format
                    $simpleDateTime = $datetime->format("M j, Y g:i A");
                    $simpleDateTimeCreatedAt = $datetimeCreatedAt->format("M j, Y g:i A");


                    echo '<tr>
                <td><img src="http://localhost/teal-residences/user/public/images/' . $row['room_picture'] . '" alt="Room Picture" width="150"></td>
                <td>' . $row['room_title'] . '</td>
                <td class="room_description_text">' . $row['room_description'] . '</td>
                <td class="small">' . $row['room_max_person'] . '</td>
                <td class="small">' . $row['per_night'] . '</td>
                <td class="date">' . $simpleDateTimeCreatedAt . '</td>
                <td class="date">' . $simpleDateTime . '</td>
        
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

    <!-- Add Room Modal -->
    <div class="modal fade my_modal_add_room" data-bs-backdrop="static" data-bs-keyboard="false" id="addRoomModal" tabindex="-1" aria-labelledby="addRoomModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" id="form_add_room" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addRoomModalLabel">Edit Room</h1>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!--  -->
                        <p style="font-size: .7rem; margin-bottom: 0; font-weight: bold;">Picture</p>
                        <input required class="form-control form-control-sm shadow-none picture" type="file" accept="image/*">

                        <p style="font-size: .7rem; margin-bottom: 0; font-weight: bold; margin-top: 1rem;">Room Title</p>
                        <input required type="text" class="form-control shadow-none title" name="room_title_inp">

                        <p style="font-size: .7rem; margin-bottom: 0; font-weight: bold; margin-top: 1rem;">Room Description </p>
                        <!-- <input required type="text" class="form-control shadow-none description" name="room_description_inp"> -->
                        <textarea style="font-size: .8rem;" class="form-control description shadow-none" id="exampleFormControlTextarea1" rows="5" required name="room_description_inp"></textarea>

                        <p style="font-size: .7rem; margin-bottom: 0; font-weight: bold; margin-top: 1rem;">Room Max Person </p>
                        <input required type="text" class="form-control shadow-none max" name="room_max_person_inp">

                        <p style="font-size: .7rem; margin-bottom: 0; font-weight: bold; margin-top: 1rem;">Room Price per Night</p>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">₱</span>
                            <input required type="text" class="form-control shadow-none night" aria-describedby="basic-addon1" name="room_per_night_inp">
                        </div>

                        <p style="font-size: .7rem; margin-bottom: 0; font-weight: bold; margin-top: 1rem;">Facilities</p>
                        <?php
                        $res = mysqli_query($con, "SELECT * FROM `facilities_table`");
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo '
                                <div class="checkbox_container d-flex align-items-center">
                                    <div class="form-check d-flex gap-1">
                                        <input class="form-check-input shadow-none" value="' . $row['item'] . '" name="facilities" type="checkbox" id="check' . $row['id'] . '" role="button">
                                        <label style="margin-bottom: 0px;" class="form-check-label" for="check' . $row['id'] . '" role="button">
                                            ' . $row['item'] . '
                                        </label>
                                    </div>
                                </div>
                            ';
                        }
                        ?>


                        <!--  -->
                    </div>
                    <div class="modal-footer">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn_edit shadow-none">Add Room</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Room Modal -->
    <div class="modal fade my_modal_edit_room" data-bs-backdrop="static" data-bs-keyboard="false" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" id="modal_form_add">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModalLabel">Edit Room</h1>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body modal-body-edit">

                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // ======================== Variables ========================
        const modal_form_add = document.getElementById('modal_form_add');

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
                scrollY: '500px', // Set a fixed height for vertical scrolling
                language: {
                    search: "Search Any Details:",
                    paginate: {
                        next: '>',
                        previous: '<'
                    }
                }
            });
        });

        // ======================== Show Modal ========================
        function show_modal(button) {
            // Fetch data from the row
            const row = button.closest('tr');

            // Assuming row.cells[0].innerHTML contains the <img> tag
            let imgElement = new DOMParser().parseFromString(row.cells[0].innerHTML, 'text/html').body.firstChild;
            let imgSrc = imgElement.src;

            const id = row.cells[3].innerHTML

            const roomPicture = row.cells[0].innerHTML;
            const roomTitle = row.cells[1].innerHTML;
            const roomDescription = row.cells[2].innerHTML;
            const roomMaxPerson = row.cells[3].innerHTML;
            const roomPricePerNight = row.cells[4].innerHTML;

            // Populate the modal with data
            const modalBody = document.querySelector('.modal-body-edit');
            modalBody.innerHTML = `
                    <p style="font-size: .7rem; margin-bottom: 0; font-weight: bold;">Picture</p>
                        <div>${roomPicture}</div>
                        <div><input class="form-control form-control-sm shadow-none mt-1 class_file"  type="file" accept="image/*" value="qwe" required></div>

                        <p style="font-size: .7rem; margin-bottom: 0; font-weight: bold; margin-top: 1rem;">Picture File</p>
                        <div><input  type="text" class="form-control shadow-none class_img_file" value="${imgSrc}"></div>
                        
                    <p style="font-size: .7rem; margin-bottom: 0; font-weight: bold; margin-top: 1rem;">Room Title</p>
                        <div><input  type="text" class="form-control shadow-none class_title" value="${roomTitle}"></div>
                        
                    <p style="font-size: .7rem; margin-bottom: 0; font-weight: bold; margin-top: 1rem;">Room Description</p>
                        <div><input  type="text" class="form-control shadow-none class_description" value="${roomDescription}"></div>

                    <p style="font-size: .7rem; margin-bottom: 0; font-weight: bold; margin-top: 1rem;">Room Max Person</p>
                        <div><input  type="text" class="form-control shadow-none class_max" value="${roomMaxPerson}"></div>

                    <p style="font-size: .7rem; margin-bottom: 0; font-weight: bold; margin-top: 1rem;">Room Price per Night</p>


                        <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">₱</span>
                    <input type="text" class="form-control shadow-none class_night" aria-describedby="basic-addon1" value="${roomPricePerNight}">
                    </div>
                `;

            modalBody.innerHTML += ` <div class="modal-footer">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn_edit shadow-none" onclick="edit_room(${id})">Save</button>
                            </div>
                        </div>`;

            // Show the modal
            const editModal = new bootstrap.Modal(document.getElementById('editModal'));
            editModal.show();
        }

        const form_add_room = document.getElementById('form_add_room');


        form_add_room.addEventListener('submit', (e) => {
            e.preventDefault()
            const picture = document.querySelector('.picture');
            const title = document.querySelector('.title').value;
            const description = document.querySelector('.description').value;
            const max = document.querySelector('.max').value;
            const night = document.querySelector('.night').value;
            add_room(picture, title, description, max, night)
        })

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

        // ======================== Add Room ========================
        function add_room(picture, title, description, max, per_night) {

            let data = new FormData()
            data.append('picture', picture.files[0])
            data.append('title', title)
            data.append('description', description)
            data.append('max', max)
            data.append('per_night', per_night)
            data.append('add_room', '')

            let facilities = []
            form_add_room.elements['facilities'].forEach(el => {
                if (el.checked) {
                    facilities.push(el.value)
                }
            });

            data.append('facilities', JSON.stringify(facilities))


            let xhr = new XMLHttpRequest()
            xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)

            xhr.onload = function() {
                console.log(this.responseText);
                // let my_modal = document.querySelector('.my_modal_add_room')
                // let modal = bootstrap.Modal.getInstance(my_modal)
                // modal.hide()

                // if (this.responseText == 1) {
                //     alert('success', 'Added successfully!')

                //     setTimeout(() => {
                //         window.location.reload();
                //     }, 500);
                // } else {
                //     alert('error', this.responseText)

                // }
            }
            xhr.send(data)

        }

        // ======================== Remove Room ========================
        function remove_room(val) {
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
            xhr.send('remove_room_val=' + val)
        }

        // ======================== Add Room ========================
        modal_form_add.addEventListener('submit', (e) => {
            e.preventDefault()
        })


        // ======================== Update Room ========================
        function edit_room(val) {
            let class_file = document.querySelector('.class_file');
            const class_title = document.querySelector('.class_title');
            // const class_img_file = document.querySelector('.class_img_file');
            const class_description = document.querySelector('.class_description');
            const class_max = document.querySelector('.class_max');
            const class_night = document.querySelector('.class_night');

            let xhr = new XMLHttpRequest()
            xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

            xhr.onload = function() {

                let my_modal = document.querySelector('.my_modal_edit_room')
                let modal = bootstrap.Modal.getInstance(my_modal)
                modal.hide()

                if (this.responseText == 1) {
                    alert('success', 'Changes saved!')

                    setTimeout(() => {
                        window.location.reload();
                    }, 500);

                } else {
                    alert('error', 'No Changes Made!')

                }
            }
            xhr.send('class_file=' + class_file.files[0].name + '&class_title=' + class_title.value +
                '&class_description=' +
                class_description.value + '&class_max=' + class_max.value + '&class_night=' + class_night.value +
                '&edit_room=' + val)
        }
    </script>
</body>

</html>