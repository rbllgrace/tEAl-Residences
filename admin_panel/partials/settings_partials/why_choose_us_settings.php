<div class="center mt-3">
    <div class="card">
        <div class="card-body">
            <div class="gen_and_edit">
                <h5 class="card-title">Why Choose Us Settings</h5>
                <!-- Button trigger modal -->
                <div class="d-flex gap-1 mb-1">
                    <button type="button" class="btn btn-primary btn_add shadow-none" data-bs-toggle="modal"
                        data-bs-target="#addContentModal">
                        Add Content
                    </button>
                </div>
            </div>
            <div class="body_to_get_data_why_choose_us mt-2">

            </div>

        </div>
    </div>
</div>



<!-- Edit Why Choose Modal -->
<div class="modal fade modal_edit_why_choose_us" id="editWhyChooseUs" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="editWhyChooseUsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal_content_edit_inp_container">

        </div>
    </div>
</div>


<!-- Add Content Modal -->
<div class="modal fade modal_add_content" id="addContentModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="addContentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" id="form_add_why_choose_us">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="contactAboutUsModalLabel">Add Content</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="mb-1">
                            <label style="font-size: .7rem; font-weight: 500; position: relative; top: 3px;">
                                Icon</label> <a href="https://icons.getbootstrap.com/" target="_blank"
                                style="font-size: .6rem; position: relative; top: 2px;">select
                                icon</a>
                            <input type="text" class="form-control contact_us shadow-none icon_why" required>
                        </div>

                        <div class="mb-1">
                            <label style="font-size: .7rem; font-weight: 500; position: relative; top: 3px;">
                                Title</label>
                            <input type="text" class="form-control contact_us shadow-none title_why" required>
                        </div>

                        <div class="mb-1">
                            <label style="font-size: .7rem; font-weight: 500; position: relative; top: 3px;">
                                Description</label>
                            <input type="text" class="form-control contact_us shadow-none description_why" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn_edit shadow-none">Add
                        Contact</button>
                </div>
        </form>
    </div>
</div>

<script>
const body_to_get_data_why_choose_us = document.querySelector('.body_to_get_data_why_choose_us');

function get_why_choose_us() {
    let xhr = new XMLHttpRequest()
    xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

    xhr.onload = function() {

        let data = JSON.parse(this.responseText)
        const length = data.length
        for (let i = 0; i < length; i++) {
            body_to_get_data_why_choose_us.innerHTML += `
            <div class="d-flex align-items-center gap-1 justify-content-between">
                <div class="d-flex align-items-center gap-1">
                    <div>
                        <div class="d-flex align-items-center gap-2">
                            <label style="font-size: .7rem; font-weight: 600;">Icon: </label>
                            <p class="card-text mt-0"> ${data[i].icon}</p>
                        </div>
                       
                        <div class="d-flex align-items-center gap-2">
                            <label style="font-size: .7rem; font-weight: 600;">Title: </label>
                            <p class="card-text mt-0" style="font-size: .7rem;"> ${data[i].title}</p>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <label style="font-size: .7rem; font-weight: 600;">Description: </label>
                            <p class="card-text mt-0" style="font-size: .7rem;"> ${data[i].description}</p>
                        </div>
                    </div>
                    
                </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn_edit shadow-none" onclick="get_single_why_choose_us_contact_with_id(${data[i].id})" data-bs-toggle="modal" data-bs-target="#editWhyChooseUs"
                        ><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-primary btn_delete shadow-none" onclick="delete_single_why_choose_us(${data[i].id})" ><i class="bi bi-trash"></i></button>
                    </div>
                </div>
                <br>
            `
        }
    }
    xhr.send('get_why_choose_us')
}

const modal_content_edit_inp_container = document.querySelector('.modal_content_edit_inp_container');

function get_single_why_choose_us_contact_with_id(contact_id) {
    let xhr = new XMLHttpRequest()
    xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

    xhr.onload = function() {

        modal_content_edit_inp_container.innerHTML = this.responseText
    }

    xhr.send('contact_id=' + contact_id + '&get_single_why_choose_us_contact_with_id')
}

function edit_why_choose_by_id(id) {
    const icon_inp_why = document.querySelector('.icon_inp_why_choose_us');
    const title_inp = document.querySelector('.title_inp_why_choose_us');
    const description_inp = document.querySelector('.description_inp_why_choose_us');

    let xhr = new XMLHttpRequest()
    xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

    xhr.onload = function() {

        let my_modal = document.querySelector('.modal_edit_why_choose_us')
        let modal = bootstrap.Modal.getInstance(my_modal)
        modal.hide()

        if (this.responseText == 1) {
            alert('success', 'Why Choose Us Edited!')
            setTimeout(() => {
                window.location.reload();
            }, 500);
        } else {
            alert('error', this.responseText + '!')
        }
    }

    xhr.send('icon_inp_why=' + icon_inp_why.value + '&title_inp=' + title_inp.value + '&description_inp=' +
        description_inp
        .value + '&id=' + id +
        '&edit_why_choose_by_id')

}

const icon_why = document.querySelector('.icon_why');
const title_why = document.querySelector('.title_why');
const description_why = document.querySelector('.description_why');

const form_add_why_choose_us = document.getElementById('form_add_why_choose_us')
form_add_why_choose_us.addEventListener('submit', (e) => {
    e.preventDefault()

    let xhr = new XMLHttpRequest()
    xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

    xhr.onload = function() {

        let my_modal = document.querySelector('.modal_add_content')
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

    xhr.send('icon_why=' + icon_why.value + '&title_why=' + title_why.value + '&description_why=' +
        description_why.value + '&add_why_choose_us')
})

function delete_single_why_choose_us(contact_id) {
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
            alert('error', 'No changes made!')
        }
    }

    xhr.send('contact_id=' + contact_id + '&delete_single_why_choose_us')
}
</script>