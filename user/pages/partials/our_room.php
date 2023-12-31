<?php require('/xampp/htdocs/tEAl-Residences/user/config/db_connect.php');
$sql = "SELECT * FROM rooms";
$result = $conn->query($sql);
?>

<!-- our room -->
<div class="our_room our_room_container container" id="rooms">
    <h1 class="text-center mt-5 mb-5 our_room_header">Our Rooms</h1>

    <!-- box_container start -->
    <div class="box_container mt-5">
        <div class="box_1">
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    // Display or process the data
                    // echo "ID: " . $row["room_id"] . " - Name: " . $row["room_title"] . " - Email: " . $row["room_description"] . "<br>";
                    echo '<div class="box_2" data-aos="fade-up"><div class="card mb-3" style="max-width: 1500px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="http://localhost/teal-residences/user/public/images/' . $row["room_picture"] . '" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">' . $row["room_title"] . '</h5>
                                <p class="card-text">' . $row["room_description"] . '</p>
                                <p class="card-text mb-0"><small class="text-body-secondary"> <span class="max">Max:
                                        </span>' . $row["room_max_person"] . '
                                        Persons</small></p>

                                        <p class="card-text"><small class="text-body-secondary"> <span class="max">Per Night:
                                        </span>₱' . $row["per_night"] . '
                                        </small></p>
    
                                <button type="button" class="btn btn-primary btn_room_details shadow-none" data-bs-toggle="modal" data-bs-target="#fullScreenModalApartment' . $row["room_id"] . '">
                                    + Room Details
                                </button>
    
                                <button type="button" class="btn btn-outline-secondary btn_reserve shadow-none" onclick="get_room_by_id(' . $row["room_id"] . ')">Reserve
                                    Now!</button>
                            </div>
                        </div>
                    </div>
                </div> </div>';
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>

    </div>
    <!--  -->

    <script>
        // ======================== Get Room By Id ========================
        function get_room_by_id(val) {
            let xhr = new XMLHttpRequest()
            xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

            xhr.onload = function() {

                if (this.responseText == 1) {
                    alert('success', 'Added to reserve area!')
                } else {
                    alert('error', this.responseText)

                }
            }
            xhr.send('get_room_by_id=' + val)
        }

        // ======================== Alert ========================
        function alert(type, msg) {

            let base_class = (type == 'success') ? 'alert-success' : 'alert-danger'
            let element = document.createElement('div')
            element.innerHTML = `<div class="alert ${base_class} alert-dismissible fade show custom_alert" role="alert">
                ${msg}
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`
            document.body.append(element)

            // Use setTimeout to remove the alert after the specified duration
            setTimeout(function() {
                element.remove();
            }, 2000);
        }
    </script>