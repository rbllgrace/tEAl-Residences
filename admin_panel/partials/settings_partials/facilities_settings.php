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
    margin-top: 5% !important;
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
</style>

<!-- Facilities Settings -->
<div class="center mt-5">
    <div class="card">
        <div class="card-body">
            <div class="gen_and_edit">
                <h5 class="card-title">Facilities</h5>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn_edit shadow-none" data-bs-toggle="modal"
                    data-bs-target="#editFacilitiesModal">
                    <i class="bi bi-pencil-square"></i>Edit
                </button>
            </div>
            <div class="facilities_container">
                <div class="fac1">
                    <h6 class="card-subtitle text-body-secondary mt-3"> Facility #1</h6>
                    <p class="card-text" id="f1"></p>
                </div>


                <div class="fac2">
                    <h6 class="card-subtitle text-body-secondary mt-3"> Facility #2</h6>
                    <p class="card-text" id="f2"></p>
                </div>

                <div class="fac3">
                    <h6 class="card-subtitle text-body-secondary mt-3"> Facility #3</h6>
                    <p class="card-text" id="f3"></p>
                </div>

                <div class="fac4">
                    <h6 class="card-subtitle text-body-secondary mt-3"> Facility #4</h6>
                    <p class="card-text" id="f4"></p>
                </div>

                <div class="fac5">
                    <h6 class="card-subtitle text-body-secondary mt-3"> Facility #5</h6>
                    <p class="card-text" id="f5"></p>
                </div>

                <div class="fac6">
                    <h6 class="card-subtitle text-body-secondary mt-3"> Facility #6</h6>
                    <p class="card-text" id="f6"></p>
                </div>

                <div class="fac7">
                    <h6 class="card-subtitle text-body-secondary mt-3"> Facility #7</h6>
                    <p class="card-text" id="f7"></p>
                </div>
            </div>

        </div>
    </div>
</div>



<!-- Scrollable Modal -->
<div class="modal fade my_modal_facility_us" id="editFacilitiesModal" tabindex="-1" role="dialog"
    aria-labelledby="editFacilitiesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editFacilitiesModalLabel">Facilities</h1>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your scrollable content goes here -->
                <form action="">
                    <div class="mb-1">
                        <label for="exampleFormControlInput3" class="form-label fw-bold f-title">Facility #1</label>
                        <input type="text" class="form-control shadow-none contact_us f1_inp"
                            id="exampleFormControlInput3" name="f1" required>

                        <!-- icon -->
                        <label for="exampleFormControlInput3" class="form-label fw-bold f-title">Icon</label>
                        <a href="https://icons.getbootstrap.com/" target="_blank" style="font-size: .6rem;">select
                            icon.</a>
                        <div class="input-group mb-3">
                            <span class="input-group-text icon1_span" id="basic-addon1"></span>
                            <input type="text" class="form-control shadow-none contact_us icon1_inp"
                                id="exampleFormControlInput3" name="icon1" aria-describedby="basic-addon1" required>
                            <!-- icon -->
                        </div>
                    </div>

                    <hr class="mt-2 mb-1">

                    <div class="mb-1">
                        <label for="exampleFormControlInput3" class="form-label fw-bold f-title">Facility #2</label>
                        <input type="text" class="form-control  shadow-none contact_us f2_inp"
                            id="exampleFormControlInput3" name="f2" required>

                        <!-- icon -->
                        <label for="exampleFormControlInput3" class="form-label fw-bold f-title">Icon</label>
                        <a href="https://icons.getbootstrap.com/" target="_blank" style="font-size: .6rem;">select
                            icon.</a>
                        <div class="input-group mb-3">
                            <span class="input-group-text icon2_span" id="basic-addon1"></span>
                            <input type="text" class="form-control shadow-none contact_us icon2_inp"
                                id="exampleFormControlInput3" name="icon2" required>
                            <!-- icon -->
                        </div>

                        <hr class="mt-2 mb-1">

                        <div class="mb-1">
                            <label for="exampleFormControlInput3" class="form-label fw-bold f-title">Facility
                                #3</label>
                            <input type="text" class="form-control  shadow-none contact_us f3_inp"
                                id="exampleFormControlInput3" name="f3" required>


                            <!-- icon -->
                            <label for="exampleFormControlInput3" class="form-label fw-bold f-title">Icon</label>
                            <a href="https://icons.getbootstrap.com/" target="_blank" style="font-size: .6rem;">select
                                icon.</a>
                            <div class="input-group mb-3">
                                <span class="input-group-text icon3_span" id="basic-addon1"></span>
                                <input type="text" class="form-control shadow-none contact_us icon3_inp"
                                    id="exampleFormControlInput3" name="icon3" required>
                                <!-- icon -->
                            </div>

                            <hr class="mt-2 mb-1">

                            <div class="mb-1">
                                <label for="exampleFormControlInput3" class="form-label fw-bold f-title">Facility
                                    #4</label>
                                <input type="text" class="form-control  shadow-none contact_us f4_inp"
                                    id="exampleFormControlInput3" name="f4" required>

                                <!-- icon -->
                                <label for="exampleFormControlInput3" class="form-label fw-bold f-title">Icon</label>
                                <a href="https://icons.getbootstrap.com/" target="_blank"
                                    style="font-size: .6rem;">select
                                    icon.</a>
                                <div class="input-group mb-3">
                                    <span class="input-group-text icon4_span" id="basic-addon1"></span>
                                    <input type="text" class="form-control shadow-none contact_us icon4_inp"
                                        id="exampleFormControlInput3" name="icon4" required>
                                    <!-- icon -->
                                </div>

                                <hr class="mt-2 mb-1">

                                <div class="mb-1">
                                    <label for="exampleFormControlInput3" class="form-label fw-bold f-title">Facility
                                        #5</label>
                                    <input type="text" class="form-control  shadow-none contact_us f5_inp"
                                        id="exampleFormControlInput3" name="f5" required>



                                    <!-- icon -->
                                    <label for="exampleFormControlInput3"
                                        class="form-label fw-bold f-title">Icon</label>
                                    <a href="https://icons.getbootstrap.com/" target="_blank"
                                        style="font-size: .6rem;">select
                                        icon.</a>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text icon5_span" id="basic-addon1"></span>
                                        <input type="text" class="form-control shadow-none contact_us icon5_inp"
                                            id="exampleFormControlInput3" name="icon5" required>
                                        <!-- icon -->
                                    </div>

                                    <hr class="mt-2 mb-1">

                                    <div class="mb-1">
                                        <label for="exampleFormControlInput3"
                                            class="form-label fw-bold f-title">Facility
                                            #6</label>
                                        <input type="text" class="form-control  shadow-none contact_us f6_inp"
                                            id="exampleFormControlInput3" name="f6" required>

                                        <!-- icon -->
                                        <label for="exampleFormControlInput3"
                                            class="form-label fw-bold f-title">Icon</label>
                                        <a href="https://icons.getbootstrap.com/" target="_blank"
                                            style="font-size: .6rem;">select
                                            icon.</a>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text icon6_span" id="basic-addon1"></span>
                                            <input type="text" class="form-control shadow-none contact_us icon6_inp"
                                                id="exampleFormControlInput3" name="icon6" required>
                                            <!-- icon -->
                                        </div>

                                        <hr class="mt-2 mb-1">

                                        <div class="mb-1">
                                            <label for="exampleFormControlInput3"
                                                class="form-label fw-bold f-title">Facility
                                                #7</label>
                                            <input type="text" class="form-control  shadow-none contact_us f7_inp"
                                                id="exampleFormControlInput3" name="f7" required>


                                        </div>

                                        <!-- icon -->
                                        <label for="exampleFormControlInput3"
                                            class="form-label fw-bold f-title">Icon</label>
                                        <a href="https://icons.getbootstrap.com/" target="_blank"
                                            style="font-size: .6rem;">select
                                            icon.</a>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text icon7_span" id="basic-addon1"></span>
                                            <input type="text" class="form-control shadow-none contact_us icon7_inp"
                                                id="exampleFormControlInput3" name="icon7" required>
                                            <!-- icon -->



                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary btn_edit shadow-none"
                                        onclick="update_facilities(f1.value, f2.value, f3.value, f4.value, f5.value, f6.value, f7.value, icon1.value, icon2.value, icon3.value, icon4.value, icon5.value, icon6.value, icon7.value)">Save</button>
                                </div>
                </form>
            </div>
        </div>
    </div>

</div>