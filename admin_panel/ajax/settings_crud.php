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
