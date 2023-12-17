<div class="center">
    <div class="card">
        <div class="card-body">
            <div class="gen_and_edit">
                <h5 class="card-title">General Settings</h5>
                <!-- Button trigger modal -->
                <div class="d-flex gap-1">
                    <button type="button" class="btn btn-primary btn_edit shadow-none" data-bs-toggle="modal"
                        data-bs-target="#editModal">
                        Edit
                    </button>

                    <button type="button" class="btn btn-primary shadow-none btn_delete_all"
                        onclick="clear_text_general()">
                        Clear All
                    </button>
                </div>

            </div>
            <h6 class="card-subtitle text-body-secondary mt-3">Site Title</h6>
            <p class="card-text mt-0 mb-3 site_title"></p>
            <h6 class="card-subtitle  text-body-secondary">About Us</h6>
            <p class="card-text mt-0 mb-3 site_about"></p>
            <h6 class="card-subtitle  text-body-secondary">Location</h6>
            <p class="card-text mt-0 mb-3 site_location"></p>
        </div>
    </div>
</div>


<!-- General Settings Modal -->
<div class="modal fade my_modal" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
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
                            name="site_title">
                    </div>

                    <div class="mb-1">
                        <label for="exampleFormControlTextarea1" class="form-label fw-bold">About Us</label>
                        <textarea class="form-control shadow-none about_inp" id="exampleFormControlTextarea1" rows="8"
                            name="site_about"></textarea>
                    </div>

                    <div class="mb-1">
                        <label for="exampleFormControlTextarea1" class="form-label fw-bold">Location</label>
                        <input type="text" class="form-control shadow-none loc_inp" id="exampleFormControlInput3"
                            name="loc_inp">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn_edit shadow-none"
                        onclick="update_general(site_title.value, site_about.value, loc_inp.value)">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
let gen_data

window.onload = function() {
    get_general()
}

function get_general() {

    // getting class
    let site_title = document.querySelector('.site_title')
    let site_about = document.querySelector('.site_about')
    let site_location = document.querySelector('.site_location')

    // modal input
    let title_inp = document.querySelector('.title_inp');
    let about_inp = document.querySelector('.about_inp');
    let loc_inp = document.querySelector('.loc_inp');

    let xhr = new XMLHttpRequest()
    xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

    xhr.onload = function() {
        gen_data = JSON.parse(this.responseText)

        site_title.innerText = gen_data.site_title
        site_about.innerText = gen_data.who_we_are
        site_location.innerText = gen_data.location

        title_inp.value = gen_data.site_title
        about_inp.value = gen_data.who_we_are
        loc_inp.value = gen_data.location
    }
    xhr.send('get_general')
}

function update_general(title_inp, about_inp, loc_inp) {

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
    xhr.send('site_title=' + title_inp + '&site_about=' + about_inp + '&loc_inp=' + loc_inp + '&update_general')
}

function clear_text_general() {

    // let site_title = document.querySelector('.site_title')
    // let site_about = document.querySelector('.site_about')

    // let title_inp = document.querySelector('.title_inp');
    // let about_inp = document.querySelector('.about_inp');

    let xhr = new XMLHttpRequest()
    xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

    xhr.onload = function() {
        // gen_data = JSON.parse(this.responseText)

        // site_title.innerText = gen_data.site_title
        // site_about.innerText = gen_data.who_we_are

        // title_inp.value = gen_data.site_title
        // about_inp.value = gen_data.who_we_are
        // console.log(this.responseText);

        if (this.responseText === 'Query executed successfully') {
            get_general()
            alert('success', 'Cleared!')
        }
    }
    xhr.send('clear_text_general')
}
</script>