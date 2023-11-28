<style>
    .btn_logout {
        color: #008080;
        border-color: #008080;
        font-size: .8rem;
    }

    .btn_logout:hover {
        background: #008080;
        border-color: #008080;
    }

    .my_booking {
        font-size: .8rem;
    }
</style>


<?php session_start(); ?>

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav" data-aos="fade-up">
    <div class="container-fluid">
        <!-- title -->
        <a class="navbar-brand" href="homepage.php"><span class="title">TEAL</span> Residences</a>

        <!-- toggle -->
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <?php

            // Check if the user is logged in
            if (isset($_SESSION['user_id'])) {
                // The user is logged in
                echo '<div class="d-flex justify-content-center align-items-center gap-2 booking_logout_container">
                
               <div class="my_bookings"><a href="#" class="my_booking">My Bookings</a></div>
                
                <form action="http://localhost/teal-residences/user/auth/login/logout.php" method="POST">
                    <button type="submit" class="btn btn-outline-primary btn_logout">Logout</button>
                    </form>
                </div>';
            } else {
                echo '<a href="http://localhost/teal-residences/user/auth/login/login.php" class="btn btn-outline-success btn_reservation first btn_teal shadow-none">Login</a>';
            }
            ?>
        </div>
    </div>
</nav>