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
    <link rel="stylesheet" href="./public/css/rooms.css">

</head>

<body>
    <?php require('./partials/header.php'); ?>
    <?php require('./partials/nav_pills.php'); ?>


    <div class="center">
        <div class="top d-flex justify-content-between align-items-center">
            <h1>Rooms</h1>
            <button class="btn btn-primary btn_add shadow-none" data-bs-toggle="modal" data-bs-target="#addRoomModal"><i
                    class="bi bi-plus-square"></i>&nbsp; Add</button>
        </div>
        <table class="table">

            <thead>
                <tr>
                    <th>Room Picture</th>
                    <th>Room Title</th>
                    <th>Room Description</th>
                    <th>Room Max Person</th>
                    <th>Room Price per Night</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table_body">
                <!-- Example row, you can add more rows dynamically -->
            </tbody>
        </table>
    </div>



    <!-- Add Room Modal -->
    <div class="modal fade my_modal_add_room" id="addRoomModal" tabindex="-1" aria-labelledby="addRoomModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="" id="form_add_room" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addRoomModalLabel">Edit Room</h1>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!--  -->
                        <p style="font-size: .7rem; margin-bottom: 0; font-weight: bold;">Picture</p>
                        <input required class="form-control form-control-sm shadow-none picture" type="file"
                            accept="image/*">

                        <p style="font-size: .7rem; margin-bottom: 0; font-weight: bold; margin-top: 1rem;">Room Title
                        </p>
                        <input required type="text" class="form-control shadow-none title" name="room_title_inp">

                        <p style="font-size: .7rem; margin-bottom: 0; font-weight: bold; margin-top: 1rem;">Room
                            Description </p>
                        <input required type="text" class="form-control shadow-none description"
                            name="room_description_inp">

                        <p style="font-size: .7rem; margin-bottom: 0; font-weight: bold; margin-top: 1rem;">Room Max
                            Person </p>
                        <input required type="text" class="form-control shadow-none max" name="room_max_person_inp">

                        <p style="font-size: .7rem; margin-bottom: 0; font-weight: bold; margin-top: 1rem;">Room Price
                            per
                            Night</p>

                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">₱</span>
                            <input required type="text" class="form-control shadow-none night"
                                aria-describedby="basic-addon1" name="room_per_night_inp">
                        </div>
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
    <div class="modal fade my_modal_add_us" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="" id="modal_form_add">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModalLabel">Edit Room</h1>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body modal-body-edit">

                    </div>
                    <div class="modal-footer">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn_edit shadow-none">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
    function get_rooms() {

        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {
            const table_body = document.querySelector('.table_body');
            table_body.innerHTML = this.responseText
            // console.log(this.responseText);
        }
        xhr.send('get_rooms')
    }

    window.onload = function() {
        get_rooms()
    }

    function edit_room(button) {
        // Fetch data from the row
        const row = button.closest('tr');
        const roomPicture = row.cells[0].innerHTML;
        const roomTitle = row.cells[1].innerHTML;
        const roomDescription = row.cells[2].innerHTML;
        const roomMaxPerson = row.cells[3].innerHTML;
        const roomPricePerNight = row.cells[4].innerHTML;

        // Populate the modal with data
        const modalBody = document.querySelector('.modal-body-edit');
        modalBody.innerHTML = `
        <p style="font-size: .7rem; margin-bottom: 0; font-weight: bold;">Picture</p>
            <div">${roomPicture}</div>
            <div><input class="form-control form-control-sm shadow-none mt-1"  type="file" accept="image/*"></div>
            
        <p style="font-size: .7rem; margin-bottom: 0; font-weight: bold; margin-top: 1rem;">Room Title</p>
            <div><input  type="text" class="form-control shadow-none" value="${roomTitle}"></div>
            
        <p style="font-size: .7rem; margin-bottom: 0; font-weight: bold; margin-top: 1rem;">Room Description</p>
            <div><input  type="text" class="form-control shadow-none" value="${roomDescription}"></div>

        <p style="font-size: .7rem; margin-bottom: 0; font-weight: bold; margin-top: 1rem;">Room Max Person</p>
            <div><input  type="text" class="form-control shadow-none" value="${roomMaxPerson}"></div>

        <p style="font-size: .7rem; margin-bottom: 0; font-weight: bold; margin-top: 1rem;">Room Price per Night</p>


            <div class="input-group">
  <span class="input-group-text" id="basic-addon1">₱</span>
  <input type="text" class="form-control shadow-none" aria-describedby="basic-addon1" value="${roomPricePerNight}">
</div>
        `;

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

    function add_room(picture, title, description, max, per_night) {

        let data = new FormData()
        data.append('picture', picture.files[0])
        data.append('title', title)
        data.append('description', description)
        data.append('max', max)
        data.append('per_night', per_night)
        data.append('add_room', '')


        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)

        xhr.onload = function() {
            console.log(this.responseText);
        }
        xhr.send(data)

    }
    </script>
</body>

</html>