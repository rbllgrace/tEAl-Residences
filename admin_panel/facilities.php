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
</head>

<body>
    <?php require('./partials/header.php'); ?>
    <?php require('./partials/nav_pills.php'); ?>

    <?php require('./partials/settings_partials/facilities_settings.php'); ?>

    <script>
    let facilities_data

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

    function get_facilities() {

        let facilities_ids = ['f1', 'f2', 'f3', 'f4', 'f5', 'f6', 'f7']
        let facilities_class_inp = ['.f1_inp', '.f2_inp', '.f3_inp', '.f4_inp', '.f5_inp', '.f6_inp',
            '.f7_inp'
        ]

        let icons_class_inp = ['.icon1_inp', '.icon2_inp', '.icon3_inp', '.icon4_inp', '.icon5_inp',
            '.icon6_inp',
            '.icon7_inp'
        ]

        let icons_class_span = ['.icon1_span', '.icon2_span', '.icon3_span', '.icon4_span',
            '.icon5_span',
            '.icon6_span',
            '.icon7_span'
        ]


        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {
            facilities_data = JSON.parse(this.responseText)

            for (let i = 0; i < facilities_ids.length; i++) {
                document.getElementById(facilities_ids[i]).innerText = facilities_data[i].item;
                document.querySelector(facilities_class_inp[i]).value = facilities_data[i].item;

                document.querySelector(icons_class_inp[i]).value = facilities_data[i].icon;
                document.querySelector(icons_class_span[i]).innerHTML = facilities_data[i].icon;

            }

        }
        xhr.send('get_facilities')
    }

    function update_facilities(f1, f2, f3, f4, f5, f6, f7, icon1, icon2, icon3, icon4, icon5, icon6,
        icon7) {

        let xhr = new XMLHttpRequest()
        xhr.open('POST', 'http://localhost/teal-residences/admin_panel/ajax/settings_crud.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {

            let my_modal = document.querySelector('.my_modal_facility_us')
            let modal = bootstrap.Modal.getInstance(my_modal)
            modal.hide()


            if (this.responseText.indexOf('1') != -1) {
                alert('success', 'Changes saved!')
                get_facilities()
            } else {
                alert('error', 'No changes made!')

            }
        }

        xhr.send('f1=' + f1 + '&f2=' + f2 + '&f3=' + f3 + '&f4=' + f4 + '&f5=' +
            f5 + '&f6=' + f6 + '&f7=' + f7 + '&icon1=' + icon1 + '&icon2=' + icon2 + '&icon3=' +
            icon3 + '&icon4=' +
            icon4 + '&icon5=' + icon5 + '&icon6=' + icon6 + '&icon7=' + icon7 + '&update_facilities'
        )
    }

    window.onload = function() {
        get_facilities()
    }
    </script>
</body>

</html>