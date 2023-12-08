<?php
require('/xampp/htdocs/tEAl-Residences/admin_panel/config/config.php');
admin_login();

if (isset($_POST['get_general'])) {
    $q = "SELECT * FROM `credentials_table` WHERE `id` =?";
    $values = [1];
    $res = select($q, $values, 'i');
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);
    echo $json_data;
}

if (isset($_POST['update_general'])) {
    $frm_data = filteration($_POST);
    $q = "UPDATE `credentials_table` SET `site_title` =?, `who_we_are` =? WHERE `id` =?";
    $values = [$frm_data['site_title'], $frm_data['site_about'], 1];
    $res = update($q, $values, 'ssi');
    echo $res;
}

function selectAll($query, $values = [], $types = '')
{
    $conn = new mysqli("localhost", "root", "", "hotel_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare($query);

    if (!empty($values) && $stmt) {
        $stmt->bind_param($types, ...$values);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $stmt->close();
    $conn->close();

    return $result;
}


if (isset($_POST['get_contacts'])) {
    $q = "SELECT * FROM `contact_us_table`";
    $values = [];  // No specific ID value to bind
    $res = selectAll($q, $values, '');
    $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
    $json_data = json_encode($data);
    echo $json_data;
}


if (isset($_POST['update_contact'])) {
    $frm_data = filteration($_POST);

    // Assuming $frm_data['site_title'] and $frm_data['site_about'] are arrays with 5 elements
    $phone1 = $frm_data['phone1'];
    $phone2 = $frm_data['phone2'];
    $phone3 = $frm_data['phone3'];
    $facebook = $frm_data['facebook'];
    $email = $frm_data['email'];

    // Update query for 5 rows
    $q = "UPDATE `contact_us_table` SET `contact_content` = ? WHERE `id` = ?";

    // Prepare values array for binding
    $values = [];

    // Loop through the arrays and add values to the $values array
    for ($i = 0; $i < 5; $i++) {
        $values[] = $phone1[$i];
        $values[] = $phone2[$i];
        $values[] = $phone3[$i];
        $values[] = $facebook[$i];
        $values[] = $email[$i];
        $values[] = $i + 1; // Assuming IDs start from 1 and go up to 5
    }

    // Update all 5 rows
    $res = update($q, $values, str_repeat('i', 5));

    echo $res;
}
