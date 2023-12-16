<?php require('/xampp/htdocs/tEAl-Residences/user/config/db_connect.php');
$sql = "SELECT * FROM faq_table";
$result = $conn->query($sql);
?>

<!-- FAQ -->
<div class="faq" id="faq" data-aos="fade-up">
    <h1 class="text-center mt-5 mb-5">FAQ</h1>

    <div class="accordion container shadow-none" id="accordionExample">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo ' <div class="accordion-item">

                        <h2 class="accordion-header">
                            <button class="accordion-button accordion_header shadow-none " type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne' . $row["id"] . '" aria-expanded="true" aria-controls="collapseOne' . $row["id"] . '">
                                ' . $row["question"] . '
                            </button>
                        </h2>
                        <div id="collapseOne' . $row["id"] . '" class="accordion-collapse collapse ' . ($row["id"] == 1 ? 'show' : '') . ' " data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            ' . $row["answer"] . '
                            </div>
                        </div>
                    </div>';
            }
        }
        ?>
    </div>
</div>
<!--  -->