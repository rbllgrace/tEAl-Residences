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

    .card-text {
        margin-bottom: 0;
        font-size: .8rem;
        margin-block: .3rem;
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

    .contact_us {
        font-size: .8rem;
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
                    <h5 class="card-title">Contact Us Settings</h5>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn_edit shadow-none" data-bs-toggle="modal"
                        data-bs-target="#editAboutUsModal">
                        <i class="bi bi-pencil-square"></i>Edit
                    </button>
                </div>
                <h6 class="card-subtitle text-body-secondary mt-3"><i class="bi bi-phone"></i> Phone #1</h6>
                <p class="card-text" id="phone1"></p>
                <h6 class="card-subtitle text-body-secondary mt-3"><i class="bi bi-phone"></i> Phone #2</h6>
                <p class="card-text" id="phone2"></p>
                <h6 class="card-subtitle text-body-secondary mt-3"><i class="bi bi-phone"></i> Phone #3</h6>
                <p class="card-text" id="phone3"></p>
                <h6 class="card-subtitle text-body-secondary mt-2"><i class="bi bi-facebook"></i> Facebook</h6>
                <p class="card-text mb-2" id="facebook"></p>
                <h6 class="card-subtitle text-body-secondary"><i class="bi bi-envelope"></i> Email</h6>
                <p class="card-text" id="email"></p>
            </div>
        </div>
    </div>

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

    <!-- General Settings Modal -->
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
                            <label for="exampleFormControlInput3" class="form-label fw-bold">Site Title</label>
                            <input type="text" class="form-control shadow-none title_inp" id="exampleFormControlInput3"
                                name="site_title" required>
                        </div>

                        <div class="mb-1">
                            <label for="exampleFormControlTextarea1" class="form-label fw-bold">About Us</label>
                            <textarea class="form-control shadow-none about_inp" id="exampleFormControlTextarea1"
                                rows="8" name="site_about" required></textarea>
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

    <!-- Contact Us Modal -->
    <div class="modal fade my_modal" id="editAboutUsModal" tabindex="-1" aria-labelledby="editAboutUsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editAboutUsModalLabel">Contact Us Settings</h1>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-1">
                            <label for="exampleFormControlInput3" class="form-label fw-bold text-sm">Phone #1</label>
                            <input type="text" class="form-control contact_us shadow-none phone1_inp"
                                id="exampleFormControlInput3" name="phone1" required>
                        </div>

                        <div class="mb-1">
                            <label for="exampleFormControlInput3" class="form-label fw-bold text-sm">Phone #2</label>
                            <input type="text" class="form-control contact_us shadow-none phone2_inp"
                                id="exampleFormControlInput3" name="phone2" required>
                        </div>

                        <div class="mb-1">
                            <label for="exampleFormControlInput3" class="form-label fw-bold text-sm">Phone #3</label>
                            <input type="text" class="form-control contact_us shadow-none phone3_inp"
                                id="exampleFormControlInput3" name="phone3" required>
                        </div>

                        <div class="mb-1">
                            <label for="exampleFormControlInput3" class="form-label fw-bold text-sm">Facebook</label>
                            <input type="text" class="form-control contact_us shadow-none facebook_inp"
                                id="exampleFormControlInput3" name="facebook" required>
                        </div>

                        <div class="mb-1">
                            <label for="exampleFormControlInput3" class="form-label fw-bold text-sm">Email</label>
                            <input type="text" class="form-control contact_us shadow-none email_inp"
                                id="exampleFormControlInput3" name="email" required>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn_edit shadow-none"
                            onclick="update_contact(phone1.value, phone2.value, phone3.value, facebook.value, email.value)">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <script>
    let gen_data, contacts_data

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

        // Use setTimeout to remove the alert after the specified duration
        setTimeout(function() {
            element.remove();
        }, 1000);
    }

    function get_contacts() {

        let contacts_id = ['phone1', 'phone2', 'phone3', 'facebook', 'email']
        let contacts_class_inp = ['.phone1_inp', '.phone2_inp', '.phone3_inp', '.facebook_inp', '.email_inp']



        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {
            contacts_data = JSON.parse(this.responseText)

            for (let i = 0; i < contacts_id.length; i++) {
                document.getElementById(contacts_id[i]).innerText = contacts_data[i].contact_content;

                document.querySelector(contacts_class_inp[i]).value = contacts_data[i].contact_content;
            }

        }
        xhr.send('get_contacts')
    }

    function update_contact(phone1, phone2, phone3, facebook, email) {


        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {

            // let my_modal = document.querySelector('.my_modal')
            // let modal = bootstrap.Modal.getInstance(my_modal)
            // modal.hide()

            // if (this.responseText == 1) {
            //     alert('success', 'Changes saved!')
            //     get_general()
            //     get_contacts()
            // } else {
            //     alert('error', 'No changes made!')
            // }
            console.log(this.responseText);

        }
        // xhr.send('site_title=' + title_inp + '&site_about=' + about_inp + '&update_general')
        xhr.send('phone1=' + phone1 + '&phone2=' + phone2 + '&phone3=' + phone3 + '&facebook=' + facebook + '&email=' +
            email + '&update_contact')
    }

    window.onload = function() {
        get_general()
        get_contacts()
    }
    </script>
</body>

</html>