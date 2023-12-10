<div class="center mt-3">
    <div class="card">
        <div class="card-body">
            <div class="gen_and_edit">
                <h5 class="card-title">Why Choose Us Settings</h5>
                <!-- Button trigger modal -->
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-primary btn_edit shadow-none" data-bs-toggle="modal"
                        data-bs-target="#editWhyChooseUsModal">
                        <i class="bi bi-pencil-square"></i>&nbsp;Edit
                    </button>
                    <button type="button" class="btn btn-primary btn_add shadow-none" data-bs-toggle="modal"
                        data-bs-target="#addWhyChooseUsModal">
                        <i class="bi bi-plus-square"></i>&nbsp;Add
                    </button>
                </div>

            </div>
            <form action="">
                <div class="why_choose_us_container">

                </div>
            </form>
        </div>
    </div>
</div>

<!-- Why Choose Us Modal -->
<!-- Scrollable Modal -->
<div class="modal fade my_modal_facility_us" id="editWhyChooseUsModal" tabindex="-1" role="dialog"
    aria-labelledby="editWhyChooseUsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editWhyChooseUsModalLabel"> Why Choose Us Edit</h1>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your scrollable content goes here -->
                <form action="" id="form_to_submit">
                    <div class="why_choose_us_inp_container">

                    </div>
                </form>
            </div>
            <!-- <div class="modal-footer">
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn_edit shadow-none" onclick="update_why_choose_us()">Save</button>
                </div>
            </div> -->
        </div>
    </div>

</div>

<div class="modal fade my_modal_add_us" id="addWhyChooseUsModal" tabindex="-1"
    aria-labelledby="addWhyChooseUsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" id="modal_form_add">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addWhyChooseUsModalLabel">Why Choose Us Add</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="exampleFormControlInput3" class="form-label fw-bold f-title">Why Choose Us</label>
                        <br><span style="font-size: .7rem;">Title</span>
                        <input type="text" class="form-control shadow-none contact_us input_one"
                            id="exampleFormControlInput3" required name="title_inp">

                        <span style="font-size: .7rem;">Description</span>
                        <input type="text" class="form-control shadow-none contact_us input_two"
                            id="exampleFormControlInput3" required name="desc_inp">

                        <!-- icon -->
                        <label for="exampleFormControlInput3" class="form-label fw-bold f-title">Icon</label>
                        <a href="https://icons.getbootstrap.com/" target="_blank" style="font-size: .6rem;">select
                            icon.</a>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control shadow-none contact_us input_three"
                                id="exampleFormControlInput3" aria-describedby="basic-addon1" name="icon_inp" required>
                            <!-- icon -->
                        </div>
                    </div>
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
let why_choose_us_data

function get_why_choose_us_inp() {

    let xhr = new XMLHttpRequest()
    xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

    xhr.onload = function() {
        const why_choose_us_inp_container = document.querySelector('.why_choose_us_inp_container');
        why_choose_us_inp_container.innerHTML = this.responseText
        // console.log(this.responseText);
    }
    xhr.send('get_why_choose_us_inp')
}

const form_to_submit = document.getElementById('form_to_submit');
form_to_submit.addEventListener('submit', (e) => {
    e.preventDefault()
})

const modal_form_add = document.getElementById('modal_form_add')
modal_form_add.addEventListener('submit', (e) => {
    e.preventDefault()
    const input_one = document.querySelector('.input_one').value;
    const input_two = document.querySelector('.input_two').value;
    const input_three = document.querySelector('.input_one').value;


    add_why_choose_us(input_one, input_two, input_three)
})

function add_why_choose_us(title_val, des_val, icon_val) {
    let xhr = new XMLHttpRequest()
    xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

    xhr.onload = function() {

        let my_modal = document.querySelector('.my_modal_add_us')
        let modal = bootstrap.Modal.getInstance(my_modal)
        modal.hide()

        if (this.responseText == 1) {
            alert('success', 'Changes saved!')
            get_why_choose_us()

        } else {
            alert('error', 'No changes made!')

        }

        console.log(this.responseText);
    }

    xhr.send('title_val=' + title_val + '&des_val=' + des_val + '&icon_val=' + icon_val + '&add_why_choose_us')
}

function update_why_choose_us(...args) {
    let xhr = new XMLHttpRequest()
    xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

    xhr.onload = function() {

        // let my_modal = document.querySelector('.my_modal_facility_us')
        // let modal = bootstrap.Modal.getInstance(my_modal)
        // modal.hide()


        // if (this.responseText.indexOf('1') != -1) {
        //     alert('success', 'Changes saved!')
        //     get_facilities()
        // } else {
        //     alert('error', 'No changes made!')

        // }

        console.log(this.responseText);
    }

    xhr.send('all_values=' + args + '&update_why_choose_us=' + update_why_choose_us)
}


function get_why_choose_us() {

    let xhr = new XMLHttpRequest()
    xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

    xhr.onload = function() {
        const why_choose_us_container = document.querySelector('.why_choose_us_container');
        why_choose_us_container.innerHTML = this.responseText
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
</script>