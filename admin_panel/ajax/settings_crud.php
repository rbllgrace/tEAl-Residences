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

    // 
    $selectedColumn = "contact_content";
    $sql = "SELECT $selectedColumn, COUNT(*) AS count FROM contact_us_table GROUP BY $selectedColumn";
    $result = $conn->query($sql);
    $count = 0;
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            ++$count;
        }
        $result->free();
    }
    // 

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

if (isset($_POST['get_facilities'])) {
    $q = "SELECT * FROM `facilities_table`";
    $values = [];  // No specific ID value to bind
    $res = selectAll($q, $values, '');
    $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
    $json_data = json_encode($data);
    echo $json_data;
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


if (isset($_POST['remove_why_choose_us'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['remove_why_choose_us']];
    $q = "DELETE FROM `why_choose_us_table` WHERE `id` =?";

    $res = delete($q, $values, 'i');
    echo $res;
}
