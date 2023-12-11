<?php require('./config/config.php');
admin_login();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php require('./partials/links.php') ?>
    <!-- <link rel="stylesheet" href="./public/css/common.css"> -->
    <style>
        * {
  font-family: 'Poppins', sans-serif;
  box-sizing: border-box;
  scroll-behavior: smooth;
}

.btn_logout {
  background: black;
  color: white;
  border-color: black;
  font-size: 0.8rem;
}

.btn_logout:hover {
  background: black;
  border-color: white;
}

.navbar {
  background: #11151c !important;
  position: fixed;
  top: 0;
  width: 100%;
}

.nav-pills {
  width: 250px;
  text-align: center;

  position: fixed;
  top: 56px;
  height: 100%;
  background: #11151c;
  border-top: 1px solid white;
}

.nav-pills .nav-link {
  color: white;
}

.center {
  margin-left: 20vw;
  margin-top: 5%;
  padding-right: 25px;
}

.gen_and_edit {
  display: flex;
  justify-content: space-between;
  gap: 10px;
}

.btn_delete_all {
  background: red;
  border-color: red;
  font-size: 0.8rem;
  margin: 0;
  padding: 0;
  padding: 2px 25px;
}

.btn_delete_all:hover {
  background: transparent;
  border-color: red;
  color: black;
}

.btn_add {
  background: #008080;
  border-color: #008080;
  font-size: 0.8rem;
  margin: 0;
  padding: 0;
  padding: 2px 25px;
}

.btn_add:hover {
  background: transparent;
  border-color: black;
  color: black;
}

.btn_edit {
  background: #11151c;
  border-color: #11151c;
  font-size: 0.8rem;
  margin: 0;
  padding: 0;
  padding: 2px 25px;
}

.btn_edit:hover {
  background: transparent;
  border-color: black;
  color: black;
}

.btn_delete {
  background: red;
  border-color: red;
  font-size: 0.8rem;
  margin: 0;
  padding: 0;
  padding: 2px 10px;

  position: absolute;
  right: 0.8rem;
}

.btn_delete:hover {
  background: transparent;
  border-color: red;
  color: black;
}

.btn_delete:active {
  background: transparent;
}

.card-title {
  margin-bottom: 0;
}

.card-text {
  margin-bottom: 0;
  font-size: 0.8rem;
  margin-block: 0.3rem;
}

.btn-check:focus + .btn-primary,
.btn-primary:focus {
  background: #11151c;
  border-color: black;
  color: white;
  box-shadow: 0 0 0 0.25rem rgba(49, 132, 253, 0.5);
}

.bi-pencil-square {
  vertical-align: middle;
  margin-right: 5px;
}

.title_inp,
.about_inp {
  font-size: 0.8rem;
}

.form-label {
  margin-bottom: 0;     
  font-size: 0.9rem;
}

.custom_alert {
    position: fixed;
    /* top: 75px; */
    /* right: 50px; */
    top: 30px;
    right: 41%;
    font-size: 0.8rem;
    font-weight: bold;
    z-index: 1;
    height: 31px;
    display: flex;
    align-items: center;
}

.alert-dismissible .btn-close {
  position: absolute;
  top: -9px;
  right: 3px;
  z-index: 2;
  padding: 1.25rem 1rem;
  font-size: 0.7rem;
}

.contact_us {
  font-size: 0.8rem;
}

.f-title {
  font-size: 0.7rem;
}

.facilities_container {
  display: grid;
  /* grid-template-columns: 1fr 1fr 1fr 1fr; */
  grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
  gap: 10px;
}

i {
  vertical-align: middle;
}

    </style>

</head>

<body>
    <?php require('./partials/header.php'); ?>
    <?php require('./partials/nav_pills.php'); ?>

    <?php require('./partials/settings_partials/general_settings.php'); ?>
    <?php require('./partials/settings_partials/contact_us_settings.php'); ?>
    <?php require('./partials/settings_partials/why_choose_us_settings.php'); ?>
    <?php require('./partials/settings_partials/faq_settings.php'); ?>

    <script>
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

    window.onload = function() {
        get_general()
        get_contacts()
        get_why_choose_us()
        get_why_choose_us_inp()
    }
    </script>
</body>

</html>