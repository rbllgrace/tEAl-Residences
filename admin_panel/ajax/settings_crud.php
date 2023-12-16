<?php
require('/xampp/htdocs/tEAl-Residences/admin_panel/config/config.php');
admin_login();

// get methods
if (isset($_POST['get_general'])) {
    $q = "SELECT * FROM `credentials_table` WHERE `id` =?";
    $values = [1];
    $res = select($q, $values, 'i');
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);
    echo $json_data;
}

if (isset($_POST['get_contacts'])) {
    $q = "SELECT * FROM `contact_us_table`";
    $values = [];  // No specific ID value to bind
    $res = selectAll($q, $values, '');
    $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
    $json_data = json_encode($data);
    echo $json_data;
}

if (isset($_POST['get_facilities'])) {
    $q = "SELECT * FROM `facilities_table`";
    $values = [];  // No specific ID value to bind
    $res = selectAll($q, $values, '');
    $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
    $json_data = json_encode($data);
    echo $json_data;
}

if (isset($_POST['get_why_choose_us'])) {
    $res = selectAllIn('why_choose_us_table');
    $countThis = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $countThis++;

        echo '<h6 class="card-subtitle text-body-secondary mt-3">Why Choose Us #' . $countThis . ' </h6>
        
        <button type="button" onclick="remove_why_choose_us(' . $row['id'] . ')" class="btn btn-primary btn_delete shadow-none"><i class="bi bi-trash"></i></button>
        <p class="card-text"><span class="fw-bold">Title: </span>' . $row['title'] . '</p>
        <p class="card-text" id="phone' . $countThis . '"><span class="fw-bold">Description: </span>' . $row['description'] . '</p>';
    }
}

if (isset($_POST['get_why_choose_us_inp'])) {
    $res = selectAllIn('why_choose_us_table');
    $countThis = 0;
    $inputNames = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $countThis++;
        $inputNames[] = 'why_choose_us_' . $countThis . '.value';
        echo '<div class="mb-1"> 
        <label for="exampleFormControlInput3" class="form-label fw-bold f-title">Why Choose Us #' . $countThis . '</label>
        <br><span style="font-size: .7rem;">Title</span>
        <input type="text" class="form-control shadow-none contact_us" id="exampleFormControlInput3" name="why_choose_us_' . $countThis . '" required value="' . $row['title'] . '">

        <span style="font-size: .7rem;">Description</span>
        <input type="text" class="form-control shadow-none contact_us" id="exampleFormControlInput3"  required value="' . $row['description'] . '">

        <!-- icon -->
        <label for="exampleFormControlInput3" class="form-label fw-bold f-title">Icon</label>
        <a href="https://icons.getbootstrap.com/" target="_blank" style="font-size: .6rem;">select
            icon.</a>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">' . $row['icon'] . '</span>
            <input type="text" class="form-control shadow-none contact_us why_choose_us_icon' . $countThis . '_inp" id="exampleFormControlInput3" name="why_choose_us_icon_' . $countThis . '" aria-describedby="basic-addon1">
            <!-- icon -->
        </div>
    </div> <hr>';
    }

    echo ' <div class="modal-footer">
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn_edit shadow-none" onclick="update_why_choose_us(' . implode(', ', $inputNames) . ')">Save</button>
    </div>
</div>';
}

if (isset($_POST['get_rooms'])) {
    $res = selectAllIn('rooms');
    $countThis = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        echo '<tr>
        <td><img src="http://localhost/teal-residences/user/public/images/' . $row['room_picture'] . '" alt="Room Picture" width="150"></td>
        <td>' . $row['room_title'] . '</td>
        <td class="room_description_text">' . $row['room_description'] . '</td>
        <td>' . $row['room_max_person'] . '</td>
        <td>' . $row['per_night'] . '</td>
        <td style="display: none;">' . $row['room_id'] . '</td>

        <td class="actions">
            <button type="button" class="btn btn-primary shadow-none btn_delete" onclick="remove_room(' . $row['room_id'] . ')"><i class="bi bi-trash"></i></button>
            <button type="button" class="btn btn-primary shadow-none btn_edit" onclick="show_modal(this)"><i class="bi bi-pencil-square"></i></button>
        </td>
    </tr>';
    }
}

if (isset($_POST['get_users'])) {
    $res = selectAllIn('user_table');
    while ($row = mysqli_fetch_assoc($res)) {
        echo '<tr>
        <td>' . $row['user_id'] . '</td>
        <td>' . $row['name'] . '</td>
        <td>' . $row['email'] . '</td>
        <td>' . $row['is_verified'] . '</td>
        <td>' . $row['created_at'] . '</td>
        <td>
            <button class="btn btn-primary shadow-none btn_edit" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
            <button class="btn btn-primary shadow-none btn_del">Delete</button>
        </td>
    </tr>';
    }
}

if (isset($_POST['get_room_by_id'])) {
    $frm_data = filteration($_POST);

    // Assuming you have a valid database connection
    $mysqli = new mysqli("localhost", "root", "", "hotel_db");

    // Check the connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Perform the SQL query to fetch data based on the ID
    $query = "SELECT * FROM `rooms` WHERE `room_id` = ?";
    $statement = $mysqli->prepare($query);
    $statement->bind_param("i", $frm_data['get_room_by_id']); // Assuming 'id' is an integer; adjust the type accordingly
    $statement->execute();

    // Get the result
    $result = $statement->get_result();

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Fetch data as an associative array
        $row = $result->fetch_assoc();

        $values = [$row['room_picture'], $row['room_title'], $row['room_description'], $row['room_max_person'], $row['per_night']];

        $q = "INSERT INTO `ready_to_reserve_table`(`room_picture`, `room_title`, `room_desc`, `room_max`, `per_night`) VALUES (?,?,?,?,?) ";

        $res = insert($q, $values, 'sssss');
        echo $res;
    } else {
        echo "No record found with ID: " . $frm_data['get_room_by_id'];
    }

    // Close the statement and connection
    $statement->close();
    $mysqli->close();
}

if (isset($_POST['get_rooms_to_serve'])) {
    $res = selectAllIn('ready_to_reserve_table');
    while ($row = mysqli_fetch_assoc($res)) {
        echo '<tr>
        <td><img src="http://localhost/teal-residences/user/public/images/' . $row['room_picture'] . '" alt="Room Picture" width="150"></td>
        <td>' . $row['room_title'] . '</td>
        <td class="room_description_text">' . $row['room_desc'] . '</td>
        <td>' . $row['room_max'] . '</td>
        <td>' . $row['per_night'] . '</td>

        <td class="actions">
            <button type="button" class="btn btn-primary shadow-none btn_delete" onclick="remove_reservation(' . $row['id'] . ')"><i class="bi bi-trash"></i></button>
            
        </td>
    </tr>';
    }
}

if (isset($_POST['get_total'])) {
    $res = selectAllIn('ready_to_reserve_table');
    $values = [];
    while ($row = mysqli_fetch_assoc($res)) {
        // echo (int)$row['per_night'];
        $values[] =  (int)$row['per_night'];
    }
    $sum = array_sum($values);
    echo $sum;
}

if (isset($_POST['get_users_inp'])) {
    $res = selectAllIn('user_table');
    $countThis = 0;
    // $inputNames = [];
    while ($row = mysqli_fetch_assoc($res)) {

        // $countThis++;
        // $inputNames[] = 'why_choose_us_' . $countThis . '.value';
        echo '<label style="font-size: .7rem; font-weight: bold;">Name</label>
        <input type="text" class="shadow-none form-control name_class" value="' . $row['name'] . '">
        <label style="font-size: .7rem; font-weight: bold;">Email</label>
        <input type="text" class="shadow-none form-control email_class" value="' . $row['email'] . '">
        <label style="font-size: .7rem; font-weight: bold;">Is Verified</label>
        <input type="text" class="shadow-none form-control is_verified_class" value="' . $row['is_verified'] . '"><hr>';

        echo '<input type="hidden" name="user_id" value="' . $row['user_id'] . '">';
        break;
    }

    echo ' <div class="modal-footer">
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn_edit shadow-none">Save</button>
    </div>
</div>';
}




// -------------------------- get methods end --------------------------




// update methods
if (isset($_POST['update_general'])) {
    $frm_data = filteration($_POST);
    $q = "UPDATE `credentials_table` SET `site_title` =?, `who_we_are` =? WHERE `id` =?";
    $values = [$frm_data['site_title'], $frm_data['site_about'], 1];
    $res = update($q, $values, 'ssi');
    echo $res;
}

if (isset($_POST['update_contact'])) {
    $frm_data = filteration($_POST);
    $q = "UPDATE `contact_us_table` SET `contact_content` =? WHERE `id` =?";

    $values = [$frm_data['phone1'], 1];
    $values2 = [$frm_data['phone2'], 2];
    $values3 = [$frm_data['phone3'], 3];
    $values4 = [$frm_data['facebook'], 4];
    $values5 = [$frm_data['email'], 5];

    $res = update($q, $values, 'si');
    $res2 = update($q, $values2, 'si');
    $res3 = update($q, $values3, 'si');
    $res4 = update($q, $values4, 'si');
    $res5 = update($q, $values5, 'si');

    echo $res;
    echo $res2;
    echo $res3;
    echo $res4;
    echo $res5;
}


if (isset($_POST['update_facilities'])) {
    $frm_data = filteration_without_special_chars($_POST);
    $q = "UPDATE `facilities_table` SET `item` =? WHERE `id` =?";

    $q2 = "UPDATE `facilities_table` SET `icon` =? WHERE `id` =?";

    $values = [$frm_data['f1'], 1];
    $values2 = [$frm_data['f2'], 2];
    $values3 = [$frm_data['f3'], 3];
    $values4 = [$frm_data['f4'], 4];
    $values5 = [$frm_data['f5'], 5];
    $values6 = [$frm_data['f6'], 6];
    $values7 = [$frm_data['f7'], 7];

    $icon_value = [$frm_data['icon1'], 1];
    $icon_value2 = [$frm_data['icon2'], 2];
    $icon_value3 = [$frm_data['icon3'], 3];
    $icon_value4 = [$frm_data['icon4'], 4];
    $icon_value5 = [$frm_data['icon5'], 5];
    $icon_value6 = [$frm_data['icon6'], 6];
    $icon_value7 = [$frm_data['icon7'], 7];

    $res = update($q, $values, 'si');
    $res2 = update($q, $values2, 'si');
    $res3 = update($q, $values3, 'si');
    $res4 = update($q, $values4, 'si');
    $res5 = update($q, $values5, 'si');
    $res6 = update($q, $values6, 'si');
    $res7 = update($q, $values7, 'si');

    $icon_res = update($q2, $icon_value, 'si');
    $icon_res2 = update($q2, $icon_value2, 'si');
    $icon_res3 = update($q2, $icon_value3, 'si');
    $icon_res4 = update($q2, $icon_value4, 'si');
    $icon_res5 = update($q2, $icon_value5, 'si');
    $icon_res6 = update($q2, $icon_value6, 'si');
    $icon_res7 = update($q2, $icon_value7, 'si');

    echo $res;
    echo $res2;
    echo $res3;
    echo $res4;
    echo $res5;
    echo $res6;
    echo $res7;

    echo $icon_res;
    echo $icon_res2;
    echo $icon_res3;
    echo $icon_res4;
    echo $icon_res5;
    echo $icon_res6;
    echo $icon_res7;
}

if (isset($_POST['edit_room'])) {
    $frm_data = filteration($_POST);
    // Assuming 'room_picture', 'room_title', 'room_description', 'room_max_person', and 'per_night' are the column names
    $values = [
        $frm_data['class_file'],
        $frm_data['class_title'],
        $frm_data['class_description'],
        $frm_data['class_max'],
        $frm_data['class_night'],
        $frm_data['edit_room'] // Assuming 'edit_room' contains the room_id
    ];

    $q = "UPDATE `rooms` SET 
        `room_picture` = ?, 
        `room_title` = ?, 
        `room_description` = ?, 
        `room_max_person` = ?, 
        `per_night` = ? 
        WHERE `room_id` = ?";

    $res = update($q, $values, 'sssssi'); // Adjust the 'sssssi' based on the data types of your columns
    echo $res;
}


// -------------------------- update methods end --------------------------



// create methods
if (isset($_POST['add_why_choose_us'])) {
    $frm_data = filteration_without_special_chars($_POST);
    $values = [$frm_data['title_val'], $frm_data['des_val'], $frm_data['icon_val']];
    if (!($frm_data['title_val']) && !($frm_data['des_val']) && !($frm_data['icon_val'])) {
        return 0;
    } else {
        $q = "INSERT INTO `why_choose_us_table`(`icon`, `title`, `description`) VALUES (?,?,?) ";

        $res = insert($q, $values, 'sss');
        echo $res;
    }
}


if (isset($_POST['add_room'])) {
    // $frm_data = filteration($_POST);
    // upload_image($_FILES['picture'], ROOM_IMAGES_FOLDER);

    $title = $_POST["title"];
    $description = $_POST["description"];
    $max = $_POST["max"];
    $per_night = $_POST["per_night"];

    $file = $_FILES["picture"];

    // File properties
    $fileName = $file["name"];
    $fileTmpName = $file["tmp_name"];
    $fileSize = $file["size"];
    $fileError = $file["error"];

    // File extension
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Allowed file types
    $allowedExtensions = ["jpg", "jpeg", "png", "webp"];

    if (in_array($fileExt, $allowedExtensions)) {
        if ($fileError === 0) {
            // Specify the directory where you want to save the uploaded files
            $uploadDirectory = "C:/xampp/htdocs/tEAl-Residences/user/public/images/";

            // Move the uploaded file to the specified directory
            $destination = $uploadDirectory . $fileName;
            move_uploaded_file($fileTmpName, $destination);

            // Insert into database with the file path
            $sql = "INSERT INTO rooms (room_title, room_description, room_max_person, per_night, room_picture) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $title, $description, $max, $per_night, $fileName);
            $stmt->execute();

            echo 1;
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Invalid file type. Allowed types: " . implode(", ", $allowedExtensions);
    }

    $conn->close();
}



// -------------------------- create methods end --------------------------



// delete methods
if (isset($_POST['remove_why_choose_us'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['remove_why_choose_us']];
    $q = "DELETE FROM `why_choose_us_table` WHERE `id` =?";

    $res = delete($q, $values, 'i');
    echo $res;
}

if (isset($_POST['remove_room_val'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['remove_room_val']];
    $q = "DELETE FROM `rooms` WHERE `room_id` =?";
    $res = delete($q, $values, 'i');
    echo $res;
}

if (isset($_POST['remove_reservation_val'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['remove_reservation_val']];
    $q = "DELETE FROM `ready_to_reserve_table` WHERE `id` =?";
    $res = delete($q, $values, 'i');
    echo $res;
}

// -------------------------- delete methods end --------------------------