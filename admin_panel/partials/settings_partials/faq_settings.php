 <!-- ======================== FAQ Settings ======================== -->
 <div class="center mt-3">
     <div class="card">
         <div class="card-body">
             <div class="gen_and_edit">
                 <h5 class="card-title">FAQ Settings</h5>
                 <button type="button" class="btn btn-primary btn_edit shadow-none" data-bs-toggle="modal" data-bs-target="#editFAQModal">
                     <i class="bi bi-pencil-square"></i>Edit
                 </button>
             </div>
             <div class="fac1">
                 <h6 class="card-subtitle text-body-secondary mt-3"> FAQ #1</h6>
                 <p class="card-text" id="faq1"></p>
             </div>


             <div class="fac2">
                 <h6 class="card-subtitle text-body-secondary mt-3"> FAQ #2</h6>
                 <p class="card-text" id="faq2"></p>
             </div>

             <div class="fac3">
                 <h6 class="card-subtitle text-body-secondary mt-3"> FAQ #3</h6>
                 <p class="card-text" id="faq3"></p>
             </div>

             <div class="fac4">
                 <h6 class="card-subtitle text-body-secondary mt-3"> FAQ #4</h6>
                 <p class="card-text" id="faq4"></p>
             </div>

             <div class="fac5">
                 <h6 class="card-subtitle text-body-secondary mt-3"> FAQ #5</h6>
                 <p class="card-text" id="faq5"></p>
             </div>

             <div class="fac6">
                 <h6 class="card-subtitle text-body-secondary mt-3"> FAQ #6</h6>
                 <p class="card-text" id="faq6"></p>
             </div>


         </div>

     </div>
 </div>

 <!-- ======================== FAQ Modal ======================== -->
 <div class="modal fade my_modal_contact_us" id="editFAQModal" tabindex="-1" aria-labelledby="editFAQModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <form action="">
             <div class="modal-content">
                 <div class="modal-header">
                     <h1 class="modal-title fs-5" id="editFAQModalLabel">Contact Us Settings</h1>
                     <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <div class="mb-1">
                         <label for="exampleFormControlInput3" class="form-label fw-bold text-sm">Phone
                             #1</label>
                         <input type="number" class="form-control contact_us shadow-none phone1_inp" id="exampleFormControlInput3" name="phone1" required>
                     </div>

                     <div class="mb-1">
                         <label for="exampleFormControlInput3" class="form-label fw-bold text-sm">Phone
                             #2</label>
                         <input type="number" class="form-control contact_us shadow-none phone2_inp" id="exampleFormControlInput3" name="phone2" required>
                     </div>

                     <div class="mb-1">
                         <label for="exampleFormControlInput3" class="form-label fw-bold text-sm">Phone
                             #3</label>
                         <input type="number" class="form-control contact_us shadow-none phone3_inp" id="exampleFormControlInput3" name="phone3" required>
                     </div>

                     <div class="mb-1">
                         <label for="exampleFormControlInput3" class="form-label fw-bold text-sm">Facebook</label>
                         <input type="text" class="form-control contact_us shadow-none facebook_inp" id="exampleFormControlInput3" name="facebook" required>
                     </div>

                     <div class="mb-1">
                         <label for="exampleFormControlInput3" class="form-label fw-bold text-sm">Email</label>
                         <input type="text" class="form-control contact_us shadow-none email_inp" id="exampleFormControlInput3" name="email" required>
                     </div>


                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-primary btn_edit shadow-none" onclick="update_contact(phone1.value, phone2.value, phone3.value, facebook.value, email.value)">Save</button>
                 </div>
             </div>
         </form>
     </div>
 </div>