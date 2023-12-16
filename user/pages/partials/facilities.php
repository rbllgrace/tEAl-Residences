<?php require('/xampp/htdocs/tEAl-Residences/user/config/db_connect.php');
$sql = "SELECT * FROM facilities_table";
$result = $conn->query($sql);
?>

<!--  facilities -->
<div class="container" id="facilities">
    <h1 class="text-center mt-5 mb-5" data-aos="fade-up">Our Facilities</h1>

    <!-- Swiper -->
    <div class="test" data-aos="fade-up">
        <div class="swiperr mySwiper2">
            <div class="swiper-wrapper">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="swiper-slide d-flex align-items-center flex-column gap-3">
                            ' . $row["icon"] . '
        
                            <span style="font-size: .8rem"> ' . $row["item"] . '</span>
                        </div>';
                    }
                }
                ?>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

</div>
<!--  -->