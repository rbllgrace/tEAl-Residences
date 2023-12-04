<?php require('./config/config.php');
session_start();
session_destroy();
header("Location: http://localhost/teal-residences/admin_panel/login.php");
