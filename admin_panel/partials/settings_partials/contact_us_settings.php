<div class="center mt-3">
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

<!-- Contact Us Modal -->
<div class="modal fade my_modal_contact_us" id="editAboutUsModal" tabindex="-1" aria-labelledby="editAboutUsModalLabel"
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
                        <input type="number" class="form-control contact_us shadow-none phone1_inp"
                            id="exampleFormControlInput3" name="phone1" required>
                    </div>

                    <div class="mb-1">
                        <label for="exampleFormControlInput3" class="form-label fw-bold text-sm">Phone #2</label>
                        <input type="number" class="form-control contact_us shadow-none phone2_inp"
                            id="exampleFormControlInput3" name="phone2" required>
                    </div>

                    <div class="mb-1">
                        <label for="exampleFormControlInput3" class="form-label fw-bold text-sm">Phone #3</label>
                        <input type="number" class="form-control contact_us shadow-none phone3_inp"
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
let contacts_data

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
</script>