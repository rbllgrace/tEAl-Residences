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
    <link rel="stylesheet" href="./public/css/common.css">
</head>

<body>
    <?php require('./partials/header.php'); ?>
    <?php require('./partials/nav_pills.php'); ?>

    <?php require('./partials/settings_partials/general_settings.php'); ?>
    <?php require('./partials/settings_partials/contact_us_settings.php'); ?>
    <?php require('./partials/settings_partials/why_choose_us_settings.php'); ?>

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
            }, 3000);
        }

        window.onload = function() {
            get_general()
            get_contacts()
            get_why_choose_us()
        }
    </script>
</body>

</html>