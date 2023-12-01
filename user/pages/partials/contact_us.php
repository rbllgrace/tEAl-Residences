<?php require('/xampp/htdocs/tEAl-Residences/user/connection/connect.php');
$sql = "SELECT * FROM contact_us_table";
$result = $conn->query($sql);
?>


<!--  Contact Us -->
<div class="container" id="contact-us" data-aos="fade-up">
    <h1 class="text-center mt-5 mb-5">Contact Us</h1>

    <div class="contacts_container container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                echo ' <p>
                    ' . $row["icon"] . '' . $row["contact_content"] . '
                </p>';
            }
        }
        ?>

    </div>
</div>
<!--  -->