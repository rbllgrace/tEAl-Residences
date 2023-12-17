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
    <link rel="stylesheet" href="./public/css/alert.css">
    <link rel="stylesheet" href="./public/css/facilities.css">
    <link rel="stylesheet" href="./public/css/common.css">
</head>

<body>
    <?php require('./partials/header.php'); ?>
    <?php require('./partials/nav_pills.php'); ?>

    <div class="center mt-3">
        <div class="card">
            <div class="card-body">
                <div class="gen_and_edit">
                    <h5 class="card-title">Facilities Settings</h5>
                    <!-- Button trigger modal -->
                    <div class="d-flex gap-1 mb-1">
                        <button type="button" class="btn btn-primary btn_add shadow-none" data-bs-toggle="modal" data-bs-target="#facitlitiesAddModal">
                            Add Facility
                        </button>
                    </div>
                </div>
                <div class="body_to_get_data_facilities mt-2">

                </div>

            </div>
        </div>
    </div>

    <!-- Edit Why Choose Modal -->
    <div class="modal fade modal_edit_why_choose_us" id="edit_facility" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="edit_facilityLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal_content_edit_inp_container">

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade modal_add_facility" id="facitlitiesAddModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="facitlitiesAddModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" id="form_add_facility">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="contactAboutUsModalLabel">Add Facility</h1>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-1">
                            <label style="font-size: .7rem; font-weight: 500; position: relative; top: 3px;">
                                Icon</label> <a href="https://icons.getbootstrap.com/" target="_blank" style="font-size: .6rem; position: relative; top: 2px;">select
                                icon</a>
                            <input type="text" class="form-control contact_us shadow-none icon_why" required>
                        </div>

                        <div class="mb-1">
                            <label style="font-size: .7rem; font-weight: 500; position: relative; top: 3px;">
                                Title</label>
                            <input type="text" class="form-control contact_us shadow-none title_why" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn_edit shadow-none">Add
                            Facility</button>
                    </div>
            </form>
        </div>
    </div>


    <script>
        const body_to_get_data_facilities = document.querySelector('.body_to_get_data_facilities');

        function get_facilities() {
            let xhr = new XMLHttpRequest()
            xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

            xhr.onload = function() {

                let data = JSON.parse(this.responseText)
                const length = data.length
                for (let i = 0; i < length; i++) {
                    body_to_get_data_facilities.innerHTML += `
            <div class="d-flex align-items-center gap-1 justify-content-between">
                <div class="d-flex align-items-center gap-1">
                    <div>
                        <div class="d-flex align-items-center gap-2">
                            <label style="font-size: .7rem; font-weight: 600;">Icon: </label>
                            <p class="card-text mt-0"> ${data[i].icon}</p>
                        </div>

                        <div class="d-flex align-items-center gap-2">
                            <label style="font-size: .7rem; font-weight: 600;">Title: </label>
                            <p class="card-text mt-0" style="font-size: .7rem;"> ${data[i].item}</p>
                        </div>
                    </div>
                </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn_edit shadow-none" onclick="get_single_facility_with_id(${data[i].id})" data-bs-toggle="modal" data-bs-target="#edit_facility"
                        ><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-primary btn_delete shadow-none" onclick="delete_single_facility(${data[i].id})" ><i class="bi bi-trash"></i></button>
                    </div>
                </div>
                <br>
            `
                }
            }
            xhr.send('get_facilities')
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

        const form_add_facility = document.getElementById('form_add_facility')
        const icon_why = document.querySelector('.icon_why');
        const title_why = document.querySelector('.title_why');

        form_add_facility.addEventListener('submit', (e) => {
            e.preventDefault()

            let xhr = new XMLHttpRequest()
            xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

            xhr.onload = function() {

                let my_modal = document.querySelector('.modal_add_facility')
                let modal = bootstrap.Modal.getInstance(my_modal)
                modal.hide()

                if (this.responseText == 1) {
                    alert('success', 'Added!')
                    setTimeout(() => {
                        window.location.reload();
                    }, 500);
                } else {
                    alert('error', 'Please try again later!')
                }
            }

            xhr.send('icon_why=' + icon_why.value + '&title_why=' + title_why.value + '&add_facility')
        })

        function delete_single_facility(contact_id) {
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

            xhr.send('contact_id=' + contact_id + '&delete_single_facility')
        }
        const modal_content_edit_inp_container = document.querySelector('.modal_content_edit_inp_container');


        function get_single_facility_with_id(contact_id) {
            let xhr = new XMLHttpRequest()
            xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

            xhr.onload = function() {

                modal_content_edit_inp_container.innerHTML = this.responseText
            }

            xhr.send('contact_id=' + contact_id + '&get_single_facility_with_id')
        }

        function edit_facility_by_id(id) {
            const icon_inp_why = document.querySelector('.icon_inp_fac');
            const title_inp = document.querySelector('.title_inp_fac');

            let xhr = new XMLHttpRequest()
            xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

            xhr.onload = function() {

                let my_modal = document.querySelector('.modal_edit_why_choose_us')
                let modal = bootstrap.Modal.getInstance(my_modal)
                modal.hide()

                if (this.responseText == 1) {
                    alert('success', 'Edited!')
                    setTimeout(() => {
                        window.location.reload();
                    }, 500);
                } else {
                    alert('error', this.responseText + '!')
                }
            }

            xhr.send('icon_inp_why=' + icon_inp_why.value + '&title_inp=' + title_inp.value +
                '&id=' + id +
                '&edit_facility_by_id')

        }


        window.onload = function() {
            get_facilities()
        }
    </script>

</body>

</html>