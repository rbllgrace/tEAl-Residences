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


if (isset($_POST['get_why_choose_us'])) {
    $q = "SELECT * FROM `why_choose_us_table`";
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






// if (isset($_POST['get_rooms'])) {
//     $res = selectAllIn('rooms');
//     $countThis = 0;
//     while ($row = mysqli_fetch_assoc($res)) {
//         echo '<tr>
//         <td><img src="http://localhost/teal-residences/user/public/images/' . $row['room_picture'] . '" alt="Room Picture" width="150"></td>
//         <td>' . $row['room_title'] . '</td>
//         <td class="room_description_text">' . $row['room_description'] . '</td>
//         <td>' . $row['room_max_person'] . '</td>
//         <td>' . $row['per_night'] . '</td>
//         <td style="display: none;">' . $row['room_id'] . '</td>

//         <td class="actions">
//         <button type="button" class="btn btn-primary shadow-none btn_edit" onclick="show_modal(this)"><i class="bi bi-pencil-square"></i></button>
//             <button type="button" class="btn btn-primary shadow-none btn_delete" onclick="remove_room(' . $row['room_id'] . ')"><i class="bi bi-trash"></i></button>

//         </td>
//     </tr>';
//     }
// }

// if (isset($_POST['get_users'])) {
//     $res = selectAllIn('user_table');
//     while ($row = mysqli_fetch_assoc($res)) {
//         echo '<tr>
//         <td>' . $row['user_id'] . '</td>
//         <td>' . $row['name'] . '</td>
//         <td>' . $row['email'] . '</td>

//         <td class="fw-bold" style="color: ' . ($row['is_verified'] == 1 ? 'green' : 'red') . ';">'
//             . ($row['is_verified'] == 1 ? '<i class="bi bi-check-circle-fill"></i>  Verified' : '<i class="bi bi-file-excel-fill"></i>  Not Verified') . '</td>

//         <td>' . $row['created_at'] . '</td>
//         <td>
//             <button class="btn btn-primary shadow-none btn_edit" data-bs-toggle="modal" data-bs-target="#editUserModal"
//                 onclick="get_single_user_with_id(' . $row['user_id'] . ')">Edit</button>
//             <button class="btn btn-primary shadow-none btn_del" onclick="delete_single_user(' . $row['user_id'] . ')">Delete</button>
//         </td>
//         </tr>';
//     }
// }

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

        $values = [
            $row['room_picture'], $row['room_title'], $row['room_description'], $row['room_max_person'],
            $row['per_night']
        ];

        $q = "INSERT INTO `ready_to_reserve_table`(`room_picture`, `room_title`, `room_desc`, `room_max`, `per_night`) VALUES
(?,?,?,?,?) ";

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
    <td><img src="http://localhost/teal-residences/user/public/images/' . $row['room_picture'] . '" alt="Room Picture"
            width="150"></td>
    <td>' . $row['room_title'] . '</td>
    <td class="room_description_text">' . $row['room_desc'] . '</td>
    <td>' . $row['room_max'] . '</td>
    <td>' . $row['per_night'] . '</td>

    <td class="actions">
        <button type="button" class="btn btn-primary shadow-none btn_delete"
            onclick="remove_reservation(' . $row['id'] . ')"><i class="bi bi-trash"></i></button>

    </td>
</tr>';
    }
}

if (isset($_POST['get_total'])) {
    $res = selectAllIn('ready_to_reserve_table');
    $values = [];
    while ($row = mysqli_fetch_assoc($res)) {
        // echo (int)$row['per_night'];
        $values[] = (int)$row['per_night'];
    }
    $sum = array_sum($values);
    echo $sum;
}



if (isset($_POST['get_single_contact_with_id'])) {
    $frm_data = filteration_without_special_chars($_POST);

    $res = selectById('contact_us_table', $frm_data['contact_id'], 'id');
    $row = mysqli_fetch_assoc($res);

    echo '<div class="modal-header">
    <h1 class="modal-title fs-5" id="contactAboutUsModalLabel">Edit Contact</h1>
    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form method="POST">
        <div class="mb-1">
            <label style="font-size: .7rem; font-weight: 500; position: relative; top: 3px;">Contact
                Icon</label> <a href="https://icons.getbootstrap.com/" target="_blank"
                style="font-size: .6rem; position: relative; top: 2px;">select
                icon</a>
            <input type="text" class="form-control shadow-none icon_inp" required>
        </div>

        <div class="mb-1">
            <label style="font-size: .7rem; font-weight: 500; position: relative; top: 3px;">Contact
                Content</label>
            <input type="text" class="form-control shadow-none content_inp" value="' . $row['contact_content'] . '"
                required>
        </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary btn_edit shadow-none"
        onclick="edit_contact_by_id(' . $row['id'] . ')">Update</button>
</div>';
}

if (isset($_POST['get_single_why_choose_us_contact_with_id'])) {
    $frm_data = filteration_without_special_chars($_POST);

    $res = selectById('why_choose_us_table', $frm_data['contact_id'], 'id');
    $row = mysqli_fetch_assoc($res);

    echo '<div class="modal-header">
    <h1 class="modal-title fs-5" id="contactAboutUsModalLabel">Edit Contact</h1>
    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">
    <form method="POST">
        <div class="mb-1">
            <label style="font-size: .7rem; font-weight: 500; position: relative; top: 3px;">Contact
                Icon</label> <a href="https://icons.getbootstrap.com/" target="_blank"
                style="font-size: .6rem; position: relative; top: 2px;">select
                icon</a>
            <input type="text" class="form-control shadow-none icon_inp_why_choose_us" required>
        </div>

        <div class="mb-1">
            <label style="font-size: .7rem; font-weight: 500; position: relative; top: 3px;">
                Title</label>
            <input type="text" class="form-control shadow-none title_inp_why_choose_us" value="' . $row['title'] . '"
                required>
        </div>

        <div class="mb-1">
            <label style="font-size: .7rem; font-weight: 500; position: relative; top: 3px;">Description</label>
            <input type="text" class="form-control shadow-none description_inp_why_choose_us"
                value="' . $row['description'] . '" required>
        </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary btn_edit shadow-none"
        onclick="edit_why_choose_by_id(' . $row['id'] . ')">Update</button>
</div>';
}

if (isset($_POST['get_single_user_with_id'])) {
    $frm_data = filteration_without_special_chars($_POST);

    $res = selectById('user_table', $frm_data['user_id'], 'user_id');
    $row = mysqli_fetch_assoc($res);

    echo '

<form method="POST">

    <div class="mb-1">
        <label style="font-size: .7rem; font-weight: 500; position: relative; top: 3px;">
            Name</label>
        <input type="text" class="form-control shadow-none name_inp_user" value="' . $row['name'] . '"
            required>
    </div>

    <div class="mb-1">
        <label style="font-size: .7rem; font-weight: 500; position: relative; top: 3px;">
            Is Verified</label>
        <input type="number" class="form-control shadow-none is_verified_inp_user" min="0" max="1" step="1" oninput="validateInput(this)" value="' . $row['is_verified'] . '"
            required>
    </div>
</form>

<div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn_edit shadow-none" onclick="edit_user_by_id(' . $row['user_id'] . ')">Update</button>
                </div></form>';
}

if (isset($_POST['get_single_facility_with_id'])) {
    $frm_data = filteration_without_special_chars($_POST);

    $res = selectById('facilities_table', $frm_data['contact_id'], 'id');
    $row = mysqli_fetch_assoc($res);

    echo '<div class="modal-header">
    <h1 class="modal-title fs-5" id="contactAboutUsModalLabel">Edit Contact</h1>
    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">
    <form method="POST">
        <div class="mb-1">
            <label style="font-size: .7rem; font-weight: 500; position: relative; top: 3px;">Contact
                Icon</label> <a href="https://icons.getbootstrap.com/" target="_blank"
                style="font-size: .6rem; position: relative; top: 2px;">select
                icon</a>
            <input type="text" class="form-control shadow-none icon_inp_fac" required>
        </div>

        <div class="mb-1">
            <label style="font-size: .7rem; font-weight: 500; position: relative; top: 3px;">
                Title</label>
            <input type="text" class="form-control shadow-none title_inp_fac" value="' . $row['item'] . '" required>
        </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary btn_edit shadow-none"
        onclick="edit_facility_by_id(' . $row['id'] . ')">Update</button>
</div>';
}

// -------------------------- get methods end --------------------------




// update methods
if (isset($_POST['update_general'])) {
    $frm_data = filteration_without_special_chars($_POST);
    $q = "UPDATE `credentials_table` SET `site_title` =?, `who_we_are` =?, `location` =? WHERE `id` =?";
    $values = [$frm_data['site_title'], $frm_data['site_about'], $frm_data['loc_inp'], 1];
    $res = update($q, $values, 'sssi');
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



if (isset($_POST['edit_contact_by_id'])) {
    $frm_data = filteration_without_special_chars($_POST);
    if ($frm_data['icon_inp'] && $frm_data['content_inp']) {
        $values = [$frm_data['icon_inp'], $frm_data['content_inp'], $frm_data['contact_id']];
        $q = "UPDATE `contact_us_table` SET `icon` =?, `contact_content` =? WHERE `id` =?";
        $res = update($q, $values, 'ssi');
        echo $res;
    } else {
        echo 'All fields is required';
    }
}

if (isset($_POST['edit_why_choose_by_id'])) {
    $frm_data = filteration_without_special_chars($_POST);
    if ($frm_data['icon_inp_why'] && $frm_data['title_inp'] && $frm_data['description_inp']) {
        $values = [$frm_data['icon_inp_why'], $frm_data['title_inp'], $frm_data['description_inp'], $frm_data['id']];
        $q = "UPDATE `why_choose_us_table` SET `icon` =?, `title` =?, `description` =? WHERE `id` =?";
        $res = update($q, $values, 'sssi');
        echo $res;
    } else {
        echo 'All fields is required';
    }
}

if (isset($_POST['edit_user_by_id'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['name_inp_user'], $frm_data['is_verified_inp_user'], $frm_data['user_id']];
    $q = "UPDATE `user_table` SET `name` =?, `is_verified` =? WHERE `user_id` =?";
    $res = update($q, $values, 'ssi');
    echo $res;
}

if (isset($_POST['edit_facility_by_id'])) {
    $frm_data = filteration_without_special_chars($_POST);
    if ($frm_data['icon_inp_why'] && $frm_data['title_inp']) {
        $values = [$frm_data['icon_inp_why'], $frm_data['title_inp'], $frm_data['id']];
        $q = "UPDATE `facilities_table` SET `icon` =?, `item` =? WHERE `id` =?";
        $res = update($q, $values, 'ssi');
        echo $res;
    } else {
        echo 'All fields is required';
    }
}

if (isset($_POST['update_rooms_created_at'])) {
    // Update a row in your table
    $sql = "UPDATE your_table_name SET some_column = 'new_value' WHERE id = 1";
    $result = $conn->query($sql);
}


// -------------------------- update methods end --------------------------






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
            $sql = "INSERT INTO rooms (room_title, room_description, room_max_person, per_night, room_picture) VALUES (?, ?, ?, ?,
?)";
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

if (isset($_POST['add_contact'])) {
    $frm_data = filteration_without_special_chars($_POST);
    $values = [$frm_data['icon'], $frm_data['content']];
    $q = "INSERT INTO `contact_us_table`(`icon`, `contact_content`) VALUES (?,?) ";
    $res = insert($q, $values, 'ss');
    echo $res;
}

if (isset($_POST['add_why_choose_us'])) {
    $frm_data = filteration_without_special_chars($_POST);
    $values = [$frm_data['icon_why'], $frm_data['title_why'], $frm_data['description_why']];
    $q = "INSERT INTO `why_choose_us_table`(`icon`, `title`, `description`) VALUES (?,?,?) ";
    $res = insert($q, $values, 'sss');
    echo $res;
}

if (isset($_POST['add_facility'])) {
    $frm_data = filteration_without_special_chars($_POST);
    $values = [$frm_data['icon_why'], $frm_data['title_why']];
    $q = "INSERT INTO `facilities_table`(`icon`, `item`) VALUES (?,?) ";
    $res = insert($q, $values, 'ss');
    echo $res;
}


// -------------------------- create methods end --------------------------


// delete methods


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

if (isset($_POST['clear_text_general'])) {
    $q = "UPDATE `credentials_table` SET `site_title` = NULL, `who_we_are` = NULL, `location` = NULL";
    $res = delete_single_table($q);
    echo $res;
}

if (isset($_POST['delete_single_contact'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['contact_id']];
    $q = "DELETE FROM `contact_us_table` WHERE `id` =?";
    $res = delete($q, $values, 'i');
    echo $res;
}

if (isset($_POST['delete_single_why_choose_us'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['contact_id']];

    $q = "DELETE FROM `why_choose_us_table` WHERE `id` =?";
    $res = delete($q, $values, 'i');
    echo $res;
}

if (isset($_POST['delete_single_user'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['user_id']];

    $q = "DELETE FROM `user_table` WHERE `user_id` =?";
    $res = delete($q, $values, 'i');
    echo $res;
}

if (isset($_POST['delete_single_facility'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['contact_id']];

    $q = "DELETE FROM `facilities_table` WHERE `id` =?";
    $res = delete($q, $values, 'i');
    echo $res;
}

// -------------------------- delete methods end --------------------------