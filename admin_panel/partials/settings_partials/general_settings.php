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
                        <textarea class="form-control shadow-none about_inp" id="exampleFormControlTextarea1" rows="8"
                            name="site_about" required></textarea>
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
</script>