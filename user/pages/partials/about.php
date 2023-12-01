<?php require('/xampp/htdocs/tEAl-Residences/user/connection/connect.php');
$sql = "SELECT * FROM why_choose_us_table";
$sql2 = "SELECT * FROM credentials_table";


$result = $conn->query($sql);
$result2 = $conn->query($sql2);
?>

<!--  About -->
<div class="container" id="about" data-aos="fade-up">
    <h1 class="text-center mt-5 mb-5">About</h1>

    <div class="about_us_center" style="margin-inline: 5%">
        <h5>Who We Are</h5>

        <p style="font-size: .8rem; text-align: center;"> <?php
                                                            if ($result2->num_rows > 0) {
                                                                if ($row = $result2->fetch_assoc()) {
                                                                    echo $row["who_we_are"];
                                                                }
                                                            }
                                                            ?></p>
    </div>

    <div class="why_choose_us" style="margin-inline: 5%">



        <h5 class="mb-2">Why Choose Us</h5>


        <div class="row">

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-sm-6 mb-3 mb-sm-0" data-aos="fade-up">
                    <div class="card mt-2" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px,
        rgba(0, 0, 0, 0.3) 0px 3px 7px -3px; border: none;">
                        <div class="card-body">
                            <h6 class="card-title" style="font-weight: bold;">' . $row["icon"] . ' &nbsp; ' . $row["title"] . '</h6>
                            <p class="card-text" style="font-size: .7rem">' . $row["description"] . '
                            </p>
                        </div>
                    </div>
                </div>';
                }
            }
            ?>



        </div>
    </div>
    <!--  -->