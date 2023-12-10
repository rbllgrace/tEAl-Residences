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

    .btn_delete_all {
        background: red;
        border-color: red;
        font-size: .8rem;
        margin: 0;
        padding: 0;
        padding: 2px 25px;
    }


    .btn_delete_all:hover {
        background: transparent;
        border-color: red;
        color: black;
    }

    .btn_add {
        background: #008080;
        border-color: #008080;
        font-size: .8rem;
        margin: 0;
        padding: 0;
        padding: 2px 25px;
    }


    .btn_add:hover {
        background: transparent;
        border-color: black;
        color: black;
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

    .btn_delete {
        background: red;
        border-color: red;
        font-size: .8rem;
        margin: 0;
        padding: 0;
        padding: 2px 10px;

        position: absolute;
        right: .8rem;
    }

    .btn_delete:hover {
        background: transparent;
        border-color: red;
        color: black;

    }

    .btn_delete:active {
        background: transparent;
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
        top: 75px;
        right: 50px;
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

    .f-title {
        font-size: .7rem;
    }

    .facilities_container {
        display: grid;
        /* grid-template-columns: 1fr 1fr 1fr 1fr; */
        grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
        gap: 10px;
    }

    i {
        vertical-align: middle;
    }
    </style>
</head>

<body>
    <?php require('./partials/header.php'); ?>
    <?php require('./partials/nav_pills.php'); ?>

    <?php require('./partials/settings_partials/general_settings.php'); ?>
    <?php require('./partials/settings_partials/contact_us_settings.php'); ?>
    <?php require('./partials/settings_partials/why_choose_us_settings.php'); ?>
    <?php require('./partials/settings_partials/faq_settings.php'); ?>

    <script>
    let gen_data, contacts_data, facilities_data, why_choose_us_data

    function get_why_choose_us() {

        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {
            const why_choose_us_container = document.querySelector('.why_choose_us_container');
            why_choose_us_container.innerHTML = this.responseText

            // console.log(this.responseText);
        }
        xhr.send('get_why_choose_us')
    }

    function remove_why_choose_us(val) {
        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {
            console.log(this.responseText);

            if (this.responseText == 1) {
                alert('success', 'Changes saved!')
                get_general()
                get_contacts()
                get_why_choose_us()
            } else {
                alert('error', 'Someting went wrong!')

            }
        }
        xhr.send('remove_why_choose_us=' + val)
    }

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
        }, 2000);
    }

    function get_contacts() {

        let contacts_id = ['phone1', 'phone2', 'phone3', 'facebook', 'email']
        let contacts_class_inp = ['.phone1_inp', '.phone2_inp', '.phone3_inp', '.facebook_inp',
            '.email_inp'
        ]



        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {
            contacts_data = JSON.parse(this.responseText)

            for (let i = 0; i < contacts_id.length; i++) {
                document.getElementById(contacts_id[i]).innerText = contacts_data[i]
                    .contact_content;

                document.querySelector(contacts_class_inp[i]).value = contacts_data[i]
                    .contact_content;
            }

        }
        xhr.send('get_contacts')
    }

    function update_contact(phone1, phone2, phone3, facebook, email) {

        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {

            let my_modal = document.querySelector('.my_modal_contact_us')
            let modal = bootstrap.Modal.getInstance(my_modal)
            modal.hide()


            if (this.responseText.indexOf('1') != -1) {
                alert('success', 'Changes saved!')
                get_general()
                get_contacts()
            } else {
                alert('error', 'No changes made!')

            }
        }

        xhr.send('phone1=' + phone1 + '&phone2=' + phone2 + '&phone3=' + phone3 + '&facebook=' +
            facebook + '&email=' +
            email + '&update_contact')
    }

    window.onload = function() {
        get_general()
        get_contacts()
        get_why_choose_us()
    }
    </script>
</body>

</html>