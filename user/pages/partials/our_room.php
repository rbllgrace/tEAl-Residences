<?php require('/xampp/htdocs/tEAl-Residences/user/config/db_connect.php');
$sql = "SELECT * FROM rooms";
$result = $conn->query($sql);

// require('/xampp/htdocs/tEAl-Residences/admin_panel/config/config.php');
// require('/xampp/htdocs/tEAl-Residences/admin_panel/ajax/settings_crud.php');
?>

<style>
    img {
        max-height: 300px;
        width: 100%;
    }

    .custom_alert {
        position: fixed;
        /* top: 75px; */
        /* right: 50px; */
        top: 30px;
        right: 41%;
        font-size: 0.8rem;
        font-weight: bold;
        z-index: 1;
        height: 31px;
        display: flex;
        align-items: center;
    }

    .alert-dismissible .btn-close {
        position: absolute;
        top: -9px;
        right: 3px;
        z-index: 2;
        padding: 1.25rem 1rem;
        font-size: 0.7rem;
    }
</style>

<!-- our room -->
<div class="our_room container" id="rooms">
    <h1 class="text-center mt-5 mb-5 our_room_header">Our
        Rooms</h1>

    <!-- box_container start -->
    <div class="box_container mt-5">
        <div class="box_1">
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    // Display or process the data
                    // echo "ID: " . $row["room_id"] . " - Name: " . $row["room_title"] . " - Email: " . $row["room_description"] . "<br>";
                    echo '<div class="box_2" data-aos="fade-up"><div class="card mb-3" style="max-width: 1500px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="http://localhost/teal-residences/user/public/images/' . $row["room_picture"] . '" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">' . $row["room_title"] . '</h5>
                                <p class="card-text">' . $row["room_description"] . '</p>
                                <p class="card-text mb-0"><small class="text-body-secondary"> <span class="max">Max:
                                        </span>' . $row["room_max_person"] . '
                                        Persons</small></p>

                                        <p class="card-text"><small class="text-body-secondary"> <span class="max">Per Night:
                                        </span>₱' . $row["per_night"] . '
                                        </small></p>
    
                                <button type="button" class="btn btn-primary btn_room_details shadow-none" data-bs-toggle="modal" data-bs-target="#fullScreenModalApartment' . $row["room_id"] . '">
                                    + Room Details
                                </button>
    
                                <button type="button" class="btn btn-outline-secondary btn_reserve shadow-none" onclick="get_room_by_id(' . $row["room_id"] . ')">Reserve
                                    Now!</button>
                            </div>
                        </div>
                    </div>
                </div> </div>';
                }
            } else {
                echo "0 results";
            }
            ?>


            <!-- Full-Screen Modal for Apartment -->
            <div class="modal fade" id="fullScreenModalApartment1" tabindex="-1" aria-labelledby="fullScreenModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="fullScreenModalLabel">Apartment</h5>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body modal_body_container">
                            <div class="right">
                                <span style="font-weight: bold">Room Type:</span> Apartment <br> <br>

                                <span style="font-weight: bold">Description:</span>

                                <span style="font-size: .6rem;">
                                    Experience comfort and luxury in our Apartment, designed for a perfect retreat
                                    for
                                    two.
                                    This
                                    spacious and elegantly furnished apartment combines modern amenities with a
                                    touch of
                                    sophistication, ensuring a memorable stay for our guests. <br> <br>
                                </span>


                                <span style="font-weight: bold">Room Features: <br></span>


                                <ul>
                                    <li>Bed Type: Queen-size bed with premium linens and plush pillows.</li>
                                    <li>View: Choose between a cityscape or courtyard view.</li>
                                    <li>Living Area: Cozy seating with a coffee table for relaxation.</li>
                                    <li>Kitchenette: Equipped with a mini-fridge, microwave, and basic kitchenware.
                                    </li>
                                    <li>Work Desk: A dedicated workspace for business travelers.</li>
                                    <li>Entertainment: Flat-screen TV with cable channels.</li>
                                    <li>Internet: Complimentary high-speed Wi-Fi.</li>
                                    <li>Bathroom: En-suite bathroom with a shower, luxurious toiletries, and fluffy
                                        towels.
                                    </li>

                                </ul>



                                <span style="font-weight: bold">Additional Amenities: <br></span>

                                <ul>
                                    <li>Complimentary bottled water.</li>
                                    <li>Coffee and tea making facilities.</li>
                                    <li>Iron and ironing board.</li>
                                    <li>Hairdryer.</li>
                                    <li>Daily housekeeping service. <br></li>
                                </ul>

                                <span style="font-weight: bold">Services: <br></span>

                                <ul>
                                    <li>24/7 Room Service.</li>
                                    <li>Concierge service to assist with any requests.</li>
                                    <li>Laundry and dry-cleaning services available. <br></li>
                                </ul>

                                <span style="font-weight: bold">Optional Upgrades: <br></span>
                                <ul>
                                    <li>Breakfast-in-bed service.</li>
                                    <li>Access to the hotel's fitness center and spa facilities. <br>
                                    </li>
                                </ul>


                                <span style="font-weight: bold">Note: </span>

                                Rates may vary based on the season and availability. Contact our reservations team
                                for
                                current pricing and special offers.
                            </div>
                            <div class="left">
                                <!-- swiper -->

                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="../public/images/apartment.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap2.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap3.jpg" />
                                        </div>

                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div thumbsSlider="" class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap2.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap3.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap4.jpg" />
                                        </div>

                                    </div>
                                </div>
                                <!--  -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--  -->

            <!-- Full-Screen Modal for Family Room -->
            <div class="modal fade" id="fullScreenModalApartment2" tabindex="-1" aria-labelledby="fullScreenModalFamilyRoomLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="fullScreenModalFamilyRoomLabel">Family Room</h5>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body modal_body_container">
                            <div class="right">
                                <span style="font-weight: bold">Room Type:</span> Family Room <br> <br>

                                <span style="font-weight: bold">Description:</span>

                                <span style="font-size: .6rem;">
                                    Our Family Room provides a comfortable and spacious retreat for two persons, perfect
                                    for a couple's getaway. Enjoy a cozy atmosphere with thoughtful amenities to make
                                    your stay memorable. <br> <br>
                                </span>


                                <span style="font-weight: bold">Room Features: <br></span>


                                <ul>
                                    <li>Bed Type: King-size bed with premium linens and extra pillows for added comfort.
                                    </li>
                                    <li>Additional Sleeping Arrangement: Sofa bed for additional guests (upon request).
                                    </li>
                                    <li>View: Choose between city views or a tranquil courtyard setting.</li>
                                    <li>Living Area: Relax in a separate sitting area with a sofa, coffee table, and
                                        extra seating.
                                    </li>
                                    <li>Entertainment: Flat-screen TV with cable channels.</li>
                                    <li>Work Desk: A dedicated workspace for those who need to stay connected.</li>
                                    <li>Kitchenette: Equipped with a mini-fridge, microwave, and basic kitchenware.</li>
                                    <li>Bathroom: En-suite bathroom with a combination tub/shower, luxurious toiletries,
                                        and fluffy towels.
                                    </li>

                                </ul>



                                <span style="font-weight: bold">Additional Amenities: <br></span>

                                <ul>
                                    <li>
                                        Complimentary bottled water.</li>
                                    <li>Coffee and tea making facilities.</li>
                                    <li>Iron and ironing board.</li>
                                    <li>Hairdryer.</li>
                                </ul>

                                <span style="font-weight: bold">Services: <br></span>

                                <ul>
                                    <li>24/7 Room Service.</li>
                                    <li>Concierge service to assist with any requests.</li>
                                    <li>Laundry and dry-cleaning services available. <br></li>
                                </ul>

                                <span style="font-weight: bold">Optional Upgrades: <br></span>
                                <ul>
                                    <li>Breakfast-in-bed service.</li>
                                    <li>Access to the hotel's fitness center and spa facilities. <br>
                                    </li>
                                </ul>


                                <span style="font-weight: bold">Note: </span>

                                Rates may vary based on the season and availability. Contact our reservations team for
                                current pricing and special offers. Additional charges may apply for extra guests using
                                the sofa bed.
                            </div>
                            <div class="left">
                                <!-- swiper -->
                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="../public/images/fam_room1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/fam_room2.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/fam_room3.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/fam_room4.jpg" />
                                        </div>

                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div thumbsSlider="" class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="../public/images/fam_room1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/fam_room2.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/fam_room3.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/fam_room4.jpg" />
                                        </div>

                                    </div>
                                </div>
                                <!--  -->
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            <!--  -->

            <!-- Full-Screen Modal for Family Suite -->
            <div class="modal fade" id="fullScreenModalApartment3" tabindex="-1" aria-labelledby="fullScreenModalFamilySuiteLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="fullScreenModalFamilySuiteLabel">Family Suite</h5>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body modal_body_container">
                            <div class="right">
                                <span style="font-weight: bold">Room Type:</span> Family Suite <br> <br>

                                <span style="font-weight: bold">Description:</span>

                                <span style="font-size: .6rem;">
                                    Indulge in the comfort of our Family Suite, a spacious retreat designed to
                                    accommodate up to four persons. Perfect for family vacations or group getaways, this
                                    suite offers a blend of style and functionality to ensure a memorable stay for
                                    everyone. <br> <br>
                                </span>


                                <span style="font-weight: bold">Room Features: <br></span>


                                <ul>
                                    <li>Bedding: Two separate sleeping areas with a combination of a King-size bed and
                                        two Twin beds.</li>
                                    <li>
                                        Living Area: A cozy lounge with a sofa, coffee table, and additional seating.
                                    </li>
                                    <li>View: Choose between panoramic city views or a serene courtyard setting.</li>
                                    <li>Entertainment: Two flat-screen TVs with cable channels, ensuring everyone can
                                        enjoy their preferred shows.
                                    </li>
                                    <li>Work Desk: A dedicated workspace for those who need to stay connected.</li>
                                    <li>Kitchenette: Equipped with a mini-fridge, microwave, and basic kitchenware for
                                        added convenience.</li>
                                    <li>Internet: Complimentary high-speed Wi-Fi.</li>
                                    <li>Bathroom: En-suite bathroom with a combination tub/shower, luxurious toiletries,
                                        and plenty of towels.
                                    </li>

                                </ul>



                                <span style="font-weight: bold">Additional Amenities: <br></span>

                                <ul>
                                    <li>Complimentary bottled water.</li>
                                    <li>Coffee and tea making facilities.</li>
                                    <li>Iron and ironing board.</li>
                                    <li>Hairdryer.</li>
                                    <li>Daily housekeeping service. <br></li>
                                </ul>

                                <span style="font-weight: bold">Services: <br></span>

                                <ul>
                                    <li>24/7 Room Service.</li>
                                    <li>Concierge service to assist with any requests.</li>
                                    <li>Laundry and dry-cleaning services available. <br></li>
                                </ul>

                                <span style="font-weight: bold">Optional Upgrades: <br></span>
                                <ul>
                                    <li>Breakfast-in-bed service.</li>
                                    <li>Access to the hotel's fitness center and spa facilities. <br>
                                    </li>
                                </ul>


                                <span style="font-weight: bold">Note: </span>

                                Rates may vary based on the season and availability. Contact our reservations team for
                                current pricing and special offers. Additional charges may apply for extra guests..
                            </div>
                            <div class="left">
                                <!-- swiper -->

                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="../public/images/family_bedroom_bg.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/fam_suite2.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/fam_suite3.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/fam_suite4.jpg" />
                                        </div>

                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div thumbsSlider="" class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="../public/images/fam_suite1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/fam_suite2.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/fam_suite3.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/fam_suite4.jpg" />
                                        </div>

                                    </div>
                                </div>
                                <!--  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

            <!-- Full-Screen Modal for One-Bedroom Apartment -->
            <div class="modal fade" id="fullScreenModalApartment4" tabindex="-1" aria-labelledby="fullScreenModalOneBedroomLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="fullScreenModalOneBedroomLabel">One-Bedroom Apartment</h5>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body modal_body_container">
                            <div class="right">
                                <span style="font-weight: bold">Room Type:</span> One-Bedroom Apartment <br> <br>

                                <span style="font-weight: bold">Description:</span>

                                <span style="font-size: .6rem;">
                                    Experience the perfect blend of comfort and style in our One-Bedroom Suite, designed
                                    for couples seeking a spacious and private retreat. This suite offers a separate
                                    bedroom and living area, providing an ideal setting for a romantic getaway or a
                                    relaxing escape.<br> <br>
                                </span>


                                <span style="font-weight: bold">Room Features: <br></span>


                                <ul>
                                    <li>Bedroom: King-size bed with premium linens and a choice of pillows for a restful
                                        night's sleep.</li>
                                    <li>Living Area: Comfortable seating, including a sofa and armchairs, for relaxation
                                        and entertainment.</li>
                                    <li>View: Enjoy picturesque views of the city or surrounding landscapes.</li>
                                    <li>Entertainment: Flat-screen TV in both the bedroom and living area with cable
                                        channels.
                                    </li>
                                    <li>
                                        Kitchen: Fully equipped kitchen with a stove, oven, refrigerator, microwave, and
                                        basic cookware for a convenient and enjoyable stay.</li>
                                    <li>Dining Area: A dining table for two, perfect for intimate meals.</li>
                                    <li>Work Desk: A dedicated workspace for business travelers.</li>
                                    <li>Bathroom: En-suite bathroom with a bathtub or shower, luxurious toiletries, and
                                        plush towels.
                                    </li>

                                </ul>



                                <span style="font-weight: bold">Additional Amenities: <br></span>

                                <ul>
                                    <li>Complimentary bottled water.</li>
                                    <li>Coffee and tea making facilities.</li>
                                    <li>Iron and ironing board.</li>
                                    <li>Hairdryer.</li>
                                    <li>Daily housekeeping service. <br></li>
                                </ul>

                                <span style="font-weight: bold">Services: <br></span>

                                <ul>
                                    <li>24/7 Room Service.</li>
                                    <li>Concierge service to assist with any requests.</li>
                                    <li>Laundry and dry-cleaning services available. <br></li>
                                </ul>

                                <span style="font-weight: bold">Optional Upgrades: <br></span>
                                <ul>
                                    <li>Breakfast-in-bed service.</li>
                                    <li>Access to the hotel's fitness center and spa facilities. <br>
                                    </li>
                                </ul>


                                <span style="font-weight: bold">Note: </span>

                                Rates may vary based on the season and availability. Contact our reservations team for
                                current pricing and special offers.
                            </div>
                            <div class="left">
                                <!-- swiper -->

                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="../public/images/single_bedroom_bg.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/single2.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/single3.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/single4.jpg" />
                                        </div>

                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div thumbsSlider="" class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="../public/images/single1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/single2.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/single3.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/single4.jpg" />
                                        </div>

                                    </div>
                                </div>
                                <!--  -->
                            </div>
                        </div>

                        <!-- Modal Footer
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary shadow-none"
                                data-bs-dismiss="modal">Close</button>
                        </div> -->

                    </div>
                </div>
            </div>
            <!--  -->


        </div>

    </div>
    <!--  -->

    <script>
        function get_room_by_id(val) {


            let xhr = new XMLHttpRequest()
            xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

            xhr.onload = function() {
                // const table_body = document.querySelector('.table_body');
                // table_body.innerHTML = this.responseText

                if (this.responseText == 1) {
                    alert('success', 'Added to reserve area!')
                } else {
                    alert('error', this.responseText)

                }
            }
            xhr.send('get_room_by_id=' + val)
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
            }, 2000);
        }
    </script>