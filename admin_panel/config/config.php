<?php

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// -------------------------------------------------------


function filteration($data)
{

    foreach ($data as $key => $value) {
        $data[$key] = trim($value);
        $data[$key] = stripslashes($value);
        $data[$key] = htmlspecialchars($value);
        $data[$key] = strip_tags($value);
    }
    return $data;
}

function filteration_without_special_chars($data)
{
    foreach ($data as $key => $value) {
        $data[$key] = trim($value);
    }
    return $data;
}

// -------------------------------------------------------


function select($sql, $values, $datatypes)
{
    $con = $GLOBALS['conn'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die('Query connect be executed - Select');
        }
    } else {
        die('Query connect be prepared - Select');
    }
}

// -------------------------------------------------------

function alert($type, $msg)
{
    echo <<<alert
        <div class="alert alert-$type alert-dismissible fade show custom_alert " role="alert">
            $msg
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    alert;
}
// -------------------------------------------------------

function admin_login()
{
    session_start();
    if (!(isset($_SESSION['admin_login']) && isset($_SESSION['admin_login']) == true)) {
        header("Location: http://localhost/teal-residences/admin_panel/login.php");
        exit;
    }
    // session_regenerate_id(true);
}


// -------------------------------------------------------
function update($sql, $values, $datatypes)
{
    $con = $GLOBALS['conn'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die('Query connect be executed - Update');
        }
    } else {
        die('Query connect be prepared - Update');
    }
}






// -------------------------------------------------------


// -------------------------------------------------------


// -------------------------------------------------------


// -------------------------------------------------------