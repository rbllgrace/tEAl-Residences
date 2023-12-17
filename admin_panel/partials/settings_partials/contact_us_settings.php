<div class="center mt-3">
    <div class="card">
        <div class="card-body">
            <div class="gen_and_edit">
                <h5 class="card-title">Contact Us Settings</h5>
                <!-- Button trigger modal -->
                <div class="d-flex gap-1 mb-1">
                    <button type="button" class="btn btn-primary btn_add shadow-none" data-bs-toggle="modal" data-bs-target="#contactAboutUsModal">
                        Add Contact
                    </button>
                </div>
            </div>
            <div class="body_to_get_data mt-2">

            </div>

        </div>
    </div>
</div>

<!-- Contact Us Modal -->
<div class="modal fade my_modal_add_contact" data-bs-backdrop="static" data-bs-keyboard="false" id="contactAboutUsModal" tabindex="-1" aria-labelledby="contactAboutUsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" id="form_add_contact">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="contactAboutUsModalLabel">Add Contact</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="mb-1">
                            <label style="font-size: .7rem; font-weight: 500; position: relative; top: 3px;">Contact
                                Icon</label> <a href="https://icons.getbootstrap.com/" target="_blank" style="font-size: .6rem; position: relative; top: 2px;">select
                                icon</a>
                            <input type="text" class="form-control contact_us shadow-none icon" required>
                        </div>

                        <div class="mb-1">
                            <label style="font-size: .7rem; font-weight: 500; position: relative; top: 3px;">Contact
                                Content</label>
                            <input type="text" class="form-control contact_us shadow-none content" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn_edit shadow-none">Add
                        Contact</button>
                </div>
        </form>

    </div>
    </form>
</div>
</div>



<!-- Edit Contact Modal -->
<div class="modal fade my_modal_edit_contact" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal_content_customized">

        </div>
    </div>
</div>

<script>
    const body_to_get_data = document.querySelector('.body_to_get_data');

    function get_contacts() {
        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {

            let data = JSON.parse(this.responseText)
            const length = data.length
            for (let i = 0; i < length; i++) {
                body_to_get_data.innerHTML += `
            <div class="d-flex align-items-center gap-1 justify-content-between">
                <div class="d-flex align-items-center gap-1">
                     ${data[i].icon}
                    <p class="card-text mt-0">${data[i].contact_content}</p>
                </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn_edit shadow-none" onclick="get_single_contact_with_id(${data[i].id})" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-primary btn_delete shadow-none" onclick="delete_single_contact(${data[i].id})"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
                <br>
            `
            }
        }
        xhr.send('get_contacts')
    }


    const content = document.querySelector('.content');
    const icon = document.querySelector('.icon');

    const form_add_contact = document.getElementById('form_add_contact')
    form_add_contact.addEventListener('submit', (e) => {
        e.preventDefault()

        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {

            let my_modal = document.querySelector('.my_modal_add_contact')
            let modal = bootstrap.Modal.getInstance(my_modal)
            modal.hide()

            if (this.responseText == 1) {
                alert('success', 'Contact Added!')
                setTimeout(() => {
                    window.location.reload();
                }, 500);
            } else {
                alert('error', 'No changes made!')
            }
        }

        xhr.send('content=' + content.value + '&icon=' + icon.value + '&add_contact')
    })

    function delete_single_contact(contact_id) {
        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {
            if (this.responseText == 1) {
                alert('success', 'Contact Removed!')
                setTimeout(() => {
                    window.location.reload();
                }, 500);
            } else {
                alert('error', 'No changes made!')
            }
        }

        xhr.send('contact_id=' + contact_id + '&delete_single_contact')
    }

    const modal_content_customized = document.querySelector('.modal_content_customized');

    function get_single_contact_with_id(contact_id) {
        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {

            modal_content_customized.innerHTML = this.responseText
        }

        xhr.send('contact_id=' + contact_id + '&get_single_contact_with_id')
    }



    function edit_contact_by_id(contact_id) {
        const icon_inp = document.querySelector('.icon_inp');
        const content_inp = document.querySelector('.content_inp');

        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {

            let my_modal = document.querySelector('.my_modal_edit_contact')
            let modal = bootstrap.Modal.getInstance(my_modal)
            modal.hide()

            if (this.responseText == 1) {
                alert('success', 'Contact Edited!')
                setTimeout(() => {
                    window.location.reload();
                }, 500);
            } else {
                alert('error', this.responseText + '!')
            }
        }

        xhr.send('icon_inp=' + icon_inp.value + '&content_inp=' + content_inp.value + '&contact_id=' + contact_id +
            '&edit_contact_by_id')

    }
</script>