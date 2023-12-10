<div class="center mt-3">
    <div class="card">
        <div class="card-body">
            <div class="gen_and_edit">
                <h5 class="card-title">Why Choose Us Settings</h5>
                <!-- Button trigger modal -->
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-primary btn_edit shadow-none" data-bs-toggle="modal" data-bs-target="#editWhyChooseUsModal">
                        <i class="bi bi-pencil-square"></i>&nbsp;Edit
                    </button>
                    <button type="button" class="btn btn-primary btn_add shadow-none" data-bs-toggle="modal" data-bs-target="#addWhyChooseUsModal">
                        <i class="bi bi-plus-square"></i>&nbsp;Add
                    </button>

                    <button type="button" class="btn btn-primary btn_delete_all shadow-none" data-bs-toggle="modal" data-bs-target="#clearAboutUsModal">
                        <i class="bi bi-trash"></i>&nbsp;Clear
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
<div class="modal fade my_modal_contact_us" id="editWhyChooseUsModal" tabindex="-1" aria-labelledby="editWhyChooseUsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editWhyChooseUsModalLabel">Why Choose Us Edit</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade my_modal_contact_us" id="addWhyChooseUsModal" tabindex="-1" aria-labelledby="addWhyChooseUsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addWhyChooseUsModalLabel">Why Choose Us Add</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade my_modal_contact_us" id="clearAboutUsModal" tabindex="-1" aria-labelledby="clearAboutUsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="clearAboutUsModalLabel">Why Choose Us Clear</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function get_why_choose_us() {

        let why_choose_us_data

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
</script>