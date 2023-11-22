<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- title -->
    <title>TEAL Residences</title>
    <!--  -->

    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!--  -->

    <!-- vanilla css -->
    <link rel="stylesheet" href="../public/css/default.css">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/homepage.css">
    <link rel="stylesheet" href="../public/css/image_swiper.css">
    <!--  -->

    <!-- google fonts -->
    <!-- poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700;800&display=swap"
        rel="stylesheet">
    <!--  -->



    <!-- Bootstrap JS and Popper.js -->
    <script defer src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script defer src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofI+wb9CEs5K2MIIpQ6j79g6OJ75M5OjI" crossorigin="anonymous">
    </script>
    <!--  -->

    <!-- swiper js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!--  -->

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!--  -->

    <!-- tweenmax cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <!--  -->

    <!-- aos -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!--  -->

    <!-- scripts -->
    <script defer src="../public/js/image_swiper.js"></script>
    <script defer src="../public/js/index.js"></script>
    <!--  -->

    <style>
    .swiperr {
        width: 100%;
        padding-top: 50px;
        padding-bottom: 50px;

    }

    .swiper-slide {
        background-position: center;
        background-size: cover;
        background: #008080;
        color: white;
        width: 150px;
        height: 150px;
        border-radius: 5px;
    }

    .test {
        overflow: hidden;
        border-radius: 5px;

        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px,
            rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
    }

    .swiper-pagination {
        height: 5px;
        width: 5px;
        padding-bottom: 1.5rem;
    }
    </style>

</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav">
        <div class="container-fluid">
            <!-- title -->
            <a class="navbar-brand" href="homepage.php"><span class="title">TEAL</span> Residences</a>

            <!-- toggle -->
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <!-- toggle btn -->
                <span class="navbar-toggler-icon"></span> <!-- toggle btn -->
            </button>

            <!-- links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ul_width">
                    <!-- links -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="homepage.php">HOME</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#rooms">ROOMS</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#facilities">FACILITIES</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#about">ABOUT</a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#location">LOCATION</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#faq">FAQ</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#contact-us">CONTACT US</a>
                    </li>
                </ul>
                <a href="register.php" class="btn btn-outline-success btn_reservation first btn_teal shadow-none"
                    type="submit">Get
                    Started</a>
            </div>
        </div>
    </nav>

    <!-- image carousel -->
    <div id="carouselExampleControls" class="carousel slide carousel_container" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../public/images/img1.jpg" class="d-block w-100 img_container"
                    alt="../public/images/img1.jpg">
            </div>
            <div class="carousel-item">
                <img src="../public/images/img2.jpg" class="d-block w-100 img_container"
                    alt="../public/images/img2.jpg">
            </div>

            <div class="carousel-item">
                <img src="../public/images/img3.jpg" class="d-block w-100 img_container"
                    alt="../public/images/img3.jpg">
            </div>

            <div class="carousel-item">
                <img src="../public/images/img4.jpg" class="d-block w-100 img_container"
                    alt="../public/images/img4.jpg">
            </div>

            <div class="carousel-item">
                <img src="../public/images/img5.jpg" class="d-block w-100 img_container"
                    alt="../public/images/img5.jpg">
            </div>

            <div class="carousel-item">
                <img src="../public/images/img6.jpg" class="d-block w-100 img_container"
                    alt="../public/images/img6.jpg">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!--  -->

    <!-- checking booking availability -->
    <div class="check_booking_availability container">
        <h3 class="check_booking">Check Booking Availability</h3>
        <form action="" class="form_container_for_checking">
            <div class="input_1">
                <h3 class="small">Check-in</h3>
                <input class="every_input" type="date" name="date" id="date">
            </div>
            <div class="input_2">
                <h3 class="small">Check-out</h3>
                <input class="every_input" type="date" name="date" id="date">
            </div>
            <div class="input_3">
                <h3 class="small">Adult</h3>
                <select class="form-select every_input form_select" aria-label="Default select example">
                    <option selected>1</option>
                    <option value="1">2</option>
                    <option value="2">3</option>
                    <option value="3">4</option>
                </select>
            </div>
            <div class="input_4">
                <h3 class="small">Children</h3>
                <select class="form-select every_input form_select" aria-label="Default select example">
                    <option selected>1</option>
                    <option value="1">2</option>
                    <option value="2">3</option>
                    <option value="3">4</option>
                </select>
            </div>

            <button type="button" class="btn  btn_submit_check shadow-none">Submit</button>
        </form>
    </div>
    <!--  -->

    <!-- our room -->
    <div class="our_room container" id="rooms">
        <h1 class="text-center mt-5 mb-5 our_room_header">Our
            Rooms</h1>

        <!-- box_container start -->
        <div class="box_container mt-5">

            <div class="box_1" data-aos="fade-up">
                <div class="card mb-3" style="max-width: 1500px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="../public/images/apartment.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Apartment</h5>
                                <p class="card-text">Intimate and stylish, this two-person apartment is a perfect
                                    blend
                                    of comfort and convenience. The space is thoughtfully designed with a cozy
                                    bedroom,
                                    a well-equipped kitchenette, and a modern bathroom. Enjoy the simplicity of a
                                    private retreat, where every detail contributes to a harmonious and relaxing
                                    atmosphere. Ideal for a couple seeking a charming and functional home away from
                                    home.</p>
                                <p class="card-text"><small class="text-body-secondary"> <span class="max">Max:
                                        </span>2
                                        Persons</small></p>

                                <button type="button" class="btn btn-primary btn_room_details shadow-none"
                                    data-bs-toggle="modal" data-bs-target="#fullScreenModalApartment">
                                    + Room Details
                                </button>

                                <button type="button" class="btn btn-outline-secondary btn_reserve shadow-none">Reserve
                                    Now!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Full-Screen Modal for Apartment -->
            <div class="modal fade" id="fullScreenModalApartment" tabindex="-1" aria-labelledby="fullScreenModalLabel"
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

            <div class="box_2" data-aos="fade-right">
                <div class="card mb-3" style="max-width: 1500px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="../public/images/fam_room.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Family Room</h5>
                                <p class="card-text">Experience the warmth of togetherness in our cozy family room
                                    designed for two. This inviting space harmonizes comfort and intimacy, featuring
                                    comfortable seating, a stylish entertainment center, and a serene ambiance.
                                    Unwind
                                    together in this thoughtfully curated environment that fosters connection and
                                    relaxation. Perfect for a couple seeking a retreat where shared moments are
                                    cherished and comfort is paramount.</p>
                                <p class="card-text"><small class="text-body-secondary"> <span class="max">Max:
                                        </span>2
                                        Persons</small></p>
                                <button type="button" class="btn btn-primary btn_room_details shadow-none"
                                    data-bs-toggle="modal" data-bs-target="#fullScreenModalFamilyRoom">
                                    + Room Details
                                </button>

                                <button type="button" class="btn btn-outline-secondary btn_reserve shadow-none">Reserve
                                    Now!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Full-Screen Modal for Family Room -->
            <div class="modal fade" id="fullScreenModalFamilyRoom" tabindex="-1"
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



            <div class="box_3" data-aos="fade-left">
                <div class="card mb-3" style="max-width: 1500px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="../public/images/fam_suite.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Family Suite</h5>
                                <p class="card-text">Experience the warmth of togetherness in our cozy family room
                                    designed for two. This inviting space harmonizes comfort and intimacy, featuring
                                    comfortable seating, a stylish entertainment center, and a serene ambiance.
                                    Unwind
                                    together in this thoughtfully curated environment that fosters connection and
                                    relaxation. Perfect for a couple seeking a retreat where shared moments are
                                    cherished and comfort is paramount.</p>
                                <p class="card-text"><small class="text-body-secondary"> <span class="max">Max:
                                        </span>4
                                        Persons</small></p>
                                <button type="button" class="btn btn-primary btn_room_details shadow-none"
                                    data-bs-toggle="modal" data-bs-target="#fullScreenModalFamilySuite">
                                    + Room Details
                                </button>

                                <button type="button" class="btn btn-outline-secondary btn_reserve shadow-none">Reserve
                                    Now!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Full-Screen Modal for Family Suite -->
            <div class="modal fade" id="fullScreenModalFamilySuite" tabindex="-1"
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

            <div class="box_4" data-aos="fade-right">
                <div class="card mb-3" style="max-width: 1500px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="../public/images/one_bed.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">One-Bedroom Apartment</h5>
                                <p class="card-text">Experience the warmth of togetherness in our cozy family room
                                    designed for two. This inviting space harmonizes comfort and intimacy, featuring
                                    comfortable seating, a stylish entertainment center, and a serene ambiance.
                                    Unwind
                                    together in this thoughtfully curated environment that fosters connection and
                                    relaxation. Perfect for a couple seeking a retreat where shared moments are
                                    cherished and comfort is paramount.</p>
                                <p class="card-text"><small class="text-body-secondary"> <span class="max">Max:
                                        </span>2
                                        Persons</small></p>
                                <button type="button" class="btn btn-primary btn_room_details shadow-none"
                                    data-bs-toggle="modal" data-bs-target="#fullScreenModalOneBedroom">
                                    + Room Details
                                </button>

                                <button type="button" class="btn btn-outline-secondary btn_reserve shadow-none">Reserve
                                    Now!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Full-Screen Modal for One-Bedroom Apartment -->
            <div class="modal fade" id="fullScreenModalOneBedroom" tabindex="-1"
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

    <!--  facilities -->
    <div class="container" id="facilities">
        <h1 class="text-center mt-5 mb-5" data-aos="fade-up">Our Facilities</h1>

        <!-- Swiper -->
        <div class="test" data-aos="fade-up">
            <div class="swiperr mySwiper2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide d-flex align-items-center flex-column gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-wifi" viewBox="0 0 16 16">
                            <path
                                d="M15.384 6.115a.485.485 0 0 0-.047-.736A12.444 12.444 0 0 0 8 3C5.259 3 2.723 3.882.663 5.379a.485.485 0 0 0-.048.736.518.518 0 0 0 .668.05A11.448 11.448 0 0 1 8 4c2.507 0 4.827.802 6.716 2.164.205.148.49.13.668-.049z" />
                            <path
                                d="M13.229 8.271a.482.482 0 0 0-.063-.745A9.455 9.455 0 0 0 8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065A8.46 8.46 0 0 1 8 7a8.46 8.46 0 0 1 4.576 1.336c.206.132.48.108.653-.065zm-2.183 2.183c.226-.226.185-.605-.1-.75A6.473 6.473 0 0 0 8 9c-1.06 0-2.062.254-2.946.704-.285.145-.326.524-.1.75l.015.015c.16.16.407.19.611.09A5.478 5.478 0 0 1 8 10c.868 0 1.69.201 2.42.56.203.1.45.07.61-.091l.016-.015zM9.06 12.44c.196-.196.198-.52-.04-.66A1.99 1.99 0 0 0 8 11.5a1.99 1.99 0 0 0-1.02.28c-.238.14-.236.464-.04.66l.706.706a.5.5 0 0 0 .707 0l.707-.707z" />
                        </svg>

                        <span style="font-size: .8rem"> Free Wi-Fi</span>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide d-flex align-items-center flex-column gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-tv" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 13.5A.5.5 0 0 1 3 13h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zM13.991 3l.024.001a1.46 1.46 0 0 1 .538.143.757.757 0 0 1 .302.254c.067.1.145.277.145.602v5.991l-.001.024a1.464 1.464 0 0 1-.143.538.758.758 0 0 1-.254.302c-.1.067-.277.145-.602.145H2.009l-.024-.001a1.464 1.464 0 0 1-.538-.143.758.758 0 0 1-.302-.254C1.078 10.502 1 10.325 1 10V4.009l.001-.024a1.46 1.46 0 0 1 .143-.538.758.758 0 0 1 .254-.302C1.498 3.078 1.675 3 2 3h11.991zM14 2H2C0 2 0 4 0 4v6c0 2 2 2 2 2h12c2 0 2-2 2-2V4c0-2-2-2-2-2z" />
                            </svg>
                            <span style="font-size: .8rem"> TV </span>

                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide d-flex align-items-center flex-column gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-align-top" viewBox="0 0 16 16">
                                <rect width="4" height="12" rx="1" transform="matrix(1 0 0 -1 6 15)" />
                                <path d="M1.5 2a.5.5 0 0 1 0-1v1zm13-1a.5.5 0 0 1 0 1V1zm-13 0h13v1h-13V1z" />
                            </svg>
                            <span style="font-size: .8rem"> Elevator </span>

                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide d-flex align-items-center flex-column gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-backpack" viewBox="0 0 16 16">
                                <path
                                    d="M4.04 7.43a4 4 0 0 1 7.92 0 .5.5 0 1 1-.99.14 3 3 0 0 0-5.94 0 .5.5 0 1 1-.99-.14ZM4 9.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-4Zm1 .5v3h6v-3h-1v.5a.5.5 0 0 1-1 0V10H5Z" />
                                <path
                                    d="M6 2.341V2a2 2 0 1 1 4 0v.341c2.33.824 4 3.047 4 5.659v5.5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5V8a6.002 6.002 0 0 1 4-5.659ZM7 2v.083a6.04 6.04 0 0 1 2 0V2a1 1 0 0 0-2 0Zm1 1a5 5 0 0 0-5 5v5.5A1.5 1.5 0 0 0 4.5 15h7a1.5 1.5 0 0 0 1.5-1.5V8a5 5 0 0 0-5-5Z" />
                            </svg>
                            <span style="font-size: .8rem">Laundry</span>

                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide d-flex align-items-center flex-column gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-p-circle" viewBox="0 0 16 16">
                                <path
                                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM5.5 4.002h2.962C10.045 4.002 11 5.104 11 6.586c0 1.494-.967 2.578-2.55 2.578H6.784V12H5.5V4.002Zm2.77 4.072c.893 0 1.419-.545 1.419-1.488s-.526-1.482-1.42-1.482H6.778v2.97H8.27Z" />
                            </svg>
                            <span style="font-size: .8rem"> Free Parking</span>

                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide d-flex align-items-center flex-column gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-file-spreadsheet-fill" viewBox="0 0 16 16">
                                <path
                                    d="M12 0H4a2 2 0 0 0-2 2v4h12V2a2 2 0 0 0-2-2zm2 7h-4v2h4V7zm0 3h-4v2h4v-2zm0 3h-4v3h2a2 2 0 0 0 2-2v-1zm-5 3v-3H6v3h3zm-4 0v-3H2v1a2 2 0 0 0 2 2h1zm-3-4h3v-2H2v2zm0-3h3V7H2v2zm4 0V7h3v2H6zm0 1h3v2H6v-2z" />
                            </svg>
                            <span style="font-size: .8rem"> Kitchen Facilities</span>

                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide d-flex align-items-center flex-column gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-wind" viewBox="0 0 16 16">
                                <path
                                    d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z" />
                            </svg>
                            <span style="font-size: .8rem"> Air Conditioning</span>

                        </div>
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

    </div>
    <!--  -->

    <!--  About -->
    <div class="container" id="about" data-aos="fade-down">
        <h1 class="text-center mt-5 mb-5">About</h1>

        <div class="about_us_center" style="margin-inline: 5%">
            <h5>Who We Are</h5>
            <p style="font-size: .8rem; text-align: center;">Set against the backdrop of Baguio's verdant pines, TEAL
                Residences is DMCI Homes' latest leisure residential development. Find reason to celebrate life
                and more, as you explore the rich culture and heritage of Baguio City. Take delight in new gastronomic
                pleasures or be inspired with the works of art found at the local market. Sit back, relax and have a
                closer feel of nature everytime you wake up to the familiar scent of pine in the air.</p>
        </div>

        <div class="why_choose_us" style="margin-inline: 5%">
            <h5 class="mb-2">Why Choose Us</h5>

            <div class="row">
                <div class="col-sm-6 mb-3 mb-sm-0" data-aos="fade-right">
                    <div class="card mt-2" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px,
    rgba(0, 0, 0, 0.3) 0px 3px 7px -3px; border: none;">
                        <div class="card-body">
                            <h6 class="card-title" style="font-weight: bold;"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="30" height="30" fill="currentColor" class="bi bi-arrow-90deg-down"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4.854 14.854a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V3.5A2.5 2.5 0 0 1 6.5 1h8a.5.5 0 0 1 0 1h-8A1.5 1.5 0 0 0 5 3.5v9.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4z" />
                                </svg> &nbsp; LOWEST PRICE GUARANTEE</h6>
                            <p class="card-text" style="font-size: .7rem">We compare prices from over 50
                                hotel suppliers
                                to ensure the best
                                rates. If you happen to find the same room online, with the same booking conditions at a
                                lower price, we'll refund the difference.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 mb-3 mb-sm-0" data-aos="fade-left">
                    <div class="card mt-2" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px,
    rgba(0, 0, 0, 0.3) 0px 3px 7px -3px; border: none;">
                        <div class="card-body">
                            <h6 class="card-title" style="font-weight: bold;"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="30" height="30" fill="currentColor" class="bi bi-fast-forward"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M6.804 8 1 4.633v6.734L6.804 8Zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C.713 12.69 0 12.345 0 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692Z" />
                                    <path
                                        d="M14.804 8 9 4.633v6.734L14.804 8Zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C8.713 12.69 8 12.345 8 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692Z" />
                                </svg> &nbsp; BOOKING IN 2 MINUTES</h6>
                            <p class="card-text" style="font-size: .7rem">You can easily find any accommodation details
                                to quickly choose the best option and make a reservation in less than 2 minutes.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 mb-3 mb-sm-0" data-aos="fade-right">
                    <div class="card mt-2" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px,
    rgba(0, 0, 0, 0.3) 0px 3px 7px -3px; border: none;">
                        <div class="card-body">
                            <h6 class="card-title" style="font-weight: bold;"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="30" height="30" fill="currentColor" class="bi bi-file-earmark-lock"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M10 7v1.076c.54.166 1 .597 1 1.224v2.4c0 .816-.781 1.3-1.5 1.3h-3c-.719 0-1.5-.484-1.5-1.3V9.3c0-.627.46-1.058 1-1.224V7a2 2 0 1 1 4 0zM7 7v1h2V7a1 1 0 0 0-2 0zM6 9.3v2.4c0 .042.02.107.105.175A.637.637 0 0 0 6.5 12h3a.64.64 0 0 0 .395-.125c.085-.068.105-.133.105-.175V9.3c0-.042-.02-.107-.105-.175A.637.637 0 0 0 9.5 9h-3a.637.637 0 0 0-.395.125C6.02 9.193 6 9.258 6 9.3z" />
                                    <path
                                        d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                </svg> &nbsp; YOUR PAYMENT IS SECURED</h6>
                            <p class="card-text" style="font-size: .7rem">Our servers and network are protected by
                                up-to-date technology to keep your personal information and card details in strict
                                confidence.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 mb-3 mb-sm-0" data-aos="fade-left">
                    <div class="card mt-2" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px,
    rgba(0, 0, 0, 0.3) 0px 3px 7px -3px; border: none;">
                        <div class="card-body">
                            <h6 class="card-title" style="font-weight: bold;"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="30" height="30" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                                    <path
                                        d="M15 8a6.973 6.973 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8ZM2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0Z" />
                                </svg> &nbsp; NO HIDDEN FEES</h6>
                            <p class="card-text" style="font-size: .7rem">We only display final prices and charge you no
                                additional fees. Detailed and regularly updated terms of payment are always at your
                                disposal.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 mb-3 mb-sm-0" data-aos="fade-right">
                    <div class="card mt-2" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px,
    rgba(0, 0, 0, 0.3) 0px 3px 7px -3px; border: none;">
                        <div class="card-body">
                            <h6 class="card-title" style="font-weight: bold;"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="30" height="30" fill="currentColor" class="bi bi-speedometer2"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                                    <path fill-rule="evenodd"
                                        d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
                                </svg> &nbsp; INSTANT CONFIRMATION</h6>
                            <p class="card-text" style="font-size: .7rem">We are efficient! Right after a reservation is
                                made, you'll find a booking confirmation in your mailbox.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 mb-3 mb-sm-0" data-aos="fade-left">
                    <div class="card mt-2" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px,
    rgba(0, 0, 0, 0.3) 0px 3px 7px -3px; border: none;">
                        <div class="card-body">
                            <h6 class="card-title" style="font-weight: bold;"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="30" height="30" fill="currentColor" class="bi bi-duffle" viewBox="0 0 16 16">
                                    <path
                                        d="M8 5.75c1.388 0 2.673.193 3.609.385a18.404 18.404 0 0 1 1.43.354l.112.034.002.001h.001a.5.5 0 0 1-.308.952l-.004-.002-.018-.005a17.416 17.416 0 0 0-1.417-.354A17.282 17.282 0 0 0 8 6.75a17.3 17.3 0 0 0-3.408.365 17.42 17.42 0 0 0-1.416.354l-.018.005-.003.001a.5.5 0 1 1-.308-.95A17.26 17.26 0 0 1 8 5.75Z" />
                                    <path
                                        d="M5.229 2.722c-.126.461-.19.945-.222 1.375-1.401.194-2.65.531-3.525 1.012C-.644 6.278.036 11.204.393 13.127a.954.954 0 0 0 .95.772h13.314a.954.954 0 0 0 .95-.772c.357-1.923 1.037-6.85-1.09-8.018-.873-.48-2.123-.818-3.524-1.012a7.361 7.361 0 0 0-.222-1.375c-.162-.593-.445-1.228-.971-1.622-1.115-.836-2.485-.836-3.6 0-.526.394-.81 1.03-.971 1.622ZM9.2 1.9c.26.195.466.57.606 1.085.088.322.142.667.173.998a23.307 23.307 0 0 0-3.958 0 6.06 6.06 0 0 1 .173-.998c.14-.515.346-.89.606-1.085.76-.57 1.64-.57 2.4 0ZM8 4.9c2.475 0 4.793.402 6.036 1.085.238.13.472.406.655.93.183.522.28 1.195.303 1.952.047 1.486-.189 3.088-.362 4.032H1.368c-.173-.944-.409-2.545-.362-4.032.024-.757.12-1.43.303-1.952.183-.524.417-.8.655-.93C3.207 5.302 5.525 4.9 8 4.9Z" />
                                </svg> &nbsp;FLEXIBLE PAYMENT</h6>
                            <p class="card-text" style="font-size: .7rem">Most accommodations have free cancellation,
                                low rate and pay at hotel options. Choose the ones that suit your needs and wants for
                                better experience.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--  -->




    <!--  Location -->
    <div class="location" id="location" data-aos="fade-up">
        <h1 class="text-center mt-5 mb-5">Location</h1>

        <div class="map_container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1195.625030333825!2d120.62488887736721!3d16.412866310117458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3391a6ac6e245fc3%3A0xb66842d991e80254!2sOutlook%20Ridge%20Residences!5e1!3m2!1sen!2sph!4v1700546439952!5m2!1sen!2sph"
                width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <!--  -->

    <!-- FAQ -->
    <div class="faq" id="faq" data-aos="fade-up">
        <h1 class="text-center mt-5 mb-5">FAQ</h1>

        <div class="accordion container shadow-none" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button accordion_header shadow-none " type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne">
                        When is check-in time and check-out time at TEAL Residences apartments?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        The check-in time at TEAL Residences apartments starts at 3 PM and check-out time is
                        till 11 AM.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button accordion_header shadow-none collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                        aria-controls="collapseTwo">
                        Are there any restaurants close to TEAL Residences apartments?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Yes, you can have a meal at Le Vain Bakery and Chef's Home located about 750 feet away from
                        TEAL Residences apartments.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button accordion_header shadow-none collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                        aria-controls="collapseThree">
                        Can we request additional beds at these apartments?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        These apartments do not offer extra beds.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button accordion_header shadow-none collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                        aria-controls="collapseFour">
                        Are pets allowed at these apartments?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        No, these apartments aren't pet-friendly. Please contact the property to learn more about the
                        exact terms and conditions.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button accordion_header shadow-none collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                        aria-controls="collapseFive">
                        Can we park our car near TEAL Residences apartments?
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Yes, guests of TEAL Residences apartments can leave their car in free parking on site.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button accordion_header shadow-none collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false"
                        aria-controls="collapseSix">
                        How much does it cost to rent TEAL Residences apartments?
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Prices at TEAL Residences apartments start at $179.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  -->

    <!--  Contact Us -->
    <div class="container" id="contact-us" data-aos="fade-up">
        <h1 class="text-center mt-5 mb-5">Contact Us</h1>

        <div class="contacts_container container">
            <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-phone"
                    viewBox="0 0 16 16">
                    <path
                        d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                    <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                </svg>09158034323</p>
            <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-phone"
                    viewBox="0 0 16 16">
                    <path
                        d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                    <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                </svg>09260129341</p>
            <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-phone"
                    viewBox="0 0 16 16">
                    <path
                        d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                    <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                </svg>09068935409</p>
            <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-calendar-event" viewBox="0 0 16 16">
                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                    <path
                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                </svg>Monday - Sunday | 8.00am - 5.00pm</p>
            <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope"
                    viewBox="0 0 16 16">
                    <path
                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                </svg>customer@tealresidences.com</p>
        </div>
    </div>
    <!--  -->

    <footer>
        <p class="text-center">© 2023 <span style="color: #008080; font-weight: bold;">TEAL</span> Residences. All
            rights reserved</p>
    </footer>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script>
    TweenMax.from('.nav-link', 1.2, {
        opacity: 0,
        y: -20,
        ease: Expo.easeIn,
    })

    TweenMax.from('.navbar-brand', 1.2, {
        opacity: 0,
        x: -20,
        ease: Expo.easeInOut,
    })

    TweenMax.from('.btn_reservation', 1.2, {
        opacity: 0,
        x: 10,
        ease: Expo.easeIn,
    })
    // ---------------------
    TweenMax.from('.carousel', 1.5, {
        opacity: 0,
        y: -30,
        ease: Expo.easeIn,
    })
    var swiperr = new Swiper(".mySwiper2", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });

    AOS.init({
        offset: 200,
        duration: 500
    });
    </script>




</body>

</html>