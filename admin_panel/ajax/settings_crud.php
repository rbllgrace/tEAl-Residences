<?php
require('/xampp/htdocs/tEAl-Residences/admin_panel/config/config.php');
// admin_login();

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
