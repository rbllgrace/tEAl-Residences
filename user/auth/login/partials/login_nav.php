<?php require('/xampp/htdocs/tEAl-Residences/user/config/db_connect.php');
$sql = "SELECT * FROM credentials_table";
$result = $conn->query($sql);
?>

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav" data-aos="fade-up">
    <div class="container-fluid">
        <!-- title -->
        <a class="navbar-brand container text-capitalize" href="http://localhost/teal-residences/user/pages/homepage.php"><span class="title">
                <?php
                if ($result->num_rows > 0) {
                    if ($row = $result->fetch_assoc()) {
                        echo $row["site_title"];
                    }
                }
                ?></span></a>

        <!-- toggle -->
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <!-- toggle btn -->
            <span class="navbar-toggler-icon"></span> <!-- toggle btn -->
        </button>


    </div>
</nav>
<!--  -->