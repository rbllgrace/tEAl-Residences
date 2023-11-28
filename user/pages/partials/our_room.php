<?php require('/xampp/htdocs/tEAl-Residences/user/connection/connect.php');

// SQL query to retrieve all columns from your_table
// $sql = "SELECT room_title, room_description, room_max_persons FROM rooms";
// $sql = "SELECT * FROM rooms";
// $result = $conn->query($sql);
?>

<!-- our room -->
<div class="our_room container" id="rooms">
    <h1 class="text-center mt-5 mb-5 our_room_header">Our
        Rooms</h1>

    <!-- box_container start -->
    <div class="box_container mt-5">

        <div class="box_1" data-aos="fade-up">

            <?php
            $sql = "SELECT * FROM rooms";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    // Display or process the data
                    // echo "ID: " . $row["room_id"] . " - Name: " . $row["room_title"] . " - Email: " . $row["room_description"] . "<br>";
                    echo '<div class="box_2" data-aos="fade-right"><div class="card mb-3" style="max-width: 1500px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="' . $row["room_picture"] . '" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">' . $row["room_title"] . '</h5>
                                <p class="card-text">' . $row["room_description"] . '</p>
                                <p class="card-text"><small class="text-body-secondary"> <span class="max">Max:
                                        </span>' . $row["room_max_person"] . '
                                        Persons</small></p>
    
                                <button type="button" class="btn btn-primary btn_room_details shadow-none" data-bs-toggle="modal" data-bs-target="#fullScreenModalApartment' . $row["room_id"] . '">
                                    + Room Details
                                </button>
    
                                <button type="button" class="btn btn-outline-secondary btn_reserve shadow-none">Reserve
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
            <div class="modal fade" id="fullScreenModalApartment1" tabindex="-1" aria-labelledby="fullScreenModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="fullScreenModalLabel">Apartment</h5>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                                aria-label="Close"></button>
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
                                    <!-- <li>Closet: Ample storage space for your belongings.</li>
                                    <li>Air Conditioning: Individually controlled for personalized comfort.</li>
                                    <li>Safety: In-room safe for securing valuables. <br></li> -->
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

                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                                    class="swiper mySwiper2">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="../public/images/apartment.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <!-- <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div> -->
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
                                        <!-- <div class="swiper-slide">
                                            <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                                        </div> -->
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

            <!-- Full-Screen Modal for Family Room -->
            <div class="modal fade" id="fullScreenModalApartment2" tabindex="-1"
                aria-labelledby="fullScreenModalFamilyRoomLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="fullScreenModalFamilyRoomLabel">Family Room</h5>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body modal_body_container">
                            <div class="right">
                                <span style="font-weight: bold">Room Type:</span> Family Room <br> <br>

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
                                    <!-- <li>Closet: Ample storage space for your belongings.</li>
                                    <li>Air Conditioning: Individually controlled for personalized comfort.</li>
                                    <li>Safety: In-room safe for securing valuables. <br></li> -->
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
                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                                    class="swiper mySwiper2">
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

                        <!-- Modal Footer
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary shadow-none"
                                data-bs-dismiss="modal">Close</button>
                        </div> -->

                    </div>
                </div>
            </div>
            <!--  -->

            <!-- Full-Screen Modal for Family Suite -->
            <div class="modal fade" id="fullScreenModalApartment3" tabindex="-1"
                aria-labelledby="fullScreenModalFamilySuiteLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="fullScreenModalFamilySuiteLabel">Family Suite</h5>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body modal_body_container">
                            <div class="right">
                                <span style="font-weight: bold">Room Type:</span> Family Suite <br> <br>

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
                                    <!-- <li>Closet: Ample storage space for your belongings.</li>
                                    <li>Air Conditioning: Individually controlled for personalized comfort.</li>
                                    <li>Safety: In-room safe for securing valuables. <br></li> -->
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

                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                                    class="swiper mySwiper2">
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
                                        <!-- <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div> -->
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
                                        <!-- <div class="swiper-slide">
                                            <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                                        </div> -->
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

            <!-- Full-Screen Modal for One-Bedroom Apartment -->
            <div class="modal fade" id="fullScreenModalApartment4" tabindex="-1"
                aria-labelledby="fullScreenModalOneBedroomLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="fullScreenModalOneBedroomLabel">One-Bedroom Apartment</h5>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body modal_body_container">
                            <div class="right">
                                <span style="font-weight: bold">Room Type:</span> One-Bedroom Apartment <br> <br>

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
                                    <!-- <li>Closet: Ample storage space for your belongings.</li>
                                    <li>Air Conditioning: Individually controlled for personalized comfort.</li>
                                    <li>Safety: In-room safe for securing valuables. <br></li> -->
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

                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                                    class="swiper mySwiper2">
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
                                        <!-- <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div> -->
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
                                        <!-- <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="../public/images/ap1.jpg" />
                                        </div> -->
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