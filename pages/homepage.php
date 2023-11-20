<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEAL Residences</title>

    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--  -->

    <!-- vanilla css -->
    <link rel="stylesheet" href="../public/css/homepage.css">
    <!--  -->

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700;800&display=swap" rel="stylesheet">
    <!--  -->

    <style>

        * {
            font-family: 'Poppins', sans-serif;
        }
    .datetime-form {
        padding: 20px;
        text-align: center;

        display: flex;
        justify-content: center;
        align-items: center;

        margin-top: 1.2rem;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
    }

    .btn_submit {
        margin-top: 15px;
    }

    .form_container {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;

        height: 50px;
    }

    .check_booking_availability {
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        margin-top: 1.1rem;
        padding-block: 1rem;
        border-radius: 5px;
    }

    .form_container_for_checking {
        display: flex;
        justify-content: space-evenly;
        align-items: flex-start;
    }

    .btn_submit_check {
        height: 36px;
        position: relative;
        top: 20px;
    }
    
    .check_booking {
        font-size: 1.2rem;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .small {
        font-size: .8rem;
    }

    .every_input {
        height: 30px;
        font-size: .8rem;
    }

    .form_select {
        width: 100px;
    }

    .box_container {
    }

    .max {
        font-weight: bold;
    }

    .card-text {
        font-size: .8rem;
    }

    .card {
        position: relative;
    }

    .btn_room_details, .btn_reserve {
        font-size: 0.7rem;
    }

    .btn_reserve {
        position: absolute;
        bottom: 10px;
        right: 10px;
    }

    .btn_reservation {
        padding: 0;
        padding: 5px 5px;
        font-size: 0.8rem;
    }

    .nav-link {
        font-size: .8rem;
    }
    
    .img_inside {
        height: 200px;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
        <div class="container-fluid">

            <a class="navbar-brand" href="#"><span class="title">TEAL</span> Residences</a>  <!-- title -->

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <!-- toggle btn -->
            <span class="navbar-toggler-icon"></span> <!-- toggle btn -->
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ul_width"> <!-- links -->
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="homepage.php">HOME</a>
                </li>

                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">ROOMS</a>
                </li>

                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">FACILITIES</a>
                </li>

                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">ABOUT</a>
                </li>

                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">CONTACT US</a>
                </li>
            </ul>
                <a href="register.php" class="btn btn-outline-success btn_reservation first btn_teal" type="submit">Get Started</a>
            </div>
        </div>
    </nav>

    <!-- <div class="btns">
        <button type="button" class="btn btn-outline-secondary btn_teal">Hotel</button>
        <button type="button" class="btn btn-outline-secondary btn_teal">Amenities</button>
        <button type="button" class="btn btn-outline-secondary btn_teal">Rooms</button>
        <button type="button" class="btn btn-outline-secondary btn_teal">Location</button>
        <button type="button" class="btn btn-outline-secondary btn_teal">Know More About This</button>
        <button type="button" class="btn btn-outline-secondary btn_teal">FAQ</button>
        <button type="button" class="btn btn-outline-secondary btn_teal">Reviews</button>
    </div> -->

    <!-- <div class="datetime-form">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form_container">

        <div>
            <label for="check-in">Check-in Date</label>
            <input type="date" id="check-in" name="check-in" value="<?php echo $checkInDateTime; ?>" required>
        </div>

        <div>
            <label for="check-out">Check-out Date</label>
            <input type="date" id="check-out" name="check-out" value="<?php echo $checkOutDateTime; ?>" required>
        </div>
        
        <button type="button" class="btn btn-dark btn_submit btn_teal">Check In</button>
        </form>
    </div> -->

    <div id="carouselExampleControls" class="carousel slide carousel_container" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="../public/images/img1.jpg" class="d-block w-100 img_container" alt="../public/images/img1.jpg">
            </div>
            <div class="carousel-item">
            <img src="../public/images/img2.jpg" class="d-block w-100 img_container" alt="../public/images/img2.jpg">
            </div>

            <div class="carousel-item">
            <img src="../public/images/img3.jpg" class="d-block w-100 img_container" alt="../public/images/img3.jpg">
            </div>

            <div class="carousel-item">
            <img src="../public/images/img4.jpg" class="d-block w-100 img_container" alt="../public/images/img4.jpg">
            </div>

            <div class="carousel-item">
            <img src="../public/images/img5.jpg" class="d-block w-100 img_container" alt="../public/images/img5.jpg">
            </div>

            <div class="carousel-item">
            <img src="../public/images/img6.jpg" class="d-block w-100 img_container" alt="../public/images/img6.jpg">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
    </div>

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

                <button type="button" class="btn btn-outline-primary btn_submit_check">Submit</button>
        </form>
    </div>

    <div class="our_room container">
        <h1 class="text-center mt-5">Our Rooms</h1>

        <!-- box_container start -->
        <div class="box_container">

            <div class="box_1">
                <div class="card mb-3" style="max-width: 1500px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="../public/images/apartment.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Apartment</h5>
                            <p class="card-text">Intimate and stylish, this two-person apartment is a perfect blend of comfort and convenience. The space is thoughtfully designed with a cozy bedroom, a well-equipped kitchenette, and a modern bathroom. Enjoy the simplicity of a private retreat, where every detail contributes to a harmonious and relaxing atmosphere. Ideal for a couple seeking a charming and functional home away from home.</p>
                            <p class="card-text"><small class="text-body-secondary"> <span class="max">Max: </span>2 Persons</small></p>

                            <button type="button" class="btn btn-primary btn_room_details" data-bs-toggle="modal" data-bs-target="#fullScreenModal">
                                + Room Details
                            </button>

                            <button type="button" class="btn btn-outline-secondary btn_reserve">Reserve Now!</button>
                        </div>
                        </div>
                    </div>
                    </div>
            </div>


    <!-- Full-Screen Modal for apartment -->
    <div class="modal fade" id="fullScreenModal" tabindex="-1"          aria-labelledby="fullScreenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h5 class="modal-title" id="fullScreenModalLabel">Apartment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal Body -->
        <div class="modal-body">
            <!-- <p>This is the content of the full-screen modal. You can add your own content here.</p> -->

            <span style="font-weight: bold">Room Type:</span> Apartment <br> <br>

            <span style="font-weight: bold">Description:</span> <br>

Experience comfort and luxury in our Apartment, designed for a perfect retreat for two. This spacious and elegantly furnished apartment combines modern amenities with a touch of sophistication, ensuring a memorable stay for our guests. <br> <br>

<span style="font-weight: bold">Room Features: <br></span>


<ul>
    <li>Bed Type: Queen-size bed with premium linens and plush pillows.</li>
    <li>View: Choose between a cityscape or courtyard view.</li>
    <li>Living Area: Cozy seating with a coffee table for relaxation.</li>
    <li>Kitchenette: Equipped with a mini-fridge, microwave, and basic kitchenware.</li>
    <li>Work Desk: A dedicated workspace for business travelers.</li>
    <li>Entertainment: Flat-screen TV with cable channels.</li>
    <li>Internet: Complimentary high-speed Wi-Fi.</li>
    <li>Bathroom: En-suite bathroom with a shower, luxurious toiletries, and fluffy towels.</li>
    <li>Closet: Ample storage space for your belongings.</li>
    <li>Air Conditioning: Individually controlled for personalized comfort.</li>
    <li>Safety: In-room safe for securing valuables. <br> <br></li>
</ul>



<span style="font-weight: bold">Additional Amenities: <br></span>

<ul>
    <li>Complimentary bottled water.</li>
    <li>Coffee and tea making facilities.</li>
    <li>Iron and ironing board.</li>
    <li>Hairdryer.</li>
    <li>Daily housekeeping service. <br> <br></li>
</ul>

<span style="font-weight: bold">Services: <br></span>

<ul>
    <li>24/7 Room Service.</li>
    <li>Concierge service to assist with any requests.</li>
    <li>Laundry and dry-cleaning services available. <br><br></li>
</ul>

<span style="font-weight: bold">Optional Upgrades: <br></span>
<ul>
    <li>Breakfast-in-bed service.</li>
    <li>Access to the hotel's fitness center and spa facilities. <br><br>
</li>
</ul>


<span style="font-weight: bold">Note: <br></span>

Rates may vary based on the season and availability. Contact our reservations team for current pricing and special offers.
       
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

        </div>
    </div>
    </div>
            <div class="box_2">
                <div class="card mb-3" style="max-width: 1500px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="../public/images/fam_room.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Family Room</h5>
                            <p class="card-text">Experience the warmth of togetherness in our cozy family room designed for two. This inviting space harmonizes comfort and intimacy, featuring comfortable seating, a stylish entertainment center, and a serene ambiance. Unwind together in this thoughtfully curated environment that fosters connection and relaxation. Perfect for a couple seeking a retreat where shared moments are cherished and comfort is paramount.</p>
                            <p class="card-text"><small class="text-body-secondary"> <span class="max">Max: </span>2 Persons</small></p>
                            <button type="button" class="btn btn-primary btn_room_details" data-bs-toggle="modal" data-bs-target="#fullScreenModal">
                                + Room Details
                            </button>

                            <button type="button" class="btn btn-outline-secondary btn_reserve">Reserve Now!</button>
                        </div>
                        </div>
                    </div>
                    </div>
            </div>

            <!-- box 2 modal -->
<!-- Full-Screen Modal for apartment -->
<div class="modal fade" id="qwe" tabindex="-1"          aria-labelledby="fullScreenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h5 class="modal-title" id="fullScreenModalLabel">Apartment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal Body -->
        <div class="modal-body">
            <!-- <p>This is the content of the full-screen modal. You can add your own content here.</p> -->

            <span style="font-weight: bold">Room Type:</span> Apartment <br> <br>

            <span style="font-weight: bold">Description:</span> <br>

Experience comfort and luxury in our Apartment, designed for a perfect retreat for two. This spacious and elegantly furnished apartment combines modern amenities with a touch of sophistication, ensuring a memorable stay for our guests. <br> <br>

<span style="font-weight: bold">Room Features: <br></span>


<ul>
    <li>Bed Type: Queen-size bed with premium linens and plush pillows.</li>
    <li>View: Choose between a cityscape or courtyard view.</li>
    <li>Living Area: Cozy seating with a coffee table for relaxation.</li>
    <li>Kitchenette: Equipped with a mini-fridge, microwave, and basic kitchenware.</li>
    <li>Work Desk: A dedicated workspace for business travelers.</li>
    <li>Entertainment: Flat-screen TV with cable channels.</li>
    <li>Internet: Complimentary high-speed Wi-Fi.</li>
    <li>Bathroom: En-suite bathroom with a shower, luxurious toiletries, and fluffy towels.</li>
    <li>Closet: Ample storage space for your belongings.</li>
    <li>Air Conditioning: Individually controlled for personalized comfort.</li>
    <li>Safety: In-room safe for securing valuables. <br> <br></li>
</ul>



<span style="font-weight: bold">Additional Amenities: <br></span>

<ul>
    <li>Complimentary bottled water.</li>
    <li>Coffee and tea making facilities.</li>
    <li>Iron and ironing board.</li>
    <li>Hairdryer.</li>
    <li>Daily housekeeping service. <br> <br></li>
</ul>

<span style="font-weight: bold">Services: <br></span>
<ul>
    <li>24/7 Room Service.</li>
    <li>Concierge service to assist with any requests.</li>
    <li>Laundry and dry-cleaning services available. <br><br></li>
</ul>

<span style="font-weight: bold">Optional Upgrades: <br></span>

<ul>
    <li>Breakfast-in-bed service.</li>
    <li>Access to the hotel's fitness center and spa facilities. <br><br>
</li>
</ul>




<span style="font-weight: bold">Note: <br></span>

Rates may vary based on the season and availability. Contact our reservations team for current pricing and special offers.
            
        <!-- inside carousel -->



        <!--  -->
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

        </div>
    </div>
                

            <!--  -->

            <div class="box_3">
                <div class="card mb-3" style="max-width: 1500px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="../public/images/fam_suite.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Family Suite</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.Indulge in the comfort of our family suite designed for four persons. This spacious and inviting accommodation provides a harmonious blend of style and functionality. The suite features a well-appointed living area, two separate bedrooms for privacy, and a modern bathroom. Enjoy quality time together in the cozy common space, complete with comfortable seating and entertainment options. Whether you're traveling with family or friends, our family suite offers a perfect retreat for creating lasting memories in a welcoming and well-equipped environment.</p>
                            <p class="card-text"><small class="text-body-secondary"> <span class="max">Max: </span>4 Persons</small></p>
                            <button type="button" class="btn btn-primary btn_room_details" data-bs-toggle="modal" data-bs-target="#fullScreenModal">
                                + Room Details
                            </button>

                            <button type="button" class="btn btn-outline-secondary btn_reserve">Reserve Now!</button>
                        </div>
                        </div>
                    </div>
                    </div>
            </div>

            <div class="box_4">
                <div class="card mb-3" style="max-width: 1500px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="../public/images/one_bed.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">One-Bedroom Apartment</h5>
                            <p class="card-text">Discover the perfect retreat for two in our stylish one-bedroom apartment. This thoughtfully designed space combines comfort and functionality, featuring a cozy bedroom, a well-equipped kitchen, and a modern bathroom. The living area provides a comfortable setting for relaxation, complete with inviting furnishings and a pleasant atmosphere. Ideal for a couple seeking a private and intimate escape, our one-bedroom apartment offers a serene and welcoming environment for a memorable stay.</p>
                            <p class="card-text"><small class="text-body-secondary"> <span class="max">Max: </span>2 Persons</small></p>
                            <button type="button" class="btn btn-primary btn_room_details" data-bs-toggle="modal" data-bs-target="#fullScreenModal">
                                + Room Details
                            </button>

                            <button type="button" class="btn btn-outline-secondary btn_reserve">Reserve Now!</button>
                        </div>
                        </div>
                    </div>
                    </div>
            </div>

        </div>
        <!-- box_container end -->
    </div>

    <div class="facilities">
        <h1 class="text-center mt-5">Our Facilities</h1>
    </div>


    <!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofI+wb9CEs5K2MIIpQ6j79g6OJ75M5OjI" crossorigin="anonymous"></script>
</body>
</html>