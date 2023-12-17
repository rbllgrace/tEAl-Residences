<?php
require('/xampp/htdocs/tEAl-Residences/user/config/db_connect.php');
$sql2 = "SELECT * FROM credentials_table";
$result2 = $conn->query($sql2);

?>

<!--  Location -->
<div class="location text-center" id="location" data-aos="fade-up">
    <h1 class="text-center mt-5 pb-5">Location</h1>

    <?php
    if ($result2->num_rows > 0) {
        if ($row = $result2->fetch_assoc()) {
            echo $row["location"];
        }
    }
    ?>

</div>
<!--  -->