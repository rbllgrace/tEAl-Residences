<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- title -->
    <title>TEAL Residences</title>
    <!--  -->
    <?php require('./partials/links.php') ?>

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


    <?php require('./partials/nav.php') ?>
    <?php require('./partials/carousel.php') ?>
    <?php require('./partials/check_booking_availability.php') ?>
    <?php require('./partials/our_room.php') ?>
    <?php require('./partials/facilities.php') ?>
    <?php require('./partials/about.php') ?>
    <?php require('./partials/location.php') ?>
    <?php require('./partials/faq.php') ?>
    <?php require('./partials/contact_us.php') ?>
    <?php require('./partials/footer.php') ?>

    <script>
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
        duration: 500,
        once: true
    });
    </script>
</body>

</html>