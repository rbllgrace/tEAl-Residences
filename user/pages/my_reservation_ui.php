<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require('./partials/links.php') ?>

    <style>
        * {
            font-size: .9rem;
        }

        .room_description_text {
            width: 400px;
        }

        .btn_delete {
            background: red;
            border: red;
        }

        .btn_delete:hover {
            background: transparent;
            border: 1px solid red;
            color: black;
        }

        .custom_alert {
            position: fixed;
            /* top: 75px; */
            /* right: 50px; */
            top: 30px;
            right: 41%;
            font-size: 0.8rem;
            font-weight: bold;
            z-index: 1;
            height: 31px;
            display: flex;
            align-items: center;
        }

        .alert-dismissible .btn-close {
            position: absolute;
            top: -9px;
            right: 3px;
            z-index: 2;
            padding: 1.25rem 1rem;
            font-size: 0.7rem;
        }

        tr {
            vertical-align: middle;
        }
    </style>

</head>

<body>
    <div class="container mt-5">
        <div class="top d-flex justify-content-between align-items-center">
            <h1>Reservations</h1>
        </div>
        <table class="table text-center">
            <thead>
                <tr>
                    <th>Room Picture</th>
                    <th>Room Title</th>
                    <th>Room Description</th>
                    <th>Room Max Person</th>
                    <th>Room Price per Night</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table_body">
                <!-- Example row, you can add more rows dynamically -->
            </tbody>
        </table>
        <div class="text-end">
            <button type="button" class="btn btn-primary shadow-none" data-bs-dismiss="alert" data-bs-toggle="modal" data-bs-target="#exampleModal">Reserve
                Now</button>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="display_price"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
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

    function get_rooms_to_serve() {

        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {
            const table_body = document.querySelector('.table_body');
            table_body.innerHTML = this.responseText
            // console.log(this.responseText);
        }
        xhr.send('get_rooms_to_serve')
    }

    function remove_reservation(val) {
        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {

            if (this.responseText == 1) {
                alert('success', 'Changes saved!')
                get_rooms_to_serve()
            } else {
                alert('error', 'Someting went wrong!')

            }
        }
        xhr.send('remove_reservation_val=' + val)
    }

    function get_total() {

        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {
            // const table_body = document.querySelector('.table_body');
            // table_body.innerHTML = this.responseText
            const display_price = document.querySelector('.display_price');
            display_price.innerHTML = this.responseText
        }
        xhr.send('get_total')
    }

    window.onload = function() {
        get_rooms_to_serve()
        get_total()
    }
</script>

</html>