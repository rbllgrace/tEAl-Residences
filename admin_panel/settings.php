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

    <style>
    * {
        font-family: 'Poppins', sans-serif;
        box-sizing: border-box;
        scroll-behavior: smooth;
    }

    .btn_logout {
        background: black;
        color: white;
        border-color: black;
        font-size: .8rem;
    }

    .btn_logout:hover {
        background: black;
        border-color: white;
    }

    .navbar {
        background: #11151c !important;
        position: fixed;
        top: 0;
        width: 100%;
    }

    .nav-pills {
        width: 250px;
        text-align: center;

        position: fixed;
        top: 56px;
        height: 100%;
        background: #11151c;
        border-top: 1px solid white;
    }

    .nav-pills .nav-link {
        color: white;
    }

    .center {
        margin-left: 20vw;
        margin-top: 5%;
        padding-right: 25px;
    }

    .gen_and_edit {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .btn_edit {
        background: #11151c;
        border-color: #11151c;
        font-size: .8rem;
        margin: 0;
        padding: 0;
        padding: 2px 25px;
    }

    .btn_edit:hover {
        background: transparent;
        border-color: black;
        color: black;
    }

    .card-title {
        margin-bottom: 0;
    }

    .card-text:last-child {
        margin-bottom: 0;
        font-size: .8rem;
    }

    .btn-check:focus+.btn-primary,
    .btn-primary:focus {
        background: #11151c;
        border-color: black;
        color: white;
        box-shadow: 0 0 0 .25rem rgba(49, 132, 253, .5);
    }

    .bi-pencil-square {
        vertical-align: middle;
        margin-right: 5px;
    }

    .title_inp,
    .about_inp {
        font-size: .8rem;
    }

    .form-label {
        margin-bottom: 0;
        font-size: .9rem;
    }

    .custom_alert {
        position: fixed;
        top: 25px;
        right: 25px;
        font-size: 0.8rem;
    }

    .alert-dismissible .btn-close {
        position: absolute;
        top: 0px;
        right: 3px;
        z-index: 2;
        padding: 1.25rem 1rem;
        font-size: 0.7rem;
    }
    </style>
</head>

<body>
    <?php require('./partials/header.php'); ?>
    <?php require('./partials/nav_pills.php'); ?>


    <div class="center">
        <div class="card">
            <div class="card-body">
                <div class="gen_and_edit">
                    <h5 class="card-title">General Settings</h5>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn_edit shadow-none" data-bs-toggle="modal"
                        data-bs-target="#editModal">
                        <i class="bi bi-pencil-square"></i>Edit
                    </button>
                </div>
                <h6 class="card-subtitle text-body-secondary mt-3">Site Title</h6>
                <p class="card-text site_title"></p>
                <h6 class="card-subtitle  text-body-secondary">About Us</h6>

                <p class="card-text site_about"></p>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade my_modal" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModalLabel">General Settings</h1>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-1">
                            <label for="exampleFormControlInput3" class="form-label">Site Title</label>
                            <input type="text" class="form-control shadow-none title_inp" id="exampleFormControlInput3"
                                name="site_title">
                        </div>

                        <div class="mb-1">
                            <label for="exampleFormControlTextarea1" class="form-label">About Us</label>
                            <textarea class="form-control shadow-none about_inp" id="exampleFormControlTextarea1"
                                rows="5" name="site_about"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn_edit shadow-none"
                            onclick="update_general(site_title.value, site_about.value)">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <script>
    let gen_data

    function get_general() {
        let site_title = document.querySelector('.site_title')
        let site_about = document.querySelector('.site_about')

        let title_inp = document.querySelector('.title_inp');
        let about_inp = document.querySelector('.about_inp');

        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {
            gen_data = JSON.parse(this.responseText)

            // console.log(gen_data);

            site_title.innerText = gen_data.site_title
            site_about.innerText = gen_data.who_we_are

            title_inp.value = gen_data.site_title
            about_inp.value = gen_data.who_we_are
        }
        xhr.send('get_general')
    }

    function update_general(title_inp, about_inp) {


        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {

            let my_modal = document.querySelector('.my_modal')
            let modal = bootstrap.Modal.getInstance(my_modal)
            modal.hide()

            if (this.responseText == 1) {
                alert('success', 'Changes saved!')

                get_general()
            } else {
                alert('error', 'No changes made!')


            }
        }
        xhr.send('site_title=' + title_inp + '&site_about=' + about_inp + '&update_general')
    }

    function alert(type, msg) {

        let base_class = (type == 'success') ? 'alert-success' : 'alert-danger'

        let element = document.createElement('div')

        element.innerHTML = `<div class="alert ${base_class} alert-dismissible fade show custom_alert" role="alert">
            ${msg}
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>`

        document.body.append(element)

    }

    window.onload = function() {
        get_general()
    }
    </script>
</body>

</html>